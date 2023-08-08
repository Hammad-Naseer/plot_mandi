<div class="detail clearfix">
    <ul class="mb-0">
        <li>
            <a class="active" href="{{ route('admin_dashboard') }}">
                <i class="fa fa-map-marker"></i> Dashboard
            </a>
        </li>
        @if(auth()->user()->acount_type == 2)
        <li>
            <a href="{{ route('add_property') }}">
                <i class="fa fa-user"></i>Add Property
            </a>
        </li>
        <li>
            <a href="{{ route('view_property_list') }}">
                <i class="fa fa-user"></i>Property Listing
            </a>
        </li>
        endif
        <li>
            <a href="user-profile.html">
                <i class="fa fa-list"></i>Favroute Property
            </a>
        </li>
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
            <a href="index-2.html">
                <i class="fas fa-sign-out-alt"></i>Log Out
            </a>
        </li>
    </ul>
</div>