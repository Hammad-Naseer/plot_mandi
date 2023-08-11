@extends('layouts.dashboard_layout')
@section('content')
<!-- START SECTION DASHBOARD -->
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
                <br>
                <h2>My Property Listing</h2>
                <br>
                <div class="my-properties">
                    <table class="table-responsive">
                        <thead>
                            <tr>
                                <th class="pl-2">Properties Details</th>
                                <th class="p-0"></th>
                                <th>Reg Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($propertyList as $list)
                            <tr>
                                <td class="image myelist">
                                    @if($list->file_name == "" && $list->file_type == "image")
                                        <a href="#"><img alt="my-properties-3" src="{{ storage() }}" class="img-fluid"></a>
                                    @else:
                                        <a href="#"><img alt="my-properties-3" src="{{ Storage::url($list->file_name) }}" class="img-fluid"></a>
                                    @endif
                                </td>
                                <td>
                                <div class="inner">
                                        <a href="single-property-1.html"><h2>{{ $list->property_title }}</h2></a>
                                        <figure><i class="lni-map-marker"></i><b>City :</b> {{ $list->property_city }}</figure>
                                        <figure><i class="lni-map-marker"></i> <b>Phone : </b> {{ $list->property_contact_phone }}</figure>
                                        <figure><i class="lni-map-marker"></i> <b>Status : </b> {{ $list->property_status }}</figure>
                                        <figure><i class="lni-map-marker"></i> <b>Price : </b> {{ $list->property_price }}</figure>
                                    </div>
                                </td>
                                <td>{{ PlotDateFormater($list->created_at,"Y-m-d") }}</td>
                                <td><button class="btn btn-success btn-sm">{{ getAccountStatus($list->is_active) }}</button> </td>
                                <td class="actions">
                                    <a href="#" class="edit"><i class="lni-pencil"></i>Edit</a>
                                    <a href="#"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-container">
                        {{-- <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="btn btn-common" href="#"><i class="lni-chevron-left"></i> Previous </a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="btn btn-common" href="#">Next <i class="lni-chevron-right"></i></a></li>
                            </ul>
                        </nav>
                    </div> --}}
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