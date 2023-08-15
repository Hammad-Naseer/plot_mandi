@extends('layouts.dashboard_layout')
@section('content')
<!-- START SECTION DASHBOARD -->
<section class="user-page section-padding">
    <div class="container-fluid">
        <div class="row">
            @include('pages.user.auth.user_dashboard_menu')
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
                    <h4 class="title">Dummy Table</h4>
                    <div class="section-body listing-table">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Listing Name</th>
                                        <th>Date</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
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