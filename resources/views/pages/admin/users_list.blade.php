@extends('layouts.dashboard_layout')
@section('content')
<style>
    .my-properties table tbody tr td .inner figure {
        margin-bottom: 5px;
    }
</style>
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
                <br>
                <h2>Users Listing</h2>
                <br>
                <div class="my-properties">
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
                                                {{ $list->first_name }}
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
                                    <td class="text-right">
                                        <a href="#" class="btn btn-success text-white"><i class="far fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger text-white"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container">
                        {{-- <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="btn btn-common" href="#"><i class="lni-chevron-left"></i> Previous </a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="btn btn-common" href="#">Next <i class="lni-chevron-right"></i></a></li>
                            </ul>
                        </nav> --}}
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