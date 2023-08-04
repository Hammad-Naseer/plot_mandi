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
<body class="maxw1600 m0a dashboard-bd">
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
                                <li><a href="#">Home</a>
                                    <ul>
                                        <li><a href="#">Home Map</a>
                                            <ul>
                                                <li><a href="index-9.html">Home Map Style 1</a></li>
                                                <li><a href="index-12.html">Home Map Style 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Home Image</a>
                                            <ul>
                                               <li><a href="index-2.html">Modern Home</a></li>
                                                <li><a href="index-3.html">Home Boxed Image</a></li>
                                                <li><a href="index-4.html">Home Modern Image</a></li>
                                                <li><a href="index-5.html">Home Minimalist Style</a></li>
                                                <li><a href="index-6.html">Home Parallax Image</a></li>
                                                <li><a href="index-8.html">Home Search Form</a></li>
                                                <li><a href="index-10.html">Modern Full Image</a></li>
                                                <li><a href="index-15.html">Home Typed Image</a></li>
                                                <li><a href="index-17.html">Modern Parallax Image</a></li>
                                                <li><a href="index-18.html">Image Filter Search</a>
                                                <li><a href="index-21.html">Parallax Image video</a></li>
												<li><a href="index-23.html">Home Image</a></li>
												<li><a href="index-24.html">Image and video</a></li>
                                            </ul>
                                            </li>
                                            <li><a href="#">Home Video</a>
                                                <ul>
                                                    <li><a href="index-7.html">Home Video Image</a></li>
                                                    <li><a href="index-11.html">Home Video</a></li>
                                                    <li><a href="index-20.html">Home Modern Video</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Home Slider</a>
                                                <ul>                                                    
                                                    <li><a href="index-13.html">Slider Presentation 2</a></li>
                                                    <li><a href="index-16.html">Slider Presentation 3</a></li>
                                                    <li><a href="index-19.html">Home Modern Slider</a></li>
                                                    <li><a href="index-22.html">Home Image Slider</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Home Styles</a>
                                                <ul>
                                                    <li><a href="index-14.html">Home Style Dark</a></li>
                                                    <li><a href="index-25.html">Home Style White</a></li>
                                                </ul>
                                            </li>
                                    </ul>
                                    </li>
                                    <li><a href="#">Listing</a>
                                        <ul>
                                            <li><a href="#">Listing Grid</a>
                                                <ul>
                                                    <li><a href="properties-grid-1.html">Grid View 1</a></li>
                                                    <li><a href="properties-grid-2.html">Grid View 2</a></li>
                                                    <li><a href="properties-grid-3.html">Grid View 3</a></li>
                                                    <li><a href="properties-grid-4.html">Grid View 4</a></li>
                                                    <li><a href="properties-full-grid-1.html">Grid Fullwidth 1</a></li>
                                                    <li><a href="properties-full-grid-2.html">Grid Fullwidth 2</a></li>
                                                    <li><a href="properties-full-grid-3.html">Grid Fullwidth 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Listing List</a>
                                                <ul>
                                                    <li><a href="properties-full-list-1.html">List View 1</a></li>
                                                    <li><a href="properties-list-1.html">List View 2</a></li>
                                                    <li><a href="properties-full-list-2.html">List View 3</a></li>
                                                    <li><a href="properties-list-2.html">List View 4</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Listing Map</a>
                                                <ul>
                                                    <li><a href="properties-half-map-1.html">Half Map 1</a></li>
                                                    <li><a href="properties-half-map-2.html">Half Map 2</a></li>
                                                    <li><a href="properties-half-map-3.html">Half Map 3</a></li>
                                                    <li><a href="properties-top-map-1.html">Top Map 1</a></li>
                                                    <li><a href="properties-top-map-2.html">Top Map 2</a></li>
                                                    <li><a href="properties-top-map-3.html">Top Map 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Agent View</a>
                                                <ul>
                                                    <li><a href="agents-listing-grid.html">Agent View 1</a></li>
                                                    <li><a href="agents-listing-row.html">Agent View 2</a></li>
                                                    <li><a href="agents-listing-row-2.html">Agent View 3</a></li>
                                                    <li><a href="agent-details.html">Agent Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Agencies View</a>
                                                <ul>
                                                    <li><a href="agencies-listing-1.html">Agencies View 1</a></li>
                                                    <li><a href="agencies-listing-2.html">Agencies View 2</a></li>
                                                    <li><a href="agencies-details.html">Agencies Details</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Property</a>
                                        <ul>
                                            <li><a href="single-property-1.html">Single Property 1</a></li>
                                            <li><a href="single-property-2.html">Single Property 2</a></li>
                                            <li><a href="single-property-3.html">Single Property 3</a></li>
                                            <li><a href="single-property-4.html">Single Property 4</a></li>
                                            <li><a href="single-property-5.html">Single Property 5</a></li>
                                            <li><a href="single-property-6.html">Single Property 6</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pages</a>
                                        <ul>
                                            <li><a href="#">Shop</a>
                                                <ul>
                                                    <li><a href="shop-with-sidebar.html">Product Sidebar</a></li>
                                                    <li><a href="shop-full-page.html">Product Fullpage</a></li>
                                                    <li><a href="shop-single.html">Product Single</a></li>
                                                    <li><a href="shop-checkout.html">Checkout Page</a></li>
                                                    <li><a href="shop-order.html">Order Page</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">User Panel</a>
                                                <ul>
                                                    <li><a href="dashboard.html">Dashboard</a></li>
                                                    <li><a href="user-profile.html">User Profile</a></li>
                                                    <li><a href="my-listings.html">My Properties</a></li>
                                                    <li><a href="favorited-listings.html">Favorited Properties</a></li>
                                                    <li><a href="add-property.html">Add Property</a></li>
                                                    <li><a href="payment-method.html">Payment Method</a></li>
                                                    <li><a href="invoice.html">Invoice</a></li>
                                                    <li><a href="change-password.html">Change Password</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="pricing-table.html">Pricing Tables</a></li>
                                            <li><a href="404.html">Page 404</a></li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="register.html">Register</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                            <li><a href="under-construction.html">Under Construction</a></li>
                                            <li><a href="ui-element.html">UI Elements</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="#">Grid Layout</a>
                                                <ul>
                                                    <li><a href="blog-full-grid.html">Full Grid</a></li>
                                                    <li><a href="blog-grid-sidebar.html">With Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">List Layout</a>
                                                <ul>
                                                    <li><a href="blog-full-list.html">Full List</a></li>
                                                    <li><a href="blog-list-sidebar.html">With Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                    <li class="d-none d-xl-none d-block d-lg-block"><a href="login.html">Login</a></li>
                                    <li class="d-none d-xl-none d-block d-lg-block"><a href="register.html">Register</a></li>
                                    <li class="d-none d-xl-none d-block d-lg-block mt-5 pb-4 ml-5 border-bottom-0"><a href="add-property.html" class="button border btn-lg btn-block text-center">Add Listing<i class="fas fa-laptop-house ml-2"></i></a></li>
                            </ul>
                            </nav>
                            <div class="clearfix"></div>
                            <!-- Main Navigation / End -->
                        </div>
                        <!-- Left Side Content / End -->
                        <!-- Right Side Content / --> 
                        <div class="header-user-menu user-menu">
                            <div class="header-user-name">
                                <span><img src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-1.jpg') }}" alt=""></span>Hi, Mary!
                            </div>
                            <ul>
                                <li><a href="user-profile.html"> Edit profile</a></li>
                                <li><a href="add-property.html"> Add Property</a></li>
                                <li><a href="payment-method.html">  Payments</a></li>
                                <li><a href="change-password.html"> Change Password</a></li>
                                <li><a href="#">Log Out</a></li>
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

