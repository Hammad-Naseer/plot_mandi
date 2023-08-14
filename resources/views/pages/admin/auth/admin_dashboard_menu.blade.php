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
        background: #fff;
        cursor: pointer;
        padding-left: 7px;
    }

    .wrapper .sidebar .sb-item.active {
        border-left: solid 3px green;
        box-sizing: border-box;
        background: #0d8f63;
        text-align: center;
        padding-left: 14px;

    }
    .wrapper .sidebar .sb-item.active > a {
        position: relative;
        left: -20%;
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
    
.sidebar
{
	background: #F5F5F5;
	overflow-y: scroll;
}

.force-overflow
{
	min-height: 450px;
}
/*
 *  STYLE 4
 */

#style-4::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.1);
	background-color: #F5F5F5;
	border-radius: 10px;
}

#style-4::-webkit-scrollbar
{
	width: 4px;
	background-color: #F5F5F5;
}

#style-4::-webkit-scrollbar-thumb
{
	background-color: #FFF;
    background-image: -webkit-gradient(linear,
									   40% 0%,
									   75% 84%,
									   from(#ecf1ec),
									   to(#fbfffb),
									   color-stop(.6,#a5ada6));
	/* border: 2px solid #555555; */
}


</style>
<div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash wrapper">
    <div class="force-overflow"></div>
    <div class="user-profile-box mb-0 ">
        {{-- <div class="wrapper"> --}}
        <div class="sidebar" id="style-4">
            <i class="fa fa-bars hamburger-toggle-sidebar text-dark"></i>
            <div class="sidebar-header text-center ">
                <h2 class="collapse_hide_item">Plot Mandi</h2>
                {{-- <img src="{{ asset(MyApp::SITE_LOGO) }}" alt="header-logo2.png">  --}}
            </div>
            <div class="header clearfix collapse_hide_item">
                {{-- <img src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-1.jpg') }}" alt="avatar" class="img-fluid profile-img"> --}}
                @if (auth()->user()->profile_picture == '')
                    <img alt="{{ auth()->user()->first_name }}" src="{{ asset(MyApp::ASSET_IMG . 'profile.png') }}"
                        class="img-fluid profile-img" width="30">
                        <span class="collapse_hide_item text-dark">{{ auth()->user()->first_name }}</span>
                @else:
                    <a href="#"><img alt="my-properties-3" src="images/feature-properties/fp-1.jpg"
                            class="img-fluid"></a>
                @endif
            </div>
            
            <div class="sb-item-list">
                {{-- <div class="sb-item"><i class="sb-icon fa fa-address-card"></i><span class="sb-text">Sidebar
                            Item1</span></div> --}}
                <div class="sb-item @if (Route::current()->uri == 'dashboard/admin') active @endif">
                    <a title="Dashboard" class="text-dark"
                        href="{{ route('admin_dashboard') }}">
                        <i class="sb-icon fa fa-dashboard"></i> <span class="sb-text">Dashboard </span>
                    </a>
                </div>
                <div class="sb-item @if (Route::current()->uri == 'dashboard/admin/dealer_list') active @endif">
                    <a title="Dealer Registration" class="text-dark"
                        href="{{ route('dealer_list') }}">
                        <i class="sb-icon fa fa-building"></i> <span class="sb-text">Dealer Registration </span>
                    </a>
                </div>

                <div class="sb-item @if (Route::current()->uri == 'dashboard/admin/users_list') active @endif">
                    <a title="Users Listing" class="text-dark"
                        href="{{ route('users_list') }}">
                        <i class="sb-icon fa fa-building"></i> <span class="sb-text">Users Listing </span>
                    </a>
                </div>

                <div class="sb-item @if (Route::current()->uri == '') active @endif">
                    <a title="Property Listing" class="text-dark"
                        href="{{ route('dealer_list') }}">
                        <i class="sb-icon fa fa-th-list"></i> <span class="sb-text">All Properties </span>
                    </a>
                </div>

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
                    <a title="Logout" class="text-dark" href="{{ route('admin_logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="sb-icon fa fa-sign-out"></i>
                        <span class="sb-text"><b>Logout</b></span>

                        <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" class="d-none">
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
