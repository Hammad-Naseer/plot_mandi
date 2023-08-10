<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Plot Mandi') }}</title>
    @auth
    @else
    @endauth
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Plot Mandi Online Real State Website">
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
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'aos.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'aos2.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'menu.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'slick.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'styles.css') }}">
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'maps.css') }}">
    <link rel="stylesheet" id="color" href="{{ asset(MyApp::ASSET_STYLE.'colors/green.css') }}">
</head>

<body class="@if (Route::current()->uri == 'login' || Route::current()->uri == 'register' || Route::current()->uri == 'user/forgot_password' || Route::current()->uri == 'user/reset_password' || Route::current()->uri == 'user/account_verification') inner-pages hd-white @else th-15 homepage-4 @endif">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container" class="header head-tr">
            <!-- Header -->
            <div id="header" class="head-tr bottom">
                <div class="container container-header">
                    <!-- Left Side Content -->
                    <div class="left-side">
                        <!-- Logo -->
                        <div id="logo">
                            <a href="/">
                              <img src="{{ asset(MyApp::SITE_LOGO) }}" data-sticky-logo="{{ asset(MyApp::ASSET_IMG.'logo-red.svg') }}" alt="">
                           </a>
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
                        <nav id="navigation" class="style-1 head-tr">
                            <ul id="responsive">
                                <li><a href="/">Home</a></li>
                                <li><a href="#">Listing</a></li>
                                <li><a href="#">Property</a></li>
                                <li><a href="#">Pages</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                                <li class="d-none d-xl-none d-block d-lg-block"><a href="login.html">Login</a></li>
                                <li class="d-none d-xl-none d-block d-lg-block"><a href="register.html">Register</a></li>
                                {{-- <li class="d-none d-xl-none d-block d-lg-block mt-5 pb-4 ml-5 border-bottom-0"><a href="add-property.html" class="button border btn-lg btn-block text-center">Add Listing<i class="fas fa-laptop-house ml-2"></i></a></li> --}}
                            </ul>
                        </nav>
                        <!-- Main Navigation / End -->
                    </div>
                    <!-- Left Side Content / End -->

                    <!-- Right Side Content / End -->
                    <div class="right-side d-none d-none d-lg-none d-xl-flex">
                        <!-- Header Widget -->
                        <div class="header-widget">
                            {{-- <a href="add-property.html" class="button border">Add Listing<i class="fas fa-laptop-house ml-2"></i></a> --}}
                        </div>
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->

                    <!-- Right Side Content / End -->
                    @auth
                    <div class="header-user-menu user-menu add">
                        <div class="header-user-name">
                            <span>
                                @if(auth()->user()->profile_picture == "")
                                <img alt="{{ auth()->user()->first_name }}" src="{{ asset(MyApp::ASSET_IMG.'profile.png') }}">
                                @else:
                                <a href="#"><img alt="my-properties-3" src="images/feature-properties/fp-1.jpg" class="img-fluid"></a>
                                @endif
                            </span>Hi, {{ auth()->user()->first_name }}
                        </div>
                        <ul>
                            @if(auth()->user()->acount_type == 1)
                            <li><a href="{{ route('admin_dashboard') }}"> Dashboard</a></li>
                            @elseif(auth()->user()->acount_type == 2 || auth()->user()->acount_type == 3)
                            <li><a href="{{ route('user_dashboard') }}"> Dashboard</a></li>
                            @endif
                            {{-- <li><a href="user-profile.html"> Edit profile</a></li> --}}
                            {{-- <li><a href="add-property.html"> Add Property</a></li> --}}
                            {{-- <li><a href="payment-method.html">  Payments</a></li> --}}
                            {{-- <li><a href="change-password.html"> Change Password</a></li> --}}
                            <li><a href="#">Log Out</a></li>
                        </ul>
                    </div>
                    @endauth
                    <!-- Right Side Content / End -->

                    <div class="right-side d-none d-none d-lg-none d-xl-flex sign ml-0" style="@auth border-right: 1px solid #fff; @else border-right: 0px solid #fff; @endauth">
                        <!-- Header Widget -->
                        <div class="header-widget sign-in">
                            <div class="show-reg-form modal-open"><a href="{{ url('login') }}">Sign In</a></div>
                        </div>
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->

                    <!-- lang-wrap-->
                    <div class="header-user-menu user-menu add d-none d-lg-none d-xl-flex">
                        <div class="lang-wrap">
                            <div class="show-lang"><span><a href="{{ url('register') }}" class="text-white"><i class="fas fa-user"></i><strong>Sign Up</strong></a></span></div>
                        </div>
                    </div>
                    <!-- lang-wrap end-->

                </div>
            </div>
            <!-- Header / End -->
        </header>
        <div class="clearfix"></div>
         <!-- Header Container / End -->
         @yield('content')
         <!-- START FOOTER -->
       <footer class="first-footer">
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="netabout">
                                <a href="index-2.html" class="logo">
                                    <img src="{{ asset(MyApp::ASSET_IMG.'logo-footer.svg') }}" alt="netcom">
                                </a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt architecto soluta laboriosam, perspiciatis, aspernatur officiis esse.</p>
                            </div>
                            <div class="contactus">
                                <ul>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <p class="in-p">95 South Park Avenue, USA</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <p class="in-p">+456 875 369 208</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <p class="in-p ti">support@findhouses.com</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="navigation">
                                <h3>Navigation</h3>
                                <div class="nav-footer">
                                    <ul>
                                        <li><a href="index-2.html">Home One</a></li>
                                        <li><a href="properties-right-sidebar.html">Properties Right</a></li>
                                        <li><a href="properties-full-list.html">Properties List</a></li>
                                        <li><a href="properties-details.html">Property Details</a></li>
                                        <li class="no-mgb"><a href="agents-listing-grid.html">Agents Listing</a></li>
                                    </ul>
                                    <ul class="nav-right">
                                        <li><a href="agent-details.html">Agents Details</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="blog.html">Blog Default</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                        <li class="no-mgb"><a href="contact-us.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget">
                                <h3>Twitter Feeds</h3>
                                <div class="twitter-widget contuct">
                                    <div class="twitter-area">
                                        <div class="single-item">
                                            <div class="icon-holder">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                                <h4>about 5 days ago</h4>
                                            </div>
                                        </div>
                                        <div class="single-item">
                                            <div class="icon-holder">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                                <h4>about 5 days ago</h4>
                                            </div>
                                        </div>
                                        <div class="single-item">
                                            <div class="icon-holder">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                                <h4>about 5 days ago</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="newsletters">
                                <h3>Newsletters</h3>
                                <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.</p>
                            </div>
                            <form class="bloq-email mailchimp form-inline" method="post">
                                <label for="subscribeEmail" class="error"></label>
                                <div class="email">
                                    <input type="email" id="subscribeEmail" name="EMAIL" placeholder="Enter Your Email">
                                    <input type="submit" value="Subscribe">
                                    <p class="subscription-success"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second-footer">
                <div class="container">
                    <p>2021 © Copyright - All Rights Reserved.</p>
                    <ul class="netsocials">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!--register form -->
        <div class="login-and-register-form modal">
            <div class="main-overlay"></div>
            <div class="main-register-holder">
                <div class="main-register fl-wrap">
                    <div class="close-reg"><i class="fa fa-times"></i></div>
                    <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>
                    <div class="soc-log fl-wrap">
                        <p>Login</p>
                        <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                        <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
                    </div>
                    <div class="log-separator fl-wrap"><span>Or</span></div>
                    <div id="tabs-container">
                        <ul class="tabs-menu">
                            <li class="current"><a href="#tab-1">Login</a></li>
                            <li><a href="#tab-2">Register</a></li>
                        </ul>
                        <div class="tab">
                            <div id="tab-1" class="tab-contents">
                                <div class="custom-form">
                                    <form method="post" name="registerform">
                                        <label>Username or Email Address * </label>
                                        <input name="email" type="text" onClick="this.select()" value="">
                                        <label>Password * </label>
                                        <input name="password" type="password" onClick="this.select()" value="">
                                        <button type="submit" class="log-submit-btn"><span>Log In</span></button>
                                        <div class="clearfix"></div>
                                        <div class="filter-tags">
                                            <input id="check-a" type="checkbox" name="check">
                                            <label for="check-a">Remember me</label>
                                        </div>
                                    </form>
                                    <div class="lost_password">
                                        <a href="#">Lost Your Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div id="tab-2" class="tab-contents">
                                    <div class="custom-form">
                                        <form method="post" name="registerform" class="main-register-form" id="main-register-form2">
                                            <label>First Name * </label>
                                            <input name="name" type="text" onClick="this.select()" value="">
                                            <label>Second Name *</label>
                                            <input name="name2" type="text" onClick="this.select()" value="">
                                            <label>Email Address *</label>
                                            <input name="email" type="text" onClick="this.select()" value="">
                                            <label>Password *</label>
                                            <input name="password" type="password" onClick="this.select()" value="">
                                            <button type="submit" class="log-submit-btn"><span>Register</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--register form end -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->
        @include('pages.ajax.commonAjax')
        <!-- ARCHIVES JS -->
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'rangeSlider.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'tether.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'moment.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'bootstrap.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'mmenu.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'mmenu.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'aos.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'aos2.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'slick.min.js') }}"></script>
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
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'typed.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'searched.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'forms-2.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'leaflet.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'leaflet-gesture-handling.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'leaflet-providers.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'leaflet.markercluster.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'map-style2.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'range.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'color-switcher.js') }}"></script>
        <script>
            $(window).on('scroll load', function() {
                $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
            });

        </script>

        <!-- Slider Revolution scripts -->
        <script src="{{ asset(MyApp::ASSET_SCRIPT_REVOLUTION.'js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT_REVOLUTION.'js/jquery.themepunch.revolution.min.js') }}"></script>
        
        <script>
            var typed = new Typed('.typed', {
                strings: ["House ^2000", "Apartment ^2000", "Plaza ^4000"],
                smartBackspace: false,
                loop: true,
                showCursor: true,
                cursorChar: "|",
                typeSpeed: 50,
                backSpeed: 30,
                startDelay: 800
            });

        </script>
        <script>
            $('.slick-lancers').slick({
                infinite: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 1292,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false
                    }
                }]
            });

        </script>

        <script>
            $(".dropdown-filter").on('click', function() {

                $(".explore__form-checkbox-list").toggleClass("filter-block");

            });

        </script>

        <!-- MAIN JS -->
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'script.js') }}"></script>

    </div>
    <!-- Wrapper / End -->
</body>
</html>

