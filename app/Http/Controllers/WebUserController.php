<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class WebUserController extends Controller
{

    public function adminDashboard()
    {
        if(Auth::user()->acount_type == 1):
            return view('pages.admin.dashboard');
        else:
            return redirect()->route('admin_login');
        endif;
    }

    public function userDashboard()
    {
        // if(Auth::user()->usermanagement->account_type == 1):
        if(Auth::user()->acount_type == 3):
            return view('pages.user.dashboard');
        elseif(Auth::user()->acount_type == 2):
            return view('pages.user.dashboard');
        else:
            return redirect()->route('login');
        endif;
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
        try {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        // if ($validator->fails()) {
        //     return redirect()->back()->with('error',$validator);
        //     // return redirect('/login/admin')
        //     //     ->withErrors($validator)
        //     //     ->withInput();
        // }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->is_active == 1):
                // appActivityLogs(array('id' => $user->user_id, 'ip' => $request->ip(), 'action' => "login", 'action_id' => "", 'log_type' => "1","message" => "User Login Successfully", "table" => Route::currentRouteName()));
                return redirect()->route('admin_dashboard');
            endif;
        }else{
            return redirect()->back()->with('error_login',"Invalid email or password");
        }

        // Authentication failed
    } catch (ValidationException $exception) {
        return errorResponse("An error occurred", 400);
    }
        // return redirect('/login/admin')
        //     ->withErrors(['login' => 'Invalid email or password'])
        //     ->withInput();
    }

    public function adminLogout(Request $request)
    {
        $user = Auth::user();
        if($user != null):
            Auth::guard("web")->logout();
            $request->session()->flush();
            // return redirect()->route('/');
            // appActivityLogs(array('id' => $user->user_id, 'ip' => $request->ip(), 'action' => "logout", 'action_id' => "", 'log_type' => "1", "message" => "Azure Logout Successfully", "table" => Route::currentRouteName()));
            // if ($user->tokens()->where('tokenable_id', $user->user_id)->exists()) {
            //     $user->tokens()->delete();
            // }
            // return successResponse(array("message","User Logout"),200,"success");
            return redirect()->route('admin_login');
        else:
            return errorResponse("An error occurred", 400);
        endif;
    }
}
