@extends('layouts.dashboard_layout')
@section('content')
<!-- START SECTION DASHBOARD -->
<section class="user-page section-padding">
    <div class="container-fluid">
        <div class="row">
            @include('pages.admin.auth.admin_dashboard_menu')
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
                <div class="dashborad-box stat">
                    {{-- <h4 class="title">Manage Dashboard</h4> --}}
                    <div class="section-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xs-12 dar pro mr-1">
                                <div class="item">
                                    <div class="icon">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="number">345</h6>
                                        <p class="type ml-1">Dealers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12 dar pro mr-1">
                                <div class="item">
                                    <div class="icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="number">116</h6>
                                        <p class="type ml-1">Users</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12 dar pro mr-1">
                                <div class="item mb-0">
                                    <div class="icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="number">223</h6>
                                        <p class="type ml-1">Properties</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12 dar pro">
                                <div class="item mb-0">
                                    <div class="icon">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="number">432</h6>
                                        <p class="type ml-1"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashborad-box p-4">
                    <h4 class="title">Users Listing</h4>
                    <div class="section-body listing-table">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left" width="20%">User</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reg Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userList as $list)
                                    <tr>
                                        <td>
                                        <!-- class="first-col-align" -->
                                            <div class="pl-3">
                                                @if($list->profile_picture == "")
                                                <a href="#" class="text-dark">
                                                    <img alt="my-properties-3" width="50" src="{{ asset(MyApp::ASSET_IMG.'profile.png') }}" class="img-fluid">
                                                    &nbsp;&nbsp;
                                                    {{ $list->first_name .' '. $list->last_name }}
                                                </a>
                                                @else:
                                                <a href="#"><img alt="my-properties-3" src="images/feature-properties/fp-1.jpg" class="img-fluid"></a>
                                                @endif
                                               
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $list->email }}
                                        </td>
                                        <td class="text-center">{{ PlotDateFormater($list->created_at) }}</td>
                                        <td class="text-center">
                                            @if($list->is_active == 1)
                                            <button class="btn btn-success btn-sm">
                                                {{ getAccountStatus($list->is_active) }}
                                            </button> 
                                            @else
                                            <button class="btn btn-danger btn-sm">
                                                {{ getAccountStatus($list->is_active) }}
                                            </button>
                                            @endif
                                        </td>
                                        <td class="actions text-right">
                                            <a href="#" class="btn btn-success text-white"><i class="far fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger text-white"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- <div class="dashborad-box">
                    <h4 class="title">Message</h4>
                    <div class="section-body">
                        <div class="messages">
                            <div class="message">
                                <div class="thumb">
                                    <img class="img-fluid" src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-1.jpg') }}" alt="">
                                </div>
                                <div class="body">
                                    <h6>Mary Smith</h6>
                                    <p class="post-time">22 Minutes ago</p>
                                    <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                    <div class="controller">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="far fa-trash-alt"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="message">
                                <div class="thumb">
                                    <img class="img-fluid" src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-2.jpg') }}" alt="">
                                </div>
                                <div class="body">
                                    <h6>Karl Tyron</h6>
                                    <p class="post-time">23 Minutes ago</p>
                                    <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                    <div class="controller">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="far fa-trash-alt"></i></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="message">
                                <div class="thumb">
                                    <img class="img-fluid" src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-3.jpg') }}" alt="">
                                </div>
                                <div class="body">
                                    <h6>Lisa Willis</h6>
                                    <p class="post-time">53 Minutes ago</p>
                                    <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                    <div class="controller">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="far fa-trash-alt"></i></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashborad-box">
                    <h4 class="title">Review</h4>
                    <div class="section-body">
                        <div class="reviews">
                            <div class="review">
                                <div class="thumb">
                                    <img class="img-fluid" src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-4.jpg') }}" alt="">
                                </div>
                                <div class="body">
                                    <h5>Family House</h5>
                                    <h6>Mary Smith</h6>
                                    <p class="post-time">10 hours ago</p>
                                    <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                    <ul class="starts mb-0">
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star-o"></i>
                                        </li>
                                    </ul>
                                    <div class="controller">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="far fa-trash-alt"></i></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review">
                                <div class="thumb">
                                    <img class="img-fluid" src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-5.jpg') }}" alt="">
                                </div>
                                <div class="body">
                                    <h5>Bay Apartment</h5>
                                    <h6>Karl Tyron</h6>
                                    <p class="post-time">22 hours ago</p>
                                    <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                    <ul class="starts mb-0">
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star-o"></i>
                                        </li>
                                    </ul>
                                    <div class="controller">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="far fa-trash-alt"></i></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review">
                                <div class="thumb">
                                    <img class="img-fluid" src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-6.jpg') }}" alt="">
                                </div>
                                <div class="body">
                                    <h5>Family House Villa</h5>
                                    <h6>Lisa Willis</h6>
                                    <p class="post-time">51 hours ago</p>
                                    <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                    <ul class="starts mb-0">
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star-o"></i>
                                        </li>
                                    </ul>
                                    <div class="controller">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="far fa-trash-alt"></i></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashborad-box mb-0">
                    <h4 class="heading pt-0">Personal Information</h4>
                    <div class="section-inforamation">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your First name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your Last name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" class="form-control" placeholder="Ex: example@domain.com">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" placeholder="Ex: +1-800-7700-00">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" placeholder="Write your address here"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>About Yourself</label>
                                        <textarea name="address" class="form-control" placeholder="Write about userself"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="password-section">
                                <h6>Update Password</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" placeholder="Write new password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Repeat Password</label>
                                            <input type="password" class="form-control" placeholder="Write same password again">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg mt-2">Submit</button>
                        </form>
                    </div>
                </div> -->
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