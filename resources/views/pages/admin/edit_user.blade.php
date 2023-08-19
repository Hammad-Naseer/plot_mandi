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
                    
                    @include('pages.admin.auth.admin_dashboard_menu')
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
                <h2>Edit User</h2>
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
                <form action="{{ route('update_user_form') }}" class="row" method="post" enctype="multipart/form-data">
                    @csrf
                            <div class="form-group col-md-4">
                                <label for="fn">First Name</label>
                                <input type="text" class="form-control" value="{{ $editUser->first_name }}" id="fn" name="first_name" required>
                                <input type="hidden" value="{{ $editUser->user_id }}" name="id">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ln">Last Name</label>
                                <input type="text" class="form-control" value="{{ $editUser->last_name }}" id="ln" name="last_name" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="em">Email</label>
                                <input type="email" class="form-control" value="{{ $editUser->email }}" id="em" name="email" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ph">Phone</label>
                                <input type="number" class="form-control" value="{{ $editUser->phone }}" id="ph" name="phone" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="gen">Gender</label>
                                <select name="gender" class="form-control" id="gen" required>
                                    <option value="">Select Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                                <script>
                                    $("[name='gender']").val('{{ $editUser->gender }}')
                                </script>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="city">City</label>
                                <select name="city" class="form-control" id="city" required>
                                    <option value="">Select City</option>
                                    @foreach(citiesByCountryID() as $city)
                                        <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>  
                                    @endforeach
                                </select>
                                <script>
                                    // setTimeout(function() {
                                        $("#city").val({{ $editUser->city }})
                                    // }, 500)
                                </script>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address">Office Address</label>
                                <input name="office_address" id="address" value="{{ $editUser->address }}" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="blog_image">Status</label><br>
                                <select name="status" class="form-control" id="">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <script>
                                    $("[name='status']").val({{ $editUser->is_active }})
                                </script>
                            </div>
                            <div class="form-group col-md-12">
                                <button class="btn btn-success float-right btn-lg" type="submit"><b>Update User</b></button>
                            </div>
                        {{-- </div> --}}
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