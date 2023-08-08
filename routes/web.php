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
[File: web]
*/

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\WebUserController;

Route::get('/', function () {
    return view('homePage');
});

// Admin Login 
Route::get('/login/admin', [WebUserController::class,'adminLogin'])->name('admin_login');
Route::post('/login_request/admin', [WebUserController::class,'adminLoginForm'])->name('login_form_admin');
Route::post('/admin/logout', [WebUserController::class, 'adminLogout'])->name('admin_logout');

// User Login 
Route::get('/login', [WebUserController::class,'userLogin']);
Route::get('/register', [WebUserController::class,'userRegister'])->name("register");
Route::post('/login/user', [WebUserController::class,'userLoginForm'])->name("user_login");
Route::post('/register/user', [WebUserController::class,'userRegisterForm'])->name("registerForm");

// Dashboard Routes
Route::group(['middleware' => 'auth'], function () { 
    // Admin dashboard Routes 
    Route::get('/dashboard/admin', [WebUserController::class,'adminDashboard'])->name('admin_dashboard');
    Route::get('/dashboard/admin/dealer_list', [WebUserController::class,'adminDealerList'])->name('dealer_list');
    Route::get('/dashboard/admin/users_list', [WebUserController::class,'adminUserList'])->name('users_list');
    
    // User Dashboard Routes 
    Route::get('/dashboard/user', [WebUserController::class,'userDashboard'])->name('user_dashboard');
    Route::get('/dashboard/user/add_property', [WebUserController::class,'userDealerAddProperty'])->name('add_property');
    Route::get('/dashboard/user/view_property_list', [WebUserController::class,'userDealerViewProperty'])->name('view_property_list');
    
    
});

Route::fallback(function () {
    return redirect()->route('login');
});

