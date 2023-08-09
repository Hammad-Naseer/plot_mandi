<?php

/*
IMPORTANT: 
YOU ARE NOT ALLOWED TO REMOVE THIS COMMENT AND NO MODIFICATION TO THE CODE SHOULD BE MADE WITHOUT THE CONSENT OF THE AUTHORS
 
DISCLAIMER:
This code is provided 'as is' after proper verifications and reviews to the Development Team. 
he author to this file shall not be held liable for any damages, including any lost profits 
or other incidental or consequential damages arising out of or in connection with the use or inability to use this code.
 
[Details]
[Date: 2023-06-26]
[© Copyright Zeeshan Arain]
[File: UserController]
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use StoredProcedureHelper;
use Illuminate\Support\Facades\Hash;


// Requests
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

// Resources
use App\Http\Resources\LoginResource;
use App\Http\Resources\GetUserResource;
use App\Http\Resources\GetUserActivityResource;

// Jobs
use App\Jobs\SendUserVerificationEmailJob;

class UserController extends Controller
{
    public function userRegistration(RegisterRequest $request)
    {
        // Start the transaction
        DB::beginTransaction();
        
        try {

            $data = $request->validated();
            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->acount_type = 3;
            $user->created_by = 0;
            $user->password = app('hash')->make($request->password);
        
            if ($user->save()) :
                // Dispatch the job
                SendUserVerificationEmailJob::dispatch($user)->delay(now()->addSeconds(5)); //->addMinutes(10) || ->addSeconds(5)
                
                // Commit the transaction
                DB::commit();
                
                return successResponse(array(), 200, "success");
            endif;

            
        } catch (ValidationException $exception) {
            DB::rollBack();
            return errorResponse("An error occurred", 400);
        }
    }

    public function userLogin(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|max:255',
                'password' => 'required',
            ]);
            $data = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            // dd($data);
            if (Auth::attempt($data)) {
                $user = Auth::user();
                if ($user->tokens()->where('tokenable_id', $user->user_id)->exists()) {
                    $user->tokens()->delete();
                }
                if($user->is_active == 1):
                    // Save Logs
                    // appActivityLogs(array('id' => $user->user_id, 'ip' => $request->ip(), 'action' => "login", 'action_id' => "", 'log_type' => "1","message" => "User Login Successfully", "table" => Route::currentRouteName()));
                    return successResponse(new LoginResource($user), 200, "success");
                else:
                    return successResponse(array("message" => "User Account Blocked"), 200, "success");
                endif;
            } else {
                // appActivityLogs(array('id' => $user->user_id, 'ip' => $request->ip(), 'action' => "login", 'action_id' => "", 'log_type' => "1","message" => "User Login Unsuccessfully", "table" => Route::currentRouteName()));
                // return response()->json(['error' => "Invalid credentials"], 401);
                return successResponse(array("message" => "Invalid credentials"), 401, "success");
            }
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    

    public function getUserDetail($id = 0)
    {
        try {
            //getting data using store procedure
            $id = $id;
            $results = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspgetdatafromUsers]", [$id],1);
            if (count($results) > 0) :
                appActivityLogs(array('id' => $id, 'ip' => $request->ip(), 'action' => "login", 'action_id' => "", 'log_type' => "1","message" => "Get User Detail", "table" => Route::currentRouteName()));
                return successResponse(new GetUserResource($results),200,"success");
            else :
                return errorResponse("Data Not Found",404);
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        dd($user);
        if($user != null):
            Auth::guard("web")->logout();
            $request->session()->flush();
            // return redirect()->route('/');
            appActivityLogs(array('id' => $user->user_id, 'ip' => $request->ip(), 'action' => "logout", 'action_id' => "", 'log_type' => "1", "message" => "Azure Logout Successfully", "table" => Route::currentRouteName()));
            // if ($user->tokens()->where('tokenable_id', $user->user_id)->exists()) {
            //     $user->tokens()->delete();
            // }
            return successResponse(array("message","User Logout"),200,"success");
        else:
            return errorResponse("An error occurred", 400);
        endif;
    }

    public function getUserActivity($id = 0)
    {
        try {
            //getting data using store procedure
            $user_id = $id;
            $results = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspgetdatafromUser_activity]", [$user_id],1);
            if (count($results) > 0) :
                return successResponse(new GetUserActivityResource($results),200,"success");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }   

    public function ForgotPassword(Request $request)
    {
        $email = $request->input('email');

        // Find the user by email
        $user = User::where('email', $email)->first();

        if (!$user) {
            // return response()->json(['message' => 'User not found'], 404);
            return successResponse(array("message" => "Data Not Found"),404,"error");
        }

        // Generate a reset token
        $resetToken = Str::random(60);
        $user->update(['reset_token' => $resetToken]);

        // Send reset password email
        Mail::to($user->email)->send(new ResetPasswordMail($user));

        return successResponse(array("message" => "Reset password email sent"),200,"success");
        // return response()->json(['message' => 'Reset password email sent']);
    }

    public function customResetPassword(Request $request)
    {
        $resetToken = $request->input('reset_token');
        $password = $request->input('password');

        // Find the user by reset token
        $user = User::where('reset_token', $resetToken)->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid reset token'], 404);
        }

        // Reset the user's password
        $user->update([
            'password' => Hash::make($password),
            'reset_token' => null,
        ]);

        // return response()->json(['message' => 'Password reset successful']);
        return successResponse(array("message" => "Password reset successful"),200,"success");
    }
}
