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
    {{-- jQuery  --}}
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery-3.5.1.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">    
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
                                <!-- <a href="index-2.html"><img src="{{ asset(MyApp::SITE_LOGO) }}" alt=""></a> -->
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
                                    {{-- <li><a href="/">Home</a></li> --}}

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
                        {{-- <div class="header-user-menu user-menu">
                            <div class="header-user-name">
                                <span>
                                    <img src="{{ asset(MyApp::ASSET_IMG.'profile.png') }}" alt="">
                                </span>                                
                            </div>
                        </div> --}}
                        
                        <div class="header-user-menu user-menu">
                            <div class="header-user-name">
                                <span>
                                    @if(auth()->user()->profile_picture == "")
                                        <img src="{{ asset(MyApp::ASSET_IMG.'profile.png') }}" alt="">
                                    @else:
                                        <img src="{{ asset(MyApp::ASSET_IMG.'testimonials/ts-1.jpg') }}" alt="">
                                    @endif
                                </span>
                                
                                {{-- Hi, {{ auth()->user()->first_name }} --}}
                            </div>
                            <ul>
                                <li><a href="user-profile.html"> Edit profile</a></li>
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
                        <div class="header-user-menu user-menu">
                            <div class="">
                                <span>
                                    <i class="fa fa-bell" style="    font-size: 28px;
                                    position: relative;
                                    top: 7px;
                                    left: -20px;
                                    color: #f5a40f;"></i>   
                                </span>                                
                            </div>
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
        {{-- <script src="{{ asset(MyApp::ASSET_SCRIPT.'searched.js') }}"></script> --}}
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'forms-2.js') }}"></script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'color-switcher.js') }}"></script>

        <!-- datatable  -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

        <script>
            new DataTable('.table');
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });
        </script>
        <script src="{{ asset(MyApp::ASSET_SCRIPT.'script.js') }}"></script>
        
        <script>
            $("#addMultipleFileImage").click(function() {
                $("#fileImageInputs").append('<div class="input-row"><input type="file" name="office_picture[]" class="multipleFiles" accept=".jpg,.png,.gif" /> <button type="button" class="btn btn-danger btn-sm remove-btn">X</button></div>');
            });

            $("#addMultipleFileDocument").click(function() {
                $("#fileDocumentInputs").append('<div class="input-row"><input type="file" name="office_document[]" class="multipleFiles" accept=".jpg,.png,.doc,.xlsx,.pdf" /> <button type="button" class="btn btn-danger btn-sm remove-btn">X</button></div>');
            });

            $("#addMultipleFileVideo").click(function() {
                $("#fileVideoInputs").append('<div class="input-row"><input type="file" name="office_video[]" class="multipleFiles" accept=".mp4" /><button type="button" class="btn btn-danger btn-sm remove-btn">X</button></div>');
            });

            $(".input-multiple-container").on("click", ".remove-btn", function() {
                $(this).parent(".input-row").remove();
            });

            // For Property 
            $("#addMultipleFileImageProperty").click(function() {
                $("#fileImageInputsProperty").append('<div class="input-row"><input type="file" name="property_images[]" class="multipleFiles" accept=".jpg,.png,.gif" /></div>');
            });

            $("#addMultipleFileVideoProperty").click(function() {
                $("#fileVideoInputsProperty").append('<div class="input-row"><input type="file" name="property_videos[]" class="multipleFiles" accept=".mp4" /></div>');
            });

            // if(localStorage.getItem("dash-menu-hamburger") == "inactive"){
            //     $('.wrapper').toggleClass('sidebar-collapse');
            //     $('.user-profile-box').css('width','60px');    
            //     $('.user-dash').css('flex','0 0 7%');    
            //     $('.user-dash2').css('flex','0 0 100%');    
            //     $('.user-dash2').css('max-width','95%');    
            //     $('.user-dash2').css('margin-left','-40px');    
            //     $('.hamburger-toggle-sidebar').css({'left':'-15px','top':'10px'});                            
            //     $('.collapse_hide_item').hide();
            // }

            // $(function(){    // toggle sidebar collapse    
            //     $('.hamburger-toggle-sidebar').on('click', function(){        
            //         $('.wrapper').toggleClass('sidebar-collapse');
            //         // if(localStorage.getItem("dash-menu-hamburger") == "inactive"){
            //             var divWidth = $('.user-profile-box').width();
            //             if(divWidth == 295){
            //                 localStorage.setItem("dash-menu-hamburger","inactive");
            //                 $('.user-profile-box').css('width','60px');    
            //                 $('.user-dash').css('flex','0 0 7%');    
            //                 $('.user-dash2').css('flex','0 0 100%');    
            //                 $('.user-dash2').css('max-width','95%');    
            //                 $('.user-dash2').css('margin-left','-40px');    
            //                 $('.hamburger-toggle-sidebar').css({'left':'-15px','top':'10px'});    
            //                 $('.collapse_hide_item').hide();
            //             }
            //         // }
                    
            //         if(divWidth == 60){
            //             localStorage.setItem("dash-menu-hamburger","active");
            //             $('.user-profile-box').css('width','295px');  
            //             $('.user-dash').css('flex','0 0 25%'); 
            //             $('.user-dash2').css('flex','0 0 75%');    
            //             $('.user-dash2').css('max-width','75%');   
            //             $('.user-dash2').css('margin-left','0px');    
            //             $('.collapse_hide_item').show();
            //         }
            //     });
                
            //     // if(localStorage.getItem("dash-menu-hamburger") == "inactive"){
            //     //     $('.sidebar').on('mouseleave', function(){        
            //     //         $('.wrapper').toggleClass('sidebar-collapse');
                            
            //     //         var divWidth = $('.user-profile-box').width();
            //     //         if(divWidth == 295){
            //     //             // localStorage.setItem("dash-menu-hamburger","active");
            //     //             $('.user-profile-box').css('width','60px');    
            //     //             $('.user-dash').css('flex','0 0 7%');    
            //     //             $('.user-dash2').css('flex','0 0 100%');    
            //     //             $('.user-dash2').css('max-width','95%');    
            //     //             $('.user-dash2').css('margin-left','-40px');    
            //     //             $('.hamburger-toggle-sidebar').css({'left':'-15px','top':'10px'});    
            //     //             $('.collapse_hide_item').hide();
            //     //         }
            //     //     });
            //     //     $('.sidebar').on('mouseenter', function(){   
            //     //         $('.wrapper').toggleClass('sidebar-collapse');
            //     //         var divWidth = $('.user-profile-box').width();
            //     //         if(divWidth == 60){
            //     //             localStorage.setItem("dash-menu-hamburger","inactive");
            //     //             $('.user-profile-box').css('width','295px');  
            //     //             $('.user-dash').css('flex','0 0 25%'); 
            //     //             $('.user-dash2').css('flex','0 0 75%');    
            //     //             $('.user-dash2').css('max-width','75%');   
            //     //             $('.user-dash2').css('margin-left','0px');    
            //     //             $('.collapse_hide_item').show();
            //     //         }
            //     //     });
            //     // }
            //     // mark sidebar item as active when clicked    
            //     $('.sb-item').on('click', function(){        
            //         if ($(this).hasClass('hamburger-toggle-sidebar')) {          
            //             return; 
            //             // already actived        
            //         }        
            //         $(this).siblings().removeClass('active');        
            //         $(this).siblings().find('.sb-item').removeClass('active');        
            //         $(this).addClass('active');    
            //     })
            // });
        </script>
</body>
</html>



<script>
// Selecting the sidebar and buttons
const sidebar = document.querySelector(".sidebar");
const sidebarOpenBtn = document.querySelector("#sidebar-open");
const sidebarCloseBtn = document.querySelector("#sidebar-close");
const sidebarLockBtn = document.querySelector("#lock-icon");

// Function to toggle the lock state of the sidebar
const toggleLock = () => {
  sidebar.classList.toggle("locked");
  // If the sidebar is not locked
  if (!sidebar.classList.contains("locked")) {
    sidebar.classList.add("hoverable");
    sidebarLockBtn.classList.replace("bx-lock-alt", "bx-lock-open-alt");
  } else {
    sidebar.classList.remove("hoverable");
    sidebarLockBtn.classList.replace("bx-lock-open-alt", "bx-lock-alt");
  }
};

// Function to hide the sidebar when the mouse leaves
const hideSidebar = () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.add("close");
    $(".user-dash2").removeClass("col-lg-9").addClass("col-lg-11");
    $(".user-dash-sidebar").removeClass("col-lg-3").addClass("col-lg-1");
  }
};

// Function to show the sidebar when the mouse enter
const showSidebar = () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.remove("close");
    $(".user-dash2").removeClass("col-lg-11").addClass("col-lg-9");
    $(".user-dash-sidebar").removeClass("col-lg-1").addClass("col-lg-3");
  }
};

// Function to show and hide the sidebar
const toggleSidebar = () => {
  sidebar.classList.toggle("close");
};

// If the window width is less than 800px, close the sidebar and remove hoverability and lock
if (window.innerWidth < 800) {
  sidebar.classList.add("close");
  sidebar.classList.remove("locked");
  sidebar.classList.remove("hoverable");
}

// Adding event listeners to buttons and sidebar for the corresponding actions
sidebarLockBtn.addEventListener("click", toggleLock);
sidebar.addEventListener("mouseleave", hideSidebar);
sidebar.addEventListener("mouseenter", showSidebar);
sidebarOpenBtn.addEventListener("click", toggleSidebar);
sidebarCloseBtn.addEventListener("click", toggleSidebar);



$(document).ready(function() {
    $("form").submit(function(e) {
        e.preventDefault();
        var form = this;
        form.submit();
        $("button[type=submit]",this).prop("disabled", true); 
    });
});
</script>