@extends('layouts.app')
@section('content')
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>Login</h1>
            <h2><a href="index-2.html">Home </a> &nbsp;/&nbsp; login</h2>
        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->

<!-- START SECTION LOGIN -->
<div id="login">
    <div class="login">
        @if(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
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
        <form action="{{ route('user_login') }}" method="post">
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
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" value="">
                <i class="icon_lock_alt"></i>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="fl-wrap filter-tags clearfix add_bottom_30">
                <div class="checkboxes float-left">
                    <div class="filter-tags-wrap">
                        <input id="check-b" type="checkbox" name="check">
                        <label for="check-b">Remember me</label>
                    </div>
                </div>
                <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
            </div>
            <button class="btn_1 rounded full-width" type="submit">Login</button>
            <div class="text-center add_top_10">Create new Account ? <strong><a href="{{ url('register') }}">Sign up!</a></strong></div>
        </form>
    </div>
</div>
<!-- END SECTION LOGIN -->
@endsection