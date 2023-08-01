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
[File: api]
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\XSSSanitizerMiddleware;

// Controller 
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\StandardController;


// Routes 
Route::prefix('v1')->group(function () {
    // Without Token Routes 
    Route::get('test',[UserController::class,'test_func'])->name('test');
    
    // Normal Laravel Login 
    Route::post('login',[UserController::class,'userLogin'])->name('login')->middleware(XSSSanitizerMiddleware::class)->middleware(['verified']); //,'2fa'
    Route::get('/logout', [UserController::class, 'logout']);
    // Tokenize Routes 
    Route::group(['middleware' => 'auth:sanctum'], function () {
        // Authentication Api's
        Route::group(['prefix' => 'users'], function () {
            Route::get('/get/{id?}', [UserController::class,'getUserDetail']);
            Route::post('/add', [UserController::class, 'userRegistration'])->middleware(XSSSanitizerMiddleware::class);
            // Route::post('/get_auth', [UserController::class, 'getUserAuthType'])->middleware(XSSSanitizerMiddleware::class);
            // Route::get('/delete/{id}', [UserController::class, 'delete']);
            Route::get('/getUserActivity/{id?}', [UserController::class,'getUserActivity']);
            // For Dashboard
            // ->middleware(['verified']);
        });

        // Roles Api's 
        Route::group(['prefix' => 'roles'], function () {
            Route::post('/add', [RolesController::class, 'roleInsert'])->middleware(XSSSanitizerMiddleware::class);
            Route::post('/update', [RolesController::class, 'roleUpdate'])->middleware(XSSSanitizerMiddleware::class);
            Route::post('/delete', [RolesController::class, 'roleDelete'])->middleware(XSSSanitizerMiddleware::class);
        });
        // Permissions Api's 
        Route::group(['prefix' => 'permission'], function () {
            Route::post('/add', [PermissionsController::class, 'permissionInsert'])->middleware(XSSSanitizerMiddleware::class);
            Route::get('/get/{id?}/{user_id?}', [PermissionsController::class, 'getPermissions']);
            Route::post('/assign', [PermissionsController::class, 'permissionAssignToRole'])->middleware(XSSSanitizerMiddleware::class);
            Route::post('/update_role_permisison', [PermissionsController::class, 'rolePermissionUpdate'])->middleware(XSSSanitizerMiddleware::class);
            Route::delete('/delete_role_permisison', [PermissionsController::class, 'rolePermissionDelete'])->middleware(XSSSanitizerMiddleware::class);
        });

        // Company Api's 
        Route::group(['prefix' => 'company'], function () {
            Route::post('/add', [CompanyController::class, 'companyOnBorading'])->middleware(XSSSanitizerMiddleware::class);
            Route::post('/get_auditee_list', [CompanyController::class, 'getAuditeeList'])->middleware(XSSSanitizerMiddleware::class);
            Route::post('/get_auditor_list', [CompanyController::class, 'getAuditorList'])->middleware(XSSSanitizerMiddleware::class);
            // Route::post('/assign', [PermissionsController::class, 'permissionAssignToRole'])->middleware(XSSSanitizerMiddleware::class);
            // Route::post('/update_role_permisison', [PermissionsController::class, 'rolePermissionUpdate'])->middleware(XSSSanitizerMiddleware::class);
            // Route::post('/delete_role_permisison', [PermissionsController::class, 'rolePermissionDelete'])->middleware(XSSSanitizerMiddleware::class);
        });

        // Packages Api's 
        Route::group(['prefix' => 'package'], function () {
            // Package Features
            Route::post('/add_feature', [PackageController::class, 'insertPackageFeature'])->middleware(XSSSanitizerMiddleware::class);
            Route::post('/get_features', [PackageController::class, 'getPackageFeature']);
            Route::post('/update_feature', [PackageController::class, 'updatePackageFeature'])->middleware(XSSSanitizerMiddleware::class);
            Route::delete('/delete_feature', [PackageController::class, 'deletePackageFeature']);
            // Packages 
            Route::post('/add_package', [PackageController::class, 'insertPackage'])->middleware(XSSSanitizerMiddleware::class);
            Route::post('/get_packages', [PackageController::class, 'getPackages']);
            Route::post('/update_package', [PackageController::class, 'updatePackage'])->middleware(XSSSanitizerMiddleware::class);
            Route::delete('/delete_package', [PackageController::class, 'deletePackage']);
            // Package Assign Company 
            Route::post('/package_assign_to_company', [PackageController::class, 'packageAssignCompany'])->middleware(XSSSanitizerMiddleware::class);
            Route::post('/update_package_assign_to_company', [PackageController::class, 'updatePackageAssignCompany'])->middleware(XSSSanitizerMiddleware::class);
            Route::delete('/delete_package_assign_to_company', [PackageController::class, 'deletePackageAssignCompany'])->middleware(XSSSanitizerMiddleware::class);
            Route::post('/get_package_assign_to_company', [PackageController::class, 'getPackageAssignCompany']);
            
        });

        // Standard Api's 
        Route::group(['prefix' => 'standard'], function () {
            Route::post('/add_standard', [StandardController::class, 'addStandard'])->middleware(XSSSanitizerMiddleware::class);
        });
    });
    // Handle unauthorized access
    Route::fallback(function () {
        return response()->json(['error' => 'API Not Found.','code' => 404], 404);
    });
});

