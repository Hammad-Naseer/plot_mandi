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
use App\Http\Controllers\PlotPediaController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Home;
use App\Http\Controllers\OfferController;


Route::get('/', [Home::class,'homePage'])->name('homepage');
// Admin Login 
Route::get('/login/admin', [WebUserController::class,'adminLogin'])->name('admin_login');
Route::post('/login_request/admin', [WebUserController::class,'adminLoginForm'])->name('login_form_admin');
Route::post('/admin/logout', [WebUserController::class, 'adminLogout'])->name('admin_logout');

// User Login 
Route::get('/login', [WebUserController::class,'userLogin'])->name('userLogin');
Route::get('/register', [WebUserController::class,'userRegister'])->name("register");
Route::post('/login/user', [WebUserController::class,'userLoginForm'])->name("user_login");
Route::post('/register/user', [WebUserController::class,'userRegisterForm'])->name("registerForm");
Route::post('/user/dashboard/logout', [WebUserController::class, 'userLogout'])->name('user_logout');
Route::get('/user/forgot_password', [WebUserController::class, 'forgotPassword'])->name('forgot_password');
Route::post('/user/forgot_password_submit', [WebUserController::class, 'forgotPasswordSubmit'])->name('forgot_password_submit');
Route::get('/user/reset_password', [WebUserController::class, 'resetPassword'])->name('reset_password');
Route::post('/user/reset_password_submit', [WebUserController::class, 'resetPasswordSubmit'])->name('reset_password_submit');
Route::get('/user/account_verification', [WebUserController::class, 'accountVerification'])->name('account_verification');


// Dashboard Routes
Route::group(['middleware' => 'auth'], function () { 
    // Admin dashboard Routes 
    Route::get('/dashboard/admin', [WebUserController::class,'adminDashboard'])->name('admin_dashboard');
    Route::get('/dashboard/admin/users_list', [WebUserController::class,'adminUserList'])->name('users_list');
    Route::get('/dashboard/admin/delete_user/{string?}', [WebUserController::class,'deleteUserRecord'])->name('delete_user');
    Route::get('/dashboard/admin/edit_user/{string?}', [WebUserController::class,'editUser'])->name('edit_user');
    Route::post('/dashboard/admin/update_user_form', [WebUserController::class,'updateUserForm'])->name('update_user_form');

    // Dealer 
    Route::get('/dashboard/admin/dealer_list', [WebUserController::class,'adminDealerList'])->name('dealer_list');
    Route::get('/dashboard/admin/add_dealer', [WebUserController::class,'adminAddDealer'])->name('add_dealer');
    Route::post('/dashboard/admin/submit_dealer_form', [WebUserController::class,'adminDealerSubmit'])->name('submit_dealer_form');
    Route::get('/dashboard/admin/delete_dealer/{string?}', [WebUserController::class,'deleteDealerRecord'])->name('delete_dealer');
    Route::get('/dashboard/admin/edit_dealer/{string?}', [WebUserController::class,'editDealer'])->name('edit_dealer');
    Route::post('/dashboard/admin/update_dealer_form', [WebUserController::class,'updateDealerForm'])->name('update_dealer_form');
    Route::get('/dashboard/admin/delete_dealer_file/{string?}/{string2?}', [WebUserController::class,'deleteDealerFile'])->name('delete_dealer_file');
    
    // Plot Pedia
    Route::get('/dashboard/admin/add_pedia', [PlotPediaController::class,'addPedia'])->name('add_plot_pedia');
    Route::post('/dashboard/admin/submit_plot_pedia', [PlotPediaController::class,'submitPlotPedia'])->name('submit_plot_pedia');
    Route::get('/dashboard/admin/pedia_list', [PlotPediaController::class,'pediaList'])->name('plot_pedia_list');
    Route::get('/dashboard/admin/delete_pedia/{string?}', [PlotPediaController::class,'deletePediaRecord'])->name('delete_plot_pedia');
    Route::get('/dashboard/admin/edit_plot_pedia/{string?}', [PlotPediaController::class,'editPediaRecord'])->name('edit_plot_pedia');
    Route::post('/dashboard/admin/update_plot_pedia', [PlotPediaController::class,'updatePlotPedia'])->name('update_plot_pedia');

    // Posts
    Route::get('/dashboard/user/add_post', [PostsController::class,'addPost'])->name('add_post');
    Route::post('/dashboard/user/submit_post', [PostsController::class,'submitPost'])->name('submit_post');
    Route::get('/dashboard/user/posts_list', [PostsController::class,'postList'])->name('posts_list');
    Route::get('/dashboard/user/delete_post/{string?}', [PostsController::class,'deletePostRecord'])->name('delete_post');
    Route::get('/dashboard/user/edit_post/{string?}', [PostsController::class,'editPostRecord'])->name('edit_post');
    Route::post('/dashboard/user/update_post', [PostsController::class,'updatePost'])->name('update_post');
    Route::get('/dashboard/user/delete_post_file/{string?}/{string2?}', [PostsController::class,'deletePostFile'])->name('delete_post_file');

    // Offer
    Route::get('/dashboard/admin/add_offer', [OfferController::class,'addOffer'])->name('add_offer');
    Route::post('/dashboard/admin/submit_offer', [OfferController::class,'submitOffer'])->name('submit_offer');
    Route::get('/dashboard/admin/offer_list', [OfferController::class,'offerList'])->name('offer_list');
    Route::get('/dashboard/admin/delete_offer/{string?}', [OfferController::class,'deleteOfferRecord'])->name('delete_offer');
    Route::get('/dashboard/admin/edit_offer/{string?}', [OfferController::class,'editOfferRecord'])->name('edit_offer');
    Route::post('/dashboard/admin/update_offer', [OfferController::class,'updateOffer'])->name('update_offer');
    Route::get('/dashboard/admin/delete_offer_file/{string?}/{string2?}', [OfferController::class,'deleteOfferFile'])->name('delete_offer_file');
    
    // User Dashboard Routes 
    Route::get('/dashboard/user', [WebUserController::class,'userDashboard'])->name('user_dashboard');
    // Property 
    Route::get('/dashboard/user/add_property', [WebUserController::class,'userDealerAddProperty'])->name('add_property');
    Route::post('/dashboard/dealer/submit_property_form', [WebUserController::class,'submitPropertyForm'])->name('submit_property_form');
    Route::get('/dashboard/user/view_property_list', [WebUserController::class,'userDealerViewProperty'])->name('view_property_list');    
});

// Homepage Routes 
Route::get('/plot_pedia', [Home::class,'plotPediaPage'])->name('plot_pedia');
Route::get('/plot_pedia_detail/{string?}', [Home::class,'plotPediaDetail'])->name('plot_pedia_detail');
Route::get('/single-property/{string?}', [Home::class,'singleProperty'])->name('single_property');

// Modal Routes 
Route::get('/showPropertyImages', [Home::class,'showPropertyImages'])->name('showPropertyImages');
Route::get('/showPropertyVideos', [Home::class,'showPropertyVideos'])->name('showPropertyVideos');

Route::fallback(function () {
    return redirect()->route('login');
});

