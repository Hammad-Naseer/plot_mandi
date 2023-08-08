@extends('layouts.app')
@section('content')
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>Register</h1>
            <h2><a href="/">Home </a> &nbsp;/&nbsp; Register</h2>
        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->

<!-- START SECTION LOGIN -->
<div id="login">
    <div class="login" style="overflow:hidden;">
        @if(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form autocomplete="off" method="post" action="{{ route('registerForm') }}">
            @csrf
            <div class="form-group">
                <label>First Name</label>
                <input class="form-control" type="text" name="first_name" required>
                <i class="ti-user"></i>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input class="form-control" type="text" name="last_name" required>
                <i class="ti-user"></i>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name="email" required>
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" id="password1" name="password" required>
                <i class="icon_lock_alt"></i>
            </div>
            <div class="form-group">
                <label>Confirm password</label>
                <input class="form-control" type="password" id="password2" name="password_confirmation" required>
                <i class="icon_lock_alt"></i>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" type="number" name="phone" required>
                <i class="icon_lock_alt"></i>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control" id="" required>
                    <option value="">Select Gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>City</label>
                <select name="city" class="form-control" id="" required>
                    <option value="">Select City</option>
                    @foreach(citiesByCountryID() as $city)
                        <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>  
                    @endforeach
                </select>
                <i class="icon_mail_alt"></i>
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control"></textarea>
                <i class="icon_mail_alt"></i>
            </div>
            <div id="pass-info" class="clearfix"></div>
            <button type="submit" class="btn_1 rounded full-width add_top_30">Register Now!</button>
            <div class="text-center add_top_10">Already have an acccount? <strong><a href="{{ url('login') }}">Sign In</a></strong></div>
        </form>
    </div>
</div>
<!-- END SECTION LOGIN -->
@endsection