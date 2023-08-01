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
[© Copyright Hammad Ali,Zeeshan Arain & Naseem]
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
use App\Http\Resources\GetUserAuthType;

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

    

    public function userLogin(LoginRequest $request)
    {
        try {
            $data = $request->validated();
            if (Auth::attempt($data)) {
                $user = Auth::user();
                if ($user->tokens()->where('tokenable_id', $user->user_id)->exists()) {
                    $user->tokens()->delete();
                }
                // Make Session
                session(['userId' => $user->user_id]);
                // $request->session()->put('userId', $user->user_id);
                // Save Logs
                appActivityLogs(array('id' => $user->user_id, 'ip' => $request->ip(), 'action' => "login", 'action_id' => "", 'log_type' => "1","message" => "User Login Successfully", "table" => Route::currentRouteName()));
                return successResponse(new LoginResource($user), 200, "success");
            } else {
                // appActivityLogs(array('id' => $user->user_id, 'ip' => $request->ip(), 'action' => "login", 'action_id' => "", 'log_type' => "1","message" => "User Login Unsuccessfully", "table" => Route::currentRouteName()));
                return response()->json(['error' => "Invalid credentials"], 200);
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

    // public function getUserAuthType(Request $request)
    // {
        // try {
        //     $validator = Validator::make($request->all(), [
        //         'email' => 'required|email',
        //     ]);
            
        //     if ($validator->fails()) {
        //         throw new ValidationException($validator);
        //     }
        //     $email = $request->email;
        //     $userEmail = User::where('email', $email);
        //     dd($userEmail);
        //     return successResponse(new GetUserAuthType($userEmail), 200, "success");
        // } catch (ValidationException $exception) {
        //     return errorResponse("An error occurred", 400);
        // }
    // }

    // Login With Azure Active Directory
    public function redirectToAzure()
    {
        return Socialite::driver('azure')->redirect();
    }

    public function handleAzureCallback(Request $request)
    {
        $userAzure = Socialite::driver('azure')->stateless()->user();
        // $userAzure->getRaw()['mail'];
        // dd($userAzure);
        // User Registration & Login Resource & Token Creation
        $getUser = DB::table("users")->WHERE('email', $userAzure->getRaw()['mail']);
        if ($getUser->exists()) :
            // Login Azure With Laravel
            $getUserInfo = $getUser->first();
            $data = array(
                'email' =>  $userAzure->getRaw()['mail'],
                'password' =>  "Azure@007",
            );
            if (Auth::attempt($data)) {
                $user = Auth::user();
                if ($user->tokens()->where('tokenable_id', $user->id)->exists()) {
                    $user->tokens()->delete();
                }
                appActivityLogs(array('id' => $user->user_id, 'ip' => $request->ip(), 'action' => "login", 'action_id' => "", 'log_type' => "1","message" => "Azure Login Successfully", "table" => Route::currentRouteName()));
                return successResponse(new LoginResource($user), 200, "success");
            }
            DB::table("personal_access_tokens")->WHERE('tokenable_id', $getUserInfo->id)->delete();
            return successResponse(new LoginResource($getUserInfo), 200, "success");

        else :
            return errorResponse("An error occurred", 400);
        // $user = new User;
        // $user->name = $userAzure->getRaw()['displayName'];
        // $user->email = $userAzure->getRaw()['mail'];
        // $user->email_verified_at = date("Y-m-d h:i:s");

        // $user->password = app('hash')->make("Azure@007");
        // if($user->save()):
        //     return successResponse(array("message" => "User Registartion Successfully"),200,"success");
        // endif;
        endif;
    }

    public function logout_azure(Request $request)
    {
        $user = Auth::user();
        if ($user->tokens()->where('tokenable_id', $user->user_id)->exists()) {
            $user->tokens()->delete();
        }
        Auth::guard()->logout();
        $request->session()->flush();
        appActivityLogs(array('id' => $user->user_id, 'ip' => $request->ip(), 'action' => "azure_logout", 'action_id' => "", 'log_type' => "1", "message" => "User Logout Successfully","table" => Route::currentRouteName()));
        $azureLogoutUrl = Socialite::driver('azure')->getLogoutUrl(route('login'));
        return redirect($azureLogoutUrl);
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

    private function createDatabaseOrMigration($databaseName = "",$connectionName = "sqlsrv_company")
    {
        $response = "";
        $masterConnectionName = "sqlsrv";
        $migrationPath = 'database/migrations/company_migrations';
        
        if($databaseName == ""):
            $response = "Database Name Is Required";
        else:
            DB::statement("CREATE DATABASE $databaseName");
            $response .= "Database Creation | Done <br>";
            Config::set('database.connections.'.$connectionName.'.database', $databaseName);

            $tables = [
                '2023_07_05_173225_create_roles_table',
                '2023_07_05_122649_create_permissions_table',
                '2023_07_05_122628_create_role_permissions_table',
            ];

            foreach ($tables as $table) {
                $migrationFile = $migrationPath . '/' . $table . '.php';
                // $migrationContent = $this->generateMigrationContent($table);
                // file_put_contents($migrationFile, $migrationContent);
                Artisan::call('migrate', [
                    '--database' => $connectionName,
                    '--path' => $migrationFile,
                ]);
            }
            $response .= "Tables Migration | Done <br>";
            $storedProcedures = DB::connection($masterConnectionName)->select("SELECT name FROM sys.objects WHERE type = 'P'");
            foreach ($storedProcedures as $storedProc) :
                $procName = $storedProc->name;
                $spsArray = array(
                    'uspgetdatafromRole_permissions',
                    'uspinsertroles',
                    'uspinsertrolepermissions',
                    'uspupdateroles',
                    'uspdeleteroles',
                    'uspupdate_deleteroles',
                    'uspgetdatafromRoles',
                    'uspgetdatafrompermissions',
                    'uspinsertpermissions',
                    'uspinsertrolepermissions'
                );
                if(in_array($procName,$spsArray)):                    
                    $query = DB::connection($masterConnectionName)->select("SELECT OBJECT_DEFINITION(OBJECT_ID('$procName')) AS [Procedure]");
                    $procedureDefinition = $query[0]->Procedure;
                    Config::set('database.connections.'.$connectionName.'.database', $databaseName);
                    DB::connection($connectionName)->statement($procedureDefinition);
                endif;
            endforeach;
            $response .= "Stored Prodcedures Schema Upload | Done <br>";            
        endif;
        return $response;
    }

    public function test_func()
    {
        echo userIdEncrypt(6);
        // $user = array(
        //     'name' =>  "Hammad Ali",
        //     'email' =>  "zeeshanarain1@gmail.com",
        // );
        // $a = dispatch(new SendUserVerificationEmailJob((object) $user));
        // SendUserVerificationEmailJob::dispatch((object) $user);
        // SendUserVerificationEmailJob::dispatch((object) $user)->afterCommit();


        // echo $this->createDatabaseOrMigration("f3_database");
        // $output = Artisan::output();
        // $exitCode = Artisan::call('migrate', [
        //     '--database' => $connectionName,
        // ]);

        // $database = DB::connection("sqlsrv_company")->getDatabaseName();
        // echo $database;
        dd("End");

        $serverName = "PHPTEST\EMS_SECURE"; //serverName\instanceName
        $connectionInfo = array("Database" => "CTS_Development_Master", "UID" => "phpteam", "PWD" => "hello@100");
        $conn = sqlsrv_connect($serverName, $connectionInfo);
        if ($conn) {
            echo "Connection established.<br />";
            // $sql = "SELECT * FROM users";
            // $query = sqlsrv_query($conn, $sql);
            // if ($query === false) {
            //     die(print_r(sqlsrv_errors(), true));
            // }
            // while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
            //     // Process each row
            //     // Access column values using $row['column_name']
            //     echo $row['name'];
            // }

        } else {
            echo "Connection could not be established.<br />";
            die(print_r(sqlsrv_errors(), true));
        }
    }
    
    
}
