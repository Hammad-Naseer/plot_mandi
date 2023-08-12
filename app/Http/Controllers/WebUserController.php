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
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Str;

// Requests 
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\PropertyRequest;

// Models 
use App\Models\User;
use App\Models\Property;
use App\Models\PropertyMedia;

// Jobs
use App\Jobs\SendUserVerificationEmailJob;

// Resource 
use App\Http\Resources\LoginResource;


class WebUserController extends Controller
{

    protected $completeRoutePath;

    public function __construct(Request $request)
    {
        $this->completeRoutePath = $request->url();
    }

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
    
    public function userLoginForm(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->is_active == 1):
                if($user->acount_type == 2):
                    if (strpos($this->completeRoutePath, '/api/') !== false) {
                        return successResponse(new LoginResource($user), 200, "success");
                    }else{
                        return redirect()->route('user_dashboard');
                    }    
                elseif($user->acount_type == 3):
                    if (strpos($this->completeRoutePath, '/api/') !== false) {
                        return successResponse(new LoginResource($user), 200, "success");
                    }else{
                        return redirect()->route('user_dashboard');
                    }
                else:
                    if (strpos($this->completeRoutePath, '/api/') !== false) {
                        return successResponse(array("message" => "No Authorized"), 401, "error");
                    }else{
                        Session::flash('error', 'No Authorized'); 
                        return redirect()->route('user_dashboard');
                    }
                endif;
                // appActivityLogs(array('id' => $user->user_id, 'ip' => $request->ip(), 'action' => "login", 'action_id' => "", 'log_type' => "1","message" => "User Login Successfully", "table" => Route::currentRouteName()));
            else:
                if (strpos($this->completeRoutePath, '/api/') !== false) {
                    return successResponse(array("message" => "User Account Blocked"), 401, "error");
                }else{
                    Session::flash('error', 'Account Not Verified Please Verify Email'); 
                    return redirect()->back();
                }
            endif;
        }else{
            if (strpos($this->completeRoutePath, '/api/') !== false) {
                return successResponse(array("message" => "Invalid Crediential"), 404, "error");
            }else{
                Session::flash('error', 'Invalid Crediential'); 
                return redirect()->back();
            }
        }
    }

    public function userRegisterForm(RegisterRequest $request)
    {
        // DB::beginTransaction();

        $this->validate($request, [
            'first_name' => 'required|string||max:255',
            'last_name' => 'required|string||max:255',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|in:M,F,O',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->acount_type = 3;
        $user->created_by = 0;
        $user->remember_token = Str::random(60);
        $user->password = app('hash')->make($request->password);
        if ($user->save()) :
            // Dispatch the job
            SendUserVerificationEmailJob::dispatch($user)->delay(now()->addSeconds(5)); //->addMinutes(10) || ->addSeconds(5)
            // Commit the transaction
            if (strpos($this->completeRoutePath, '/api/') !== false) {
                return successResponse(array('message' => "Congrats! Your Account Created Please Verify Your Email"), 200, "success");
            }else{
                Session::flash('success', 'Congrats! Your Account Created Please Verify Your Email'); 
                return redirect()->route('register');
            } 
        else:
            if (strpos($this->completeRoutePath, '/api/') !== false) {
                return successResponse(array('message' => "Account Not Created"), 404, "error");
            }else{
                Session::flash('error', 'Account Not Created'); 
                return redirect()->route('register');
            }
        endif;

        // DB::commit();
        // DB::rollBack();
    }

    public function accountVerification()
    {
        $token = $_GET['token'];
        
        $user = User::where('remember_token', $token)->first();
        if (!$user) {
            Session::flash('error', "We couldn't find the email verification token."); 
            return redirect()->route('userLogin');
        }
        
        $email_verified_at = date("Y-m-d h:i:s");
        User::where('user_id', $user->user_id)->update(['email_verified_at' => $email_verified_at, 'is_active' => 1]);

        return view('pages.user.auth.account_verification');
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
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
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
            Session::flash('error', 'Invalid Crediential'); 
            return redirect()->back();
        }
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

    public function forgotPassword()
    {
        return view('pages.user.auth.forgot_password');
    }

    public function forgotPasswordSubmit(ForgotPasswordRequest $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if (!$user) {
            if (strpos($this->completeRoutePath, '/api/') !== false) {
                return successResponse(array('message' => "Account Does'nt Found"), 404, "error");
            }else{
                Session::flash('error', "Account Does'nt Found"); 
                return redirect()->route('forgot_password');
            }
        }
        $otp = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $user->update(['reset_token' => $otp]);

        // Send reset password email
        Mail::to($user->email)->send(new ResetPasswordMail($user));

        if (strpos($this->completeRoutePath, '/api/') !== false) {
            return successResponse(array('message' => "Reset password email sent"), 200, "success");
        }else{
            Session::flash('success', "Reset password email sent"); 
            return redirect()->route('reset_password');
        }
    }

    public function resetPassword()
    {
        return view('pages.user.auth.reset_password');
    }

    public function resetPasswordSubmit(ResetPasswordRequest $request)
    {   
        $resetToken = $request->input('reset_code');
        $password = $request->input('password');

        // Find the user by reset token
        $user = User::where('reset_token', $resetToken)->first();

        if (!$user) {
            if (strpos($this->completeRoutePath, '/api/') !== false) {
                return successResponse(array('message' => "Account Does'nt Found"), 404, "error");
            }else{
                Session::flash('error', "Account Does'nt Found"); 
                return redirect()->route('reset_password');
            }
        }

        // Reset the user's password
        $user->update([
            'password' => Hash::make($password),
            'reset_token' => null,
        ]);

        if (strpos($this->completeRoutePath, '/api/') !== false) {
            return successResponse(array('message' => "Password reset successful"), 200, "success");
        }else{
            Session::flash('success', "Password reset successful"); 
            return redirect()->route('reset_password');
        }
    }

    public function adminAddDealer()
    {
        // if(Auth::user()->usermanagement->account_type == 1):
        // else:
        // endif;
        return view('pages.admin.add_dealer');
    }

    public function adminDealerSubmit(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string||max:255',
            'last_name' => 'required|string||max:255',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|in:M,F,O',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
            'office_address' => 'required',
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->acount_type = 2;
        $user->remember_token = Str::random(60);
        $user->created_by = Auth::user()->user_id;
        $user->password = app('hash')->make($request->password);
        if ($user->save()) :
            $insertedId = $user->user_id;
            // Dealer Details 
            if ($request->hasFile('office_picture') && $request->file('office_picture')->isValid()) {
                $fileNamePicture = uploadFile($request->file('office_picture'), 'uploads/dealer/'.$insertedId.'/office', array('jpg','png','gif'));
                // $file = $request->file('office_picture');
                // $fileNamePicture = time() . '_' . $file->getClientOriginalName();
                // $file->storeAs('uploads/dealer/'.$insertedId, $fileNamePicture);
            }

            if ($request->hasFile('office_video') && $request->file('office_video')->isValid()) {
                $fileNameVideo = uploadFile($request->file('office_video'), 'uploads/dealer/'.$insertedId.'/office', array('mp4'));                
                // $file = $request->file('office_video');
                // $fileNameVideo = time() . '_' . $file->getClientOriginalName();
                // $file->storeAs('uploads/dealer/'.$insertedId, $fileNameVideo);
            }

            $dealerDetailsArr = array(
                'user_id'   =>  $insertedId,
                'office_picture'   =>  $fileNamePicture,
                'office_video'   =>  $fileNameVideo,
                'cnic'   =>  $request->cnic,
                'created_at'   =>  date("Y-m-d"),
            );
            DB::table("dealer_details")->insert($dealerDetailsArr);
            // Dispatch the job
            SendUserVerificationEmailJob::dispatch($user)->delay(now()->addSeconds(5));
            // Commit the transaction
            Session::flash('success', 'Congrats! Dealer Account Created Ask Them Verify Email'); 
            return redirect()->route('add_dealer');
        else:
            Session::flash('error', 'Account Not Created'); 
            return redirect()->route('add_dealer');
        endif;
    }

    public function adminDealerList()
    {
        // if(Auth::user()->usermanagement->account_type == 1):
        // else:
        // endif;
        $userList = DB::table("users")->where("acount_type",2)->get();
        return view('pages.admin.dealer_list')->with('userList', $userList);
    }

    public function adminUserList()
    {
        // if(Auth::user()->usermanagement->account_type == 1):
        // else:
        // endif;
        $userList = DB::table("users")->where("acount_type",3)->get();
        return view('pages.admin.users_list')->with('userList', $userList);
    }

    public function userDealerAddProperty()
    {
        // if(Auth::user()->usermanagement->account_type == 1):
        // else:
        // endif;
        return view('pages.user.add_property');
    }

    public function userDealerViewProperty(Request $request)
    {
        $userAgent = $request->header('User-Agent');
        $propertyList = DB::table("property")
                        ->join("property_media", "property.property_id", "=", "property_media.property_id")
                        ->where("property.is_active", 1)
                        ->where("property.created_by", auth()->user()->user_id)
                        ->select("property.*", "property_media.*")
                        ->get();
        if (strpos($this->completeRoutePath, '/api/') !== false) {
            return successResponse($propertyList,200,"success");
        }else{
            return view('pages.user.view_property_list')->with('propertyList', $propertyList);
        }
    }

    public function userLogout(Request $request)
    {
        $user = Auth::user();
        if($user != null):
            Auth::guard("web")->logout();
            $request->session()->flush();
            return redirect()->route('userLogin');
        else:
            return errorResponse("An error occurred", 400);
        endif;
    }


    /*****************/
    // DEALER FUNCTION 
    /*****************/

    public function submitPropertyForm(PropertyRequest $request)
    {   
        $property = new Property();
        $property->property_title = $request->input('property_title');
        $property->property_description = $request->input('property_description');
        $property->property_status = $request->input('property_status');
        $property->property_type = $request->input('property_type');
        $property->property_rooms = $request->input('property_rooms');
        $property->property_price = $request->input('property_price');
        $property->property_area = $request->input('property_area');
        $property->property_address = $request->input('property_address');
        $property->property_city = $request->input('property_city');
        $property->property_state = $request->input('property_state');
        $property->property_country = $request->input('property_country');
        $property->property_latitude = $request->input('property_latitude');
        $property->property_langitude = $request->input('property_longitude');
        $property->property_kitchens = $request->input('property_kitchens');
        $property->property_bathrooms = $request->input('property_bathrooms');
        $property->property_features = json_encode($request->input('features'));
        $property->property_contact_name = $request->input('property_contact_name');
        $property->property_contact_email = $request->input('property_contact_email');
        $property->property_contact_phone = $request->input('property_contact_phone');
        $property->created_by = auth()->user()->user_id;
        if ($property->save()) :

            $insertedId = $property->property_id;
            // Upload Property Image Media 
            if ($request->hasFile('property_images')) {
                foreach ($request->file('property_images') as $image) {
                    $filePath = uploadFile($image, 'uploads/dealer/property/'.$insertedId, array('jpg','png','gif'));                    
                    PropertyMedia::create([
                        'property_id' => $insertedId,
                        'file_name' => $filePath,
                        'file_type' => "image",
                    ]);
                }
            }

            // Upload Property Video Media 
            if ($request->hasFile('property_videos')) {
                foreach ($request->file('property_videos') as $video) {
                    $filePath = uploadFile($video, 'uploads/dealer/property/'.$insertedId, array('mp4'));                    
                    PropertyMedia::create([
                        'property_id' => $insertedId,
                        'file_name' => $filePath,
                        'file_type' => "video",
                    ]);
                }
            }

            if (strpos($this->completeRoutePath, '/api/') !== false) {
                return successResponse(array("message" => "Property Added Successfully"),200,"success");
            } else {
                Session::flash('success', 'Property Added Successfully'); 
                return redirect()->route('add_property');
            }

        else:
            if (strpos($this->completeRoutePath, '/api/') !== false) {
                return successResponse(array("message" => "Property Not Added, errro"),404,"error");
            } else {
                Session::flash('error', 'Property Not Addess, error'); 
                return redirect()->route('add_property');
            }
        endif;

    }
}
