<style>
    /* Import Google font - Poppins */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    nav.sidebar.hoverable.close {
        opacity: 1 !important;
    }

    body {
        min-height: 100vh;
        background: #eef5fe;
    }

    li.item.active {
        background: #7cbf00;
        color: white !important;
        border-radius: 8px;
    }

    li.item.active>a {
        color: white !important;
    }

    /* Pre css */
    .flex {
        display: flex;
        align-items: center;
    }

    .nav_image {
        display: flex;
        min-width: 55px;
        justify-content: center;
    }

    .nav_image img {
        height: 35px;
        width: 35px;
        border-radius: 50%;
        object-fit: cover;
    }

    /* Sidebar */
    .sidebar {
        z-index: 9999;
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 270px;
        background: #fff;
        padding: 15px 10px;
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
    }

    .sidebar.close {
        width: calc(55px + 20px);
    }

    .logo_items {
        gap: 18px;
    }

    .logo_name {
        font-size: 22px;
        color: #333;
        font-weight: 500px;
        transition: all 0.3s ease;
    }

    .sidebar.close .logo_name,
    .sidebar.close #lock-icon,
    .sidebar.close #sidebar-close {
        opacity: 0;
        pointer-events: none;
    }

    #lock-icon,
    #sidebar-close {
        padding: 10px;
        color: #4070f4;
        font-size: 25px;
        cursor: pointer;
        margin-left: -4px;
        transition: all 0.3s ease;
    }

    #sidebar-close {
        display: none;
        color: #333;
    }

    .menu_container {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin-top: 40px;
        overflow-y: auto;
        height: calc(100% - 82px);
    }

    .menu_container::-webkit-scrollbar {
        display: none;
    }

    .menu_title {
        position: relative;
        height: 50px;
        width: 55px;
    }

    .menu_title .title {
        margin-left: 15px;
        transition: all 0.3s ease;
    }

    .sidebar.close .title {
        opacity: 0;
    }

    .menu_title .line {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        height: 3px;
        width: 20px;
        border-radius: 25px;
        background: #aaa;
        transition: all 0.3s ease;
    }

    .menu_title .line {
        opacity: 0;
    }

    .sidebar.close .line {
        opacity: 1;
    }

    .item {
        list-style: none;
    }

    .link {
        text-decoration: none;
        border-radius: 8px;
        margin-bottom: 8px;
        color: #707070;
    }

    .link:hover {
        color: #fff;
        background-color: #7cbf00;
    }

    .link span {
        white-space: nowrap;
    }

    .link i {
        height: 50px;
        min-width: 55px;
        display: flex;
        font-size: 22px;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
    }

    .sidebar_profile {
        padding-top: 15px;
        margin-top: 15px;
        gap: 15px;
        border-top: 2px solid rgba(0, 0, 0, 0.1);
    }

    .sidebar_profile .name {
        font-size: 18px;
        color: #333;
    }

    .sidebar_profile .email {
        font-size: 15px;
        color: #333;
    }

    /* Navbar */
    .navbar {
        max-width: 500px;
        width: 100%;
        position: fixed;
        top: 0;
        left: 60%;
        transform: translateX(-50%);
        background: #fff;
        padding: 10px 20px;
        border-radius: 0 0 8px 8px;
        justify-content: space-between;
    }

    #sidebar-open {
        font-size: 30px;
        color: #333;
        cursor: pointer;
        margin-right: 20px;
        display: none;
    }

    .search_box {
        height: 46px;
        max-width: 500px;
        width: 100%;
        border: 1px solid #aaa;
        outline: none;
        border-radius: 8px;
        padding: 0 15px;
        font-size: 18px;
        color: #333;
    }

    .navbar img {
        height: 40px;
        width: 40px;
        margin-left: 20px;
    }

    /* Responsive */
    @media screen and (max-width: 1100px) {
        .navbar {
            left: 65%;
        }
    }

    @media screen and (max-width: 800px) {
        .sidebar {
            left: 0;
            z-index: 1000;
        }

        .sidebar.close {
            left: -100%;
        }

        nav.sidebar.hoverable.close {
            opacity: 1 !important;
        }

        #sidebar-close {
            display: block;
        }

        #lock-icon {
            display: none;
        }

        .navbar {
            left: 0;
            max-width: 100%;
            transform: translateX(0%);
        }

        #sidebar-open {
            display: block;
        }
    }
</style>
<link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<div class="col-md-3 col-lg-3 user-dash-sidebar">
    <nav class="sidebar locked">
        <div class="logo_items flex">
            <span class="nav_image">
                <img src="{{ asset(MyApp::SITE_LOGO) }}" alt="logo_img" />
            </span>
            <span class="logo_name">Plot Mandi</span>
            <i class="bx bx-lock-alt" id="lock-icon" title="Unlock Sidebar"></i>
            <i class="bx bx-x" id="sidebar-close"></i>
        </div>

        <div class="menu_container">
            <div class="logo_items flex bg-gray p-2" style="justify-content: center;">
                <span class="nav_image">
                    @if(auth()->user()->profile_picture == "")
                        <img src="{{ asset(MyApp::ASSET_IMG.'profile.png') }}" alt="">
                    @else:
                        <img src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-1.jpg') }}" alt="">
                    @endif
                </span>
                <span class="logo_name">
                    {{ auth()->user()->first_name }}
                </span>
            </div> 
            <div class="menu_items" style="position: relative;top: -18%;">
                <ul class="menu_item">
                    <div class="menu_title flex">
                        <!-- <span class="title">Dashboard</span> -->
                        <span class="line"></span>
                    </div>
                    <li class="item @if (Route::current()->uri == 'dashboard/user') active @endif">
                        <a href="{{ route('user_dashboard') }}" class="link flex">
                            <i class="bx bx-home-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <!-- <li class="item">
            <a href="#" class="link flex">
                <i class="bx bx-grid-alt"></i>
                <span>All Projects</span>
            </a>
            </li> -->
                </ul>
                @if (auth()->user()->acount_type == 2)
                <ul class="menu_item">
                    <div class="menu_title flex">
                        <span class="title">Property</span>
                        <span class="line"></span>
                    </div>
                    <li class="item @if (Route::current()->uri == 'dashboard/user/add_property') active @endif">
                        <a href="{{ route('add_property') }}" class="link flex">
                            <i class="bx bxs-magic-wand"></i>
                            <span>Add Property</span>
                        </a>
                    </li>

                    <li class="item @if (Route::current()->uri == 'dashboard/user/view_property_list') active @endif">
                        <a href="{{ route('view_property_list') }}" class="link flex">
                            <i class="bx bxs-magic-wand"></i>
                            <span>Property Listing</span>
                        </a>
                    </li>
                </ul>
                @endif
                @if (auth()->user()->acount_type == 3)
                <ul class="menu_item">
                    <div class="menu_title flex">
                        <span class="title">Posts</span>
                        <span class="line"></span>
                    </div>
                    <li class="item @if (Route::current()->uri == 'dashboard/user/add_post') active @endif">
                        <a href="{{ route('add_post') }}" class="link flex">
                            <i class="bx bx-folder"></i>
                            <span>Add Post</span>
                        </a>
                    </li>
                    <li class="item @if (Route::current()->uri == 'dashboard/user/posts_list') active @endif">
                        <a href="{{ route('posts_list') }}" class="link flex">
                            <i class="bx bx-folder"></i>
                            <span>Post Listing</span>
                        </a>
                    </li>
                </ul>
                
                <ul class="menu_item">
                    <div class="menu_title flex">
                        <span class="title">Users</span>
                        <span class="line"></span>
                    </div>
                    <li class="item @if (Route::current()->uri == 'dashboard/admin/users_list') active @endif">
                        <a href="{{ route('users_list') }}" class="link flex">
                            <i class="bx bx-folder"></i>
                            <span>Favroute Property</span>
                        </a>
                    </li>
                </ul>
                @endif

                <!-- <ul class="menu_item">
            <div class="menu_title flex">
            <span class="title">Setting</span>
            <span class="line"></span>
            </div>
            <li class="item">
            <a href="#" class="link flex">
                <i class="bx bx-flag"></i>
                <span>Notice Board</span>
            </a>
            </li>
            <li class="item">
            <a href="#" class="link flex">
                <i class="bx bx-award"></i>
                <span>Award</span>
            </a>
            </li>
            <li class="item">
            <a href="#" class="link flex">
                <i class="bx bx-cog"></i>
                <span>Setting</span>
            </a>
            </li>
        </ul> -->
            </div>

            <div class="sidebar_profile flex">
                <span class="nav_image">
                    <i class="fa fa-sign-out"></i>
                    {{-- <img src="images/profile.jpg" alt="logo_img" /> --}}
                </span>
                <div class="data_text">
                    <a class="name" href="{{ route('user_logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                    {{-- <span class="name">Logout</span> --}}
                    <form id="logout-form" action="{{ route('user_logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <!-- <span class="email">david@gmail.com</span> -->
                </div>
            </div>
        </div>
    </nav>
</div>
