<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class WebUserController extends Controller
{

    public function adminDashboard()
    {
        // if(Auth::user()->usermanagement->account_type == 1):
        // else:
        // endif;
        return view('pages.admin.dashboard');
    }

    public function userDashboard()
    {
        // if(Auth::user()->usermanagement->account_type == 1):
        // else:
        // endif;
        return view('pages.user.dashboard');
    }

    public function userRegister()
    {
        // if(Auth::user()->usermanagement->account_type == 1):
        // else:
        // endif;
        return view('pages.user.auth.register');
    }

    public function userLogin()
    {
        // if(Auth::user()->usermanagement->account_type == 1):
        // else:
        // endif;
        return view('pages.user.auth.login');
    }

    public function adminLogin()
    {
        // if(Auth::user()->usermanagement->account_type == 1):
        // else:
        // endif;
        return view('pages.admin.auth.login');
    }

    public function adminLoginForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return redirect('/login/admin')
                ->withErrors($validator)
                ->withInput();
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->is_active == 1):
                appActivityLogs(array('id' => $user->user_id, 'ip' => $request->ip(), 'action' => "login", 'action_id' => "", 'log_type' => "1","message" => "User Login Successfully", "table" => Route::currentRouteName()));
                return redirect()->route('admin_dashboard');
            endif;
        }

        // Authentication failed
        return redirect('/login/admin')
            ->withErrors(['login' => 'Invalid email or password'])
            ->withInput();
    }
}
