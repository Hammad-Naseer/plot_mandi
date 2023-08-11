<div class="sidebar-header"><img src="{{ asset(MyApp::ASSET_IMG.'logo-blue.svg') }}" alt="header-logo2.png"> </div>
<div class="header clearfix">
    {{-- <img src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-1.jpg') }}" alt="avatar" class="img-fluid profile-img"> --}}
    @if(auth()->user()->profile_picture == "")
    <img alt="{{ auth()->user()->first_name }}" src="{{ asset(MyApp::ASSET_IMG.'profile.png') }}" class="img-fluid profile-img">
    @else:
    <a href="#"><img alt="my-properties-3" src="images/feature-properties/fp-1.jpg" class="img-fluid"></a>
    @endif
</div>
<div class="active-user">
    <h2>
        {{ auth()->user()->first_name }}
        <br>
        @if(auth()->user()->acount_type == 2)
            Dealer
        @elseif(auth()->user()->acount_type == 3)
            User
        @endif
    </h2>
</div>
<div class="detail clearfix">
    <ul class="mb-0">
        <li>
            <a class="@if(Route::current()->uri == 'dashboard/user') active @endif" href="{{ route('user_dashboard') }}">
                <i class="fa fa-map-marker"></i> Dashboard
            </a>
        </li>
        @if(auth()->user()->acount_type == 2)
        <li>
            <a class="@if(Route::current()->uri == 'dashboard/user/add_property') active @endif" href="{{ route('add_property') }}">
                <i class="fa fa-user"></i>Add Property
            </a>
        </li>
        <li>
            <a class="@if(Route::current()->uri == 'dashboard/user/view_property_list') active @endif" href="{{ route('view_property_list') }}">
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
            <a href="{{ route('user_logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>Log Out
            </a>
            <form id="logout-form" action="{{ route('user_logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>