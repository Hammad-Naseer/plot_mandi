@extends('layouts.app')
@section('content')
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>Forgot Password</h1>
            <h2><a href="/">Home </a> &nbsp;/&nbsp; forgot password</h2>
        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->

<!-- START SECTION LOGIN -->
<div id="login">
    <div class="p-5 m-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Login Image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
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
                <h2>Forgot Password</h2>
                @if(Session::has('success'))
                    <form action="{{ route('reset_password_submit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>OTP Code</label>
                            <input type="number" class="form-control" name="reset_code" required>
                            <i class="icon_lock_alt"></i>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="password" required>
                            <i class="icon_lock_alt"></i>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn_1 rounded full-width" type="submit">Forgot</button>
                    </form>
                @else
                    <form action="{{ route('forgot_password_submit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                            <i class="icon_mail_alt"></i>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn_1 rounded full-width" type="submit">Forgot</button>
                    </form>
                @endif
                
            </div>
        </div>
    </div>
</div>
<!-- END SECTION LOGIN -->
@endsection