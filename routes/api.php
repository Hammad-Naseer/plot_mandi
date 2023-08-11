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
[File: api]
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\XSSSanitizerMiddleware;

// Controller 
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebUserController;


// Routes 
Route::prefix('v1')->group(function () {
    // Without Token Routes 
    Route::get('test',[UserController::class,'test_func'])->name('test');
    
    // Normal Laravel Login 
    Route::post('login',[UserController::class,'userLogin'])->name('login'); //,'2fa'
    Route::post('user_register',[UserController::class,'userRegistration'])->name('user_register'); //,'2fa'
    Route::get('/logout', [UserController::class, 'logout']);
    Route::post('/forgot_password', [UserController::class, 'ForgotPassword']);
    Route::post('/reset_password', [UserController::class, 'ResetPassword']);
    // Tokenize Routes 
    Route::group(['middleware' => 'auth:sanctum'], function () {
        // Authentication Api's
        Route::group(['prefix' => 'users'], function () {
            Route::get('/get/{id?}', [UserController::class,'getUserDetail']);
            Route::post('/add', [UserController::class, 'userRegistration'])->middleware(XSSSanitizerMiddleware::class);
            Route::get('/getUserActivity/{id?}', [UserController::class,'getUserActivity']);
            // For Dashboard
            // ->middleware(['verified']);
        });

        Route::group(['prefix' => 'property'], function () {
            // Route::get('/get/{id?}', [UserController::class,'getUserDetail']);
            Route::post('/add_property', [UserController::class, 'submitPropertyForm'])->middleware(XSSSanitizerMiddleware::class);
            Route::get('/get_property/{id?}', [WebUserController::class,'userDealerViewProperty']);
            // For Dashboard
            // ->middleware(['verified']);
        });

        // Permissions Api's 
        // Route::group(['prefix' => 'permission'], function () {
        //     Route::post('/add', [PermissionsController::class, 'permissionInsert'])->middleware(XSSSanitizerMiddleware::class);
        //     Route::get('/get/{id?}/{user_id?}', [PermissionsController::class, 'getPermissions']);
        //     Route::post('/assign', [PermissionsController::class, 'permissionAssignToRole'])->middleware(XSSSanitizerMiddleware::class);
        //     Route::post('/update_role_permisison', [PermissionsController::class, 'rolePermissionUpdate'])->middleware(XSSSanitizerMiddleware::class);
        //     Route::delete('/delete_role_permisison', [PermissionsController::class, 'rolePermissionDelete'])->middleware(XSSSanitizerMiddleware::class);
        // });
    });
    // Handle unauthorized access
    Route::fallback(function () {
        return response()->json(['error' => 'API Not Found.','code' => 404], 404);
    });
});

