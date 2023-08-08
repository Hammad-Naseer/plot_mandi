@extends('layouts.app')
@section('content')
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>Admin Login</h1>
            <h2><a href="index-2.html">Home </a> &nbsp;/&nbsp; login</h2>
        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->

<!-- START SECTION LOGIN -->
<div id="login">
    <div class="login">
        @if($errors->has('error'))
            <div class="alert alert-danger">{{ $errors->first('error') }}</div>
        @endif

        @if(isset($error_login))
            <div class="alert alert-danger">{{ $error_login }}</div>
        @endif
        
        <form action="{{ route('login_form_admin') }}" method="post">
        @csrf
            <div class="form-group">
                <h2>Admin Login</h2>
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" value="" required>
                <i class="icon_lock_alt"></i>
            </div>
            <div class="fl-wrap filter-tags clearfix add_bottom_30">
                <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
            </div>
            <button class="btn_1 rounded full-width" type="submit">Login</button>
        </form>
    </div>
</div>
<!-- END SECTION LOGIN -->
@endsection