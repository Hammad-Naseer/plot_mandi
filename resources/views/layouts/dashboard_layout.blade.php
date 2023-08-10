<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Plot Mandi Dashboard') }}</title>
    @auth
    @else
    @endauth
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="Zeeshan Arain">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'jquery-ui.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'fontawesome-5-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'font-awesome.min.css') }}">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'search.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'animate.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'dashbord-mobile-menu.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'menu.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'slick.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'styles.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'default.css') }}">
    <link rel="stylesheet" id="color" href="{{ asset(MyApp::ASSET_STYLE.'colors/green.css') }}">
</head>
<body class="inner-pages maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <div class="dash-content-wrap">
            <header id="header-container" class="db-top-header">
                <!-- Header -->
                <div id="header">
                    <div class="container-fluid">
                        <!-- Left Side Content -->
                        <div class="left-side">
                            <!-- Logo -->
                            <div id="logo">
                                <a href="index-2.html"><img src="{{ asset(MyApp::ASSET_IMG.'logo.svg') }}" alt=""></a>
                            </div>
                            <!-- Mobile Navigation -->
                            <div class="mmenu-trigger">
                                <button class="hamburger hamburger--collapse" type="button">
                                    <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                            <!-- Main Navigation -->
                            <nav id="navigation" class="style-1">
                                <ul id="responsive">
                                    <li><a href="/">Home</a></li>

                                        <li class="d-none d-xl-none d-block d-lg-block"><a href="login.html">Login</a></li>
                                        <li class="d-none d-xl-none d-block d-lg-block"><a href="register.html">Register</a></li>
                                        <li class="d-none d-xl-none d-block d-lg-block mt-5 pb-4 ml-5 border-bottom-0">
                                            <a href="add-property.html" class="button border btn-lg btn-block text-center">Add Listing
                                                <i class="fas fa-laptop-house ml-2"></i>
                                            </a>
                                        </li>
                                </ul>
                            </nav>
                            <div class="clearfix"></div>
                            <!-- Main Navigation / End -->
                        </div>
                        <!-- Left Side Content / End -->
                        <!-- Right Side Content / --> 
                        <div class="header-user-menu user-menu">
                            <div class="header-user-name">
                                <span>
                                    @if(auth()->user()->profile_picture == "")
                                        <img src="{{ asset(MyApp::ASSET_IMG.'profile.png') }}" alt="">
                                    @else:
                                        <img src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-1.jpg') }}" alt="">
                                    @endif
                                </span>Hi, {{ auth()->user()->first_name }}
                            </div>
                            <ul>
                                <li><a href="user-profile.html"> Edit profile</a></li>
                                <!-- <li><a href="add-property.html"> Add Property</a></li> -->
                                {{-- <li><a href="payment-method.html">  Payments</a></li> --}}
                                <!-- <li><a href="change-password.html"> Change Password</a></li> -->
                                <li>
                                    @if(auth()->user()->acount_type == 1)
                                    <a href="{{ route('admin_logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                                    <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @elseif(auth()->user()->acount_type == 2 || auth()->user()->acount_type == 3)
                                    <a href="{{ route('user_logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                                    <form id="logout-form" action="{{ route('user_logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <!-- Right Side Content / End -->
                    </div>
                </div>
                <!-- Header / End -->
            </header>
        </div>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
   
         @yield('content')
           
         <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- @include('pages.ajax.commonAjax') -->
        <!-- ARCHIVES JS -->
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery-ui.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'tether.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'moment.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'bootstrap.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'mmenu.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'mmenu.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'swiper.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'swiper.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'slick.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'slick2.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'fitvids.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.counterup.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'smooth-scroll.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'lightcase.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'search.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'owl.carousel.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'ajaxchimp.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'newsletter.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.form.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.validate.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'dashbord-mobile-menu.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'searched.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'forms-2.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'color-switcher.js') }}"></script>

        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });
        </script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'script.js') }}"></script>
</body>
</html>

