<style>
    .wrapper {
        width: 100%;
        padding-left: 200px;
        transition-duration: 0.5s;
    }

    .wrapper .sidebar {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0px;
        top: 0px;
        background: inherit;
        white-space: nowrap;
        transition-duration: 0.5s;
        z-index: 1000;
    }

    .wrapper .sidebar .sb-item-list {
        width: 100%;
        height: calc(100% - 50px);
    }

    .wrapper .sidebar .sb-item-list>.sb-item>a>.sb-text {
        position: absolute;
        transition-duration: 0.5s;
    }

    .wrapper .sidebar .sb-item {
        display: block;
        width: 100%;
        line-height: 50px;
        color: #ccc;
        background: #1d293e;
        cursor: pointer;
        padding-left: 7px;
    }

    .wrapper .sidebar .sb-item.active {
        border-left: solid 3px green;
        background: #0d8f63;
        box-sizing: border-box;
    }

    .wrapper .sidebar .sb-item.active>.sb-icon {
        margin-left: -3px;
    }

    .wrapper .sidebar .sb-icon {
        padding-left: 10px;
        padding-right: 20px;
    }

    .wrapper .sidebar .sb-item:hover,
    .wrapper .sidebar .sb-item.active {
        filter: brightness(130%);
    }

    .wrapper .sb-menu {
        position: relative;
    }

    .wrapper .sb-menu:after {
        content: " ";
        width: 0;
        height: 0;
        display: block;
        float: right;
        margin-top: 19px;
        margin-left: -12px;
        margin-right: 5px;
        border: solid 5px transparent;
        border-left-color: #eee;
    }

    .wrapper .sb-menu>.sb-submenu {
        display: none;
    }

    .wrapper .sb-menu:hover>.sb-submenu {
        position: absolute;
        display: block;
        width: 200px;
        top: 0;
        left: calc(100% + 1px);
    }

    .wrapper .sb-submenu>.sb-item:first-child {
        border-radius: 8px 8px 0px 0px;
    }

    .wrapper .sb-submenu>.sb-item:last-child {
        border-radius: 0px 0px 8px 8px;
    }

    .wrapper .btn-toggle-sidebar {
        position: absolute;
        left: 0;
        bottom: 0;
        border-top: 1px solid #aaa;
        user-select: none;
    }

    .wrapper .btn-toggle-sidebar .sb-icon {
        padding-left: 15px;
    }

    .wrapper .btn-toggle-sidebar .sb-icon.fa-angle-double-left {
        display: inline-block;
    }

    .wrapper .btn-toggle-sidebar .sb-icon.fa-angle-double-right {
        display: none;
    }

    .wrapper.sidebar-collapse {
        padding-left: 60px;
    }

    .wrapper.sidebar-collapse .sidebar {
        width: 60px;
    }

    .wrapper.sidebar-collapse .sb-item-list>.sb-item>a>.sb-text {
        position: absolute;
        transform: translateX(-200%);
        opacity: 0;
    }

    .wrapper.sidebar-collapse .btn-toggle-sidebar .sb-icon.fa-angle-double-left {
        display: none;
    }

    .wrapper.sidebar-collapse .btn-toggle-sidebar .sb-icon.fa-angle-double-right {
        display: inline-block;
    }
</style>
<div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash wrapper">
    <div class="user-profile-box mb-0 ">
        {{-- <div class="wrapper"> --}}
        <div class="sidebar" style="overflow: scroll;">
            <i class="fa fa-bars hamburger-toggle-sidebar"></i>
            <div class="sidebar-header text-center collapse_hide_item">
                <h2 class="text-white">Plot Mandi</h2>
                {{-- <img src="{{ asset(MyApp::SITE_LOGO) }}" alt="header-logo2.png">  --}}
            </div>
            <div class="header clearfix collapse_hide_item">
                {{-- <img src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-1.jpg') }}" alt="avatar" class="img-fluid profile-img"> --}}
                @if (auth()->user()->profile_picture == '')
                    <img alt="{{ auth()->user()->first_name }}" src="{{ asset(MyApp::ASSET_IMG . 'profile.png') }}"
                        class="img-fluid profile-img">
                @else:
                    <a href="#"><img alt="my-properties-3" src="images/feature-properties/fp-1.jpg"
                            class="img-fluid"></a>
                @endif
            </div>
            <div class="active-user">
                <h2>
                    <span class="collapse_hide_item text-white">{{ auth()->user()->first_name }}</span>
                    {{-- <br> --}}
                    @if (auth()->user()->acount_type == 2)
                        {{-- Dealer --}}
                    @elseif(auth()->user()->acount_type == 3)
                        {{-- User --}}
                    @endif
                </h2>
            </div>
            <div class="sb-item-list">
                {{-- <div class="sb-item"><i class="sb-icon fa fa-address-card"></i><span class="sb-text">Sidebar
                            Item1</span></div> --}}
                <div class="sb-item @if (Route::current()->uri == 'dashboard/user') active @endif">
                    <a title="Dashboard" class="text-white"
                        href="{{ route('user_dashboard') }}">
                        <i class="sb-icon fa fa-dashboard"></i> <span class="sb-text">Dashboard </span>
                    </a>
                </div>
                @if (auth()->user()->acount_type == 2)
                    <div class="sb-item @if (Route::current()->uri == 'dashboard/user/add_property') active @endif">
                        <a title="Add Property" class="text-white"
                            href="{{ route('add_property') }}">
                            <i class="sb-icon fa fa-building"></i> <span class="sb-text">Add Property </span>
                        </a>
                    </div>

                    <div class="sb-item @if (Route::current()->uri == 'dashboard/user/view_property_list') active @endif">
                        <a title="Property Listing" class="text-white"
                            href="{{ route('view_property_list') }}">
                            <i class="sb-icon fa fa-th-list"></i> <span class="sb-text">Property Listing </span>
                        </a>
                    </div>
                @else
                    <div class="sb-item @if (Route::current()->uri == 'dashboard/user') active @endif">
                        <a title="Favroute Property" class="text-white"
                            href="{{ route('user_dashboard') }}">
                            <i class="sb-icon fa fa-heart"></i> <span class="sb-text">Favroute Property </span>
                        </a>
                    </div>
                @endif

                {{-- <div class="sb-item"><i class="sb-icon fa fa-address-card"></i><span class="sb-text">Sidebar
                            Item2</span></div>
                    <div class="sb-item sb-menu"><i class="sb-icon fa fa-address-card"></i><span class="sb-text">Sidebar
                            Menu</span>
                        <div class="sb-submenu">
                            <div class="sb-item"><i class="sb-icon fa fa-address-card"></i><span class="sb-text">Level
                                    2</span>
                            </div>
                            <div class="sb-item sb-menu"><i class="sb-icon fa fa-address-card"></i><span
                                    class="sb-text">Level
                                    2</span>
                                <div class="sb-submenu">
                                    <div class="sb-item"><i class="sb-icon fa fa-address-card"></i><span
                                            class="sb-text">Level
                                            3</span></div>
                                    <div class="sb-item"><i class="sb-icon fa fa-address-card"></i><span
                                            class="sb-text">Level
                                            3</span></div>
                                    <div class="sb-item"><i class="sb-icon fa fa-address-card"></i><span
                                            class="sb-text">Level
                                            3</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sb-item"><i class="sb-icon fa fa-address-card"></i><span class="sb-text">Sidebar
                            Item3</span>
                    </div> --}}
                <div class="btn-toggle-sidebar sb-item">
                    <a title="Logout" class="text-white" href="{{ route('user_logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="sb-icon fa fa-sign-out"></i>
                        <span class="sb-text"><b>Logout</b></span>

                        <form id="logout-form" action="{{ route('user_logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
                {{-- <div class="btn-toggle-sidebar sb-item">
                            <i class="sb-icon fa fa-angle-double-left"></i>
                            <span class="sb-text">Collapse Sidebar</span>
                            <i class="sb-icon fa fa-angle-double-right"></i>
                    </div> --}}
            </div>
        </div>
        <div class="main"></div>
        {{-- </div> --}}
    </div>
</div>
<?php /* ?> ?> ?>
<div class="sidebar-header"><img src="{{ asset(MyApp::ASSET_IMG . 'logo-blue.svg') }}" alt="header-logo2.png"> </div>
<div class="header clearfix">
    {{-- <img src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-1.jpg') }}" alt="avatar" class="img-fluid profile-img"> --}}
    @if (auth()->user()->profile_picture == '')
        <img alt="{{ auth()->user()->first_name }}" src="{{ asset(MyApp::ASSET_IMG . 'profile.png') }}"
            class="img-fluid profile-img">
    @else:
        <a href="#"><img alt="my-properties-3" src="images/feature-properties/fp-1.jpg" class="img-fluid"></a>
    @endif
</div>
<div class="active-user">
    <h2>
        {{ auth()->user()->first_name }}
        <br>
        @if (auth()->user()->acount_type == 2)
            Dealer
        @elseif(auth()->user()->acount_type == 3)
            User
        @endif
    </h2>
</div>
<div class="detail clearfix">
    <ul class="mb-0">
        <li>
            <a class="@if (Route::current()->uri == 'dashboard/user') active @endif" href="{{ route('user_dashboard') }}">
                <i class="fa fa-map-marker"></i> Dashboard
            </a>
        </li>
        @if (auth()->user()->acount_type == 2)
            <li>
                <a class="@if (Route::current()->uri == 'dashboard/user/add_property') active @endif" href="{{ route('add_property') }}">
                    <i class="fa fa-user"></i>Add Property
                </a>
            </li>
            <li>
                <a class="@if (Route::current()->uri == 'dashboard/user/view_property_list') active @endif" href="{{ route('view_property_list') }}">
                    <i class="fa fa-user"></i>Property Listing
                </a>
            </li>
        @else
            <li>
                <a href="user-profile.html">
                    <i class="fa fa-list"></i>Favroute Property
                </a>
            </li>
        @endif
        <!-- <li>
            <a href="my-listings.html">
                <i class="fa fa-list" aria-hidden="true"></i>My Properties
            </a>
        </li>
        <li>
            <a href="favorited-listings.html">
                <i class="fa fa-heart" aria-hidden="true"></i>Favorited Properties
            </a>
        </li>
        <li>
            <a href="add-property.html">
                <i class="fa fa-list" aria-hidden="true"></i>Add Property
            </a>
        </li>
        {{-- <li>
            <a href="payment-method.html">
                <i class="fas fa-credit-card"></i>Payments
            </a>
        </li>
        <li>
            <a href="invoice.html">
                <i class="fas fa-paste"></i>Invoices
            </a>
        </li> --}}
        <li>
            <a href="change-password.html">
                <i class="fa fa-lock"></i>Change Password
            </a>
        </li> -->
        <li>
            <a href="{{ route('user_logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>Log Out
            </a>
            <form id="logout-form" action="{{ route('user_logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
<?php */ ?>
