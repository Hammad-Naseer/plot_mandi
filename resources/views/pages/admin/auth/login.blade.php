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
        <form>
            <div class="form-group">
                <h2>Admin Login</h2>
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" value="">
                <i class="icon_lock_alt"></i>
            </div>
            <div class="fl-wrap filter-tags clearfix add_bottom_30">
                <!-- <div class="checkboxes float-left">
                    <div class="filter-tags-wrap">
                        <input id="check-b" type="checkbox" name="check">
                        <label for="check-b">Remember me</label>
                    </div>
                </div> -->
                <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
            </div>
            <a href="#0" class="btn_1 rounded full-width">Login</a>
        </form>
    </div>
</div>
<!-- END SECTION LOGIN -->
@endsection