@extends('layouts.dashboard_layout')
@section('content')
<!-- START SECTION DASHBOARD -->
<style>
    .multipleFiles{
        width: 100% !important;
        padding: 9px !important;
        border: 1px solid #18ba60 !important;
        height: 45px;
        border-radius: 8px !important;
        margin-bottom: 10px;
    }
</style>
<section class="user-page section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
                <div class="user-profile-box mb-0">
                    
                    @include('pages.user.auth.user_dashboard_menu')
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
                <div class="col-lg-12 mobile-dashbord dashbord">
                    <div class="dashboard_navigationbar dashxl">
                        <div class="dropdown">
                            <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10 mr-2"></i> Dashboard Navigation</button>
                            <ul id="myDropdown" class="dropdown-content">
                                <li>
                                    <a class="active" href="dashboard.html">
                                        <i class="fa fa-map-marker mr-3"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="user-profile.html">
                                        <i class="fa fa-user mr-3"></i>Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="my-listings.html">
                                        <i class="fa fa-list mr-3" aria-hidden="true"></i>My Properties
                                    </a>
                                </li>
                                <li>
                                    <a href="favorited-listings.html">
                                        <i class="fa fa-heart mr-3" aria-hidden="true"></i>Favorited Properties
                                    </a>
                                </li>
                                <li>
                                    <a href="add-property.html">
                                        <i class="fa fa-list mr-3" aria-hidden="true"></i>Add Property
                                    </a>
                                </li>
                                <li>
                                    <a href="payment-method.html">
                                        <i class="fas fa-credit-card mr-3"></i>Payments
                                    </a>
                                </li>
                                <li>
                                    <a href="invoice.html">
                                        <i class="fas fa-paste mr-3"></i>Invoices
                                    </a>
                                </li>
                                <li>
                                    <a href="change-password.html">
                                        <i class="fa fa-lock mr-3"></i>Change Password
                                    </a>
                                </li>
                                <li>
                                    <a href="index-2.html">
                                        <i class="fas fa-sign-out-alt mr-3"></i>Log Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h2>Add Post</h2>
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
                <br>
                <div class="my-properties mb-4">
                <form action="{{ route('submit_post') }}" class="row" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="">Select Type</option>
                            <option value="1">Rent</option>
                            <option value="2">Sale</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 input-multiple-container">
                        <label for="off_doc">Office Document</label><br>
                        <button type="button" class="btn btn-info btn-sm" id="addMultipleFileDocument">
                        <i class="fa fa-plus"></i> Add Image
                        </button>
                        <br><br>
                        <div id="fileDocumentInputs">
                            <input type="file" name="office_document[]" accept=".jpg,.png,.doc,.xlsx,.pdf" id="off_doc" class="form-control multipleFiles" required>
                        </div>
                    </div>

                    <div class="form-group col-md-6 input-multiple-container">
                        <label for="off_pic">Office Picture</label><br>
                        <button type="button" class="btn btn-info btn-sm" id="addMultipleFileImage">
                        <i class="fa fa-plus"></i> Add Image
                        </button>
                        <br><br>
                        <div id="fileImageInputs">
                            <input type="file" name="office_picture[]" accept=".jpg,.png,.gif" id="off_pic" class="form-control multipleFiles" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6 input-multiple-container">
                        <label for="off_vid">Office Video</label><br>
                        <button type="button" class="btn btn-info btn-sm" id="addMultipleFileVideo">
                            <i class="fa fa-plus"></i> Add Video
                        </button>
                        <br><br>
                        <div id="fileVideoInputs">
                            <input type="file" name="office_video[]" id="off_vid" accept=".mp4" class="form-control multipleFiles" required>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button class="btn btn-success float-right btn-lg" type="submit"><b>Add Post</b></button>
                    </div>
                </form>
                </div>

                <!-- START FOOTER -->
                <div class="second-footer">
                    <div class="container">
                        <p>{{ date('Y') }} © Copyright - All Rights Reserved.</p>
                        <p>Made With <i class="fa fa-heart" aria-hidden="true"></i> By ZeeAr</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION DASHBOARD -->
@endsection