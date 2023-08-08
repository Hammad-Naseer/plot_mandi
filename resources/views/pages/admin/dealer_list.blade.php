@extends('layouts.dashboard_layout')
@section('content')
<!-- START SECTION DASHBOARD -->
<section class="user-page section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
                <div class="user-profile-box mb-0">
                    <div class="sidebar-header"><img src="{{ asset(MyApp::ASSET_IMG.'logo-blue.svg') }}" alt="header-logo2.png"> </div>
                    <div class="header clearfix">
                        <img src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-1.jpg') }}" alt="avatar" class="img-fluid profile-img">
                    </div>
                    <div class="active-user">
                        <h2>{{ auth()->user()->first_name }}</h2>
                    </div>
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
                <h2>Dealer Listing</h2>
                <a href="" class="btn btn-primary float-right"> <i class="fa fa-plus"></i> Add Dealer</a>
                <br><br>
                <div class="my-properties">
                    <table class="table-responsive">
                        <thead>
                            <tr>
                                <th class="pl-2">Dealer Details</th>
                                <th class="p-0"></th>
                                <th>Reg Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="image myelist">
                                    <a href="single-property-1.html"><img alt="my-properties-3" src="images/feature-properties/fp-1.jpg" class="img-fluid"></a>
                                </td>
                                <td>
                                <div class="inner">
                                        <a href="single-property-1.html"><h2>Adil Khan</h2></a>
                                        <figure><i class="lni-map-marker"></i><b>City :</b> Lahore</figure>
                                        <figure><i class="lni-map-marker"></i> <b>Phone : </b> 03415627372</figure>
                                        <figure><i class="lni-map-marker"></i> <b>Gender : </b> Male</figure>
                                    </div>
                                </td>
                                <td>08.14.2020</td>
                                <td><button class="btn btn-success btn-sm">Active</button> </td>
                                <td class="actions">
                                    <a href="#" class="edit"><i class="lni-pencil"></i>Edit</a>
                                    <a href="#"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="pagination-container">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="btn btn-common" href="#"><i class="lni-chevron-left"></i> Previous </a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="btn btn-common" href="#">Next <i class="lni-chevron-right"></i></a></li>
                            </ul>
                        </nav>
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