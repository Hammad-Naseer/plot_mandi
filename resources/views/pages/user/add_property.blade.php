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
                <h2>Add Property</h2>
                <br>
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
                <form action="{{ route('submit_property_form') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="single-add-property">
                    <h3>Property description and price</h3>
                    <div class="property-form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="title">Property Title</label>
                                    <input type="text" name="property_title" id="title" placeholder="Enter your property title">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="description">Property Description</label>
                                    <textarea id="description" name="property_description" placeholder="Describe about your property"></textarea>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <select name="property_status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="1">Rent</option>
                                        <option value="2">Sale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <select name="property_type" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="1">house</option>
                                        <option value="2">commercial</option>
                                        <option value="3">apartment</option>
                                        <option value="4">lot</option>
                                        <option value="5">garage</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <select name="property_rooms" class="form-control">
                                        <option value="">Select Rooms</option>
                                        <option value="1" class="option">1</option>
                                        <option value="2" class="option">2</option>
                                        <option value="3" class="option">3</option>
                                        <option value="4" class="option">4</option>
                                        <option value="5" class="option">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <p class="no-mb">
                                    <label for="price">Price</label>
                                    <input type="text" name="property_price" placeholder="USD" id="price">
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p class="no-mb last">
                                    <label for="area">Area</label>
                                    <input type="text" name="property_area" placeholder="Sqft" id="area">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <h3>property Media</h3>
                    <div class="property-form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Property Images</h4>
                                <input type="file" class="form-control" style="padding: 3px;" multiple accept="jpg,png,gif" name="property_images[]">   
                                <br>
                                <small>You Can Upload Multiple Images</small>
                                {{-- <form action="https://code-theme.com/file-upload" class="dropzone"></form> --}}
                            </div>

                            <div class="col-md-6">
                                <h4>Property Videos</h4>
                                <input type="file" accept=".mp4" class="form-control" multiple style="padding: 3px;" name="property_videos[]">
                                <br>
                                <small>You Can Upload Multiple Videos</small>   
                                {{-- <form action="https://code-theme.com/file-upload" class="dropzone"></form> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <h3>property Location</h3>
                    <div class="property-form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <p>
                                    <label for="address">Address</label>
                                    <input type="text" name="property_address" placeholder="Enter Your Address" id="address">
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p>
                                    <label for="city">City</label>
                                    <input type="text" name="property_city" placeholder="Enter Your City" id="city">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <p>
                                    <label for="state">State</label>
                                    <input type="text" name="property_state" placeholder="Enter Your State" id="state">
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p>
                                    <label for="country">Country</label>
                                    <input type="text" name="property_country" placeholder="Enter Your Country" id="country">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <p class="no-mb first">
                                    <label for="latitude">Google Maps latitude</label>
                                    <input type="text" name="property_latitude" placeholder="Google Maps latitude" id="latitude">
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p class="no-mb last">
                                    <label for="longitude">Google Maps longitude</label>
                                    <input type="text" name="property_longitude" placeholder="Google Maps longitude" id="longitude">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <h3>Extra Information</h3>
                    <div class="property-form-group">
                        <div class="row">
                            {{-- <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                <div class="form-group categories">
                                    <div class="nice-select form-control wide" tabindex="0"><span class="current">Select Age</span>
                                        <ul class="list">
                                            <li data-value="1" class="option">0-1 years</li>
                                            <li data-value="2" class="option">0-5 years</li>
                                            <li data-value="1" class="option">0-10 years</li>
                                            <li data-value="2" class="option">0-15 years</li>
                                            <li data-value="1" class="option">0-20 years</li>
                                            <li data-value="2" class="option">0-50 years</li>
                                            <li data-value="1" class="option">50+ years</li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <select name="property_kitchens" class="form-control">
                                        <option value="">Select Kitchen</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <select name="property_bathrooms" class="form-control">
                                        <option value="">Select Bathroom</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <h3>Property Features</h3>
                    <div class="property-form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="pro-feature-add pl-0">
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-a" type="checkbox" name="features[]" value="1">
                                                <label for="check-a">Air Conditioning</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-b" type="checkbox" name="features[]" value="2">
                                                <label for="check-b">Swimming Pool</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-c" type="checkbox" name="features[]" value="3">
                                                <label for="check-c">Central Heating</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-d" type="checkbox" name="features[]" value="4">
                                                <label for="check-d">Laundry Room</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-e" type="checkbox" name="features[]" value="5">
                                                <label for="check-e">Gym</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-g" type="checkbox" name="features[]" value="6">
                                                <label for="check-g">Alarm</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-h" type="checkbox" name="features[]" value="7">
                                                <label for="check-h">Window Covering</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-i" type="checkbox" name="features[]" value="8">
                                                <label for="check-i">Refrigerator</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-j" type="checkbox" name="features[]" value="9">
                                                <label for="check-j">TV Cable & WIFI</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-k" type="checkbox" name="features[]" value="10">
                                                <label for="check-k">Microwave</label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <h3>Contact Information</h3>
                    <div class="property-form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <p>
                                    <label for="con-name">Name</label>
                                    <input type="text" placeholder="Enter Your Name" id="con-name" name="property_contact_name">
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p class="no-mb first">
                                    <label for="con-email">Email</label>
                                    <input type="email" placeholder="Enter Your Email" id="con-email" name="property_contact_email">
                                </p>
                            </div>
                            {{-- <div class="col-lg-6 col-md-12">
                                <p>
                                    <label for="con-user">Username</label>
                                    <input type="text" placeholder="Enter Your Username" id="con-user" name="con-user">
                                </p>
                            </div> --}}
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-12">
                                <p class="no-mb last">
                                    <label for="con-phn">Phone</label>
                                    <input type="text" placeholder="Enter Your Phone Number" id="con-phn" name="property_contact_phone">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="add-property-button pt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="prperty-submit-button">
                                    <button type="submit">Submit Property</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
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