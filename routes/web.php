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
Route::get('/login/admin', [WebUserController::class,'adminLogin']);
Route::post('/login_request/admin', [WebUserController::class,'adminLoginForm'])->name('login_form_admin');
// User Login 
Route::get('/login', [WebUserController::class,'userLogin']);
Route::get('/register', [WebUserController::class,'userRegister']);
// Dashboard Routes 
Route::get('/dashboard/admin', [WebUserController::class,'adminDashboard']);
Route::get('/dashboard/user', [WebUserController::class,'userDashboard']);


