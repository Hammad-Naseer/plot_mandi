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

    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'c_password' => 'required|same:password',
    //     ]);

    //     if($validator->fails()){
    //         return $this->sendError('Validation Error.', $validator->errors());       
    //     }

    //     $input = $request->all();
    //     $input['password'] = bcrypt($input['password']);
    //     $user = User::create($input);
    //     $success['token'] =  $user->createToken('MyApp')->plainTextToken;
    //     $success['name'] =  $user->name;

    //     return $this->sendResponse($success, 'User register successfully.');
    // }


    // public function register(Request $request)
    // {

    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'name' => 'required|string',
    //             'email' => 'required|email|unique:users',
    //             'password' => 'required',
    //         ]);

    //         if ($validator->fails()) {
    //             throw new ValidationException($validator);
    //         }

    //         // Your code for saving the user
    //         $input = $request->only('name','email','password');

    //         $user = new User;
    //         $user->name = $input['name'];
    //         $user->email = $input['email'];
    //         $user->password = app('hash')->make($input['password']);
    //         if($user->save()):
    //             return response()->json(['message' => 'Success', 'code' => 200]);
    //         endif;

    //     } catch (ValidationException $exception) {
    //         return response()->json([
    //             'errors' => $exception->errors(),
    //             'code' => 300,
    //         ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    //     }
    // }

    // return response()->json([
    //     'data' => new LoginResource($user),
    //     'message' => 'Success',
    // ], 200);
    // return response()->json(['error' => $exception->errors()], 422);



    public function userRegistration(RegisterRequest $request)
    {
        // Start the transaction
        DB::beginTransaction();
        
        try {

            $data = $request->validated();
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->auth_type = $request->auth_type;
            $user->created_by = $request->created_by;
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

    public function userLogin($request)
    {
        try {
            $data = $request->validated();
            if (Auth::attempt($data)) {
                $user = Auth::user();
                if ($user->tokens()->where('tokenable_id', $user->user_id)->exists()) {
                    $user->tokens()->delete();
                }
                if($user->is_active == 1):
                    // Make Session
                    session(['userId' => $user->user_id]);
                    // Save Logs
                    appActivityLogs(array('id' => $user->user_id, 'ip' => $request->ip(), 'action' => "login", 'action_id' => "", 'log_type' => "1","message" => "User Login Successfully", "table" => Route::currentRouteName()));
                    return successResponse(new LoginResource($user), 200, "success");
                else:
                    return successResponse(array("message" => "User Account Blocked"), 200, "success");
                endif;
            } else {
                // appActivityLogs(array('id' => $user->user_id, 'ip' => $request->ip(), 'action' => "login", 'action_id' => "", 'log_type' => "1","message" => "User Login Unsuccessfully", "table" => Route::currentRouteName()));
                return response()->json(['error' => "Invalid credentials"], 401);
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
}
