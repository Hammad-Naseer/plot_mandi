<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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
        $loginArray = array(
            "email" =>  $request->email,
            "password"  =>  $request->password,
        );
        $apiURL = "http://127.0.0.1:8000/api/v1/login";
        $response = Http::connectTimeout(60)->post($apiURL, $loginArray);
        // $response = callCurl('login',"POST",$loginArray);
        print_r($response);
    }
}
