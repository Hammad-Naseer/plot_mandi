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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

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
        $this->validate($request, [
            'first_name' => 'required|string||max:255',
            'last_name' => 'required|string||max:255',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|in:M,F,O',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
            'address' => 'required',
        ]);

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
        $user->remember_token = Str::random(60);
        $user->password = app('hash')->make($request->password);
    
        if ($user->save()) :
            // Dispatch the job
            SendUserVerificationEmailJob::dispatch($user)->delay(now()->addSeconds(5)); //->addMinutes(10) || ->addSeconds(5)                
            return successResponse(array(), 200, "success");
        endif;
    }

    public function userLogin(Request $request)
    {
            $validated = $request->validate([
                'email' => 'required|max:255',
                'password' => 'required|min:8',
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
        $validated = $request->validate([
            'email' => 'required|max:255',
        ]);

        $email = $request->input('email');
        // Find the user by email
        $user = User::where('email', $email)->first();
        if (!$user) {
            // return response()->json(['message' => 'User not found'], 404);
            return successResponse(array("message" => "Account Does'nt Found"),404,"error");
        }

        // Generate a reset token
        // $resetToken = Str::random(60);
        $otp = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $user->update(['reset_token' => $otp]);

        // Send reset password email
        Mail::to($user->email)->send(new ResetPasswordMail($user));

        return successResponse(array("message" => "Reset password email sent"),200,"success");
        // return response()->json(['message' => 'Reset password email sent']);
    }

    public function ResetPassword(Request $request)
    {
        try {
            $validated = $request->validate([
                'reset_code' => 'required|max:4',
                'password' => 'required|min:8',
            ]);

            $resetToken = $request->input('reset_code');
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
        } catch (ValidationException $exception) {
            return errorResponse($exception->getMessage(), 400);
        }
    }

    public function submitPropertyForm(Request $request)
    {
        try{
        $validated = $request->validate([
            'property_title' => 'required|string|max:255',
            'property_description' => 'required|string',
            'property_status' => 'required|string',
            'property_type' => 'required|string',
            'property_rooms' => 'required|integer',
            'property_price' => 'required|numeric',
            'property_area' => 'required|numeric',
            'property_address' => 'required|string',
            'property_city' => 'required|string',
            'property_state' => 'required|string',
            'property_country' => 'required|string',
            'property_latitude' => 'nullable|numeric',
            'property_longitude' => 'nullable|numeric',
            'property_kitchens' => 'required|integer',
            'property_bathrooms' => 'required|integer',
            'property_features' => 'nullable|string',
            'property_contact_name' => 'required|string',
            'property_contact_email' => 'required|email',
            'property_contact_phone' => 'required|string',
        ]);

        $property = new Property();
        $property->property_title = $request->input('property_title');
        $property->property_description = $request->input('property_description');
        $property->property_status = $request->input('property_status');
        $property->property_type = $request->input('property_type');
        $property->property_rooms = $request->input('property_rooms');
        $property->property_price = $request->input('property_price');
        $property->property_area = $request->input('property_area');
        $property->property_address = $request->input('property_address');
        $property->property_city = $request->input('property_city');
        $property->property_state = $request->input('property_state');
        $property->property_country = $request->input('property_country');
        $property->property_latitude = $request->input('property_latitude');
        $property->property_langitude = $request->input('property_longitude');
        $property->property_kitchens = $request->input('property_kitchens');
        $property->property_bathrooms = $request->input('property_bathrooms');
        $property->property_features = json_encode($request->input('features'));
        $property->property_contact_name = $request->input('property_contact_name');
        $property->property_contact_email = $request->input('property_contact_email');
        $property->property_contact_phone = $request->input('property_contact_phone');
        if ($property->save()) :

            $insertedId = $property->property_id;
            // Upload Property Image Media 
            if ($request->hasFile('property_images')) {
                foreach ($request->file('property_images') as $image) {
                    $filePath = uploadFile($image, 'uploads/dealer/property/'.$insertedId, array('jpg','png','gif'));                    
                    PropertyMedia::create([
                        'property_id' => $insertedId,
                        'file_name' => $filePath,
                        'file_type' => "image",
                    ]);
                }
            }

            // Upload Property Video Media 
            if ($request->hasFile('property_videos')) {
                foreach ($request->file('property_videos') as $video) {
                    $filePath = uploadFile($video, 'uploads/dealer/property/'.$insertedId, array('mp4'));                    
                    PropertyMedia::create([
                        'property_id' => $insertedId,
                        'file_name' => $filePath,
                        'file_type' => "video",
                    ]);
                }
            }
            return successResponse(array("message" => "Property Added Successfully"),200,"success");
        else:
            return successResponse(array("message" => "Property Not Added, errro"),404,"error");
        endif;
        }catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            } else {
                throw $e;
            }
        }

    }
}
