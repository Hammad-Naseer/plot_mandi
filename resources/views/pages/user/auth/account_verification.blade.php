@extends('layouts.app')
@section('content')
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>Account Verifcation</h1>
            <h2><a href="/">Home </a> &nbsp;/&nbsp; account verification</h2>
        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->

<!-- START SECTION LOGIN -->
<div id="login">
    <div class="p-5 m-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-lg-12 col-xl-12 text-center">
                <img src="{{ asset(MyApp::ASSET_IMG.'verified-account.png') }}" width="200" class="img-fluid" alt="Account Verification Image">
                <h2>Thanks For Account Verification</h2>
                <p>Thank you for verifying your account with us,
                    <br>
                    Your trust means a lot, it's true.
                    We're thrilled to welcome you on board,
                    Ready to serve and assist, just for you!</p>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION LOGIN -->
@endsection