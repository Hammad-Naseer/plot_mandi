@extends('layouts.app')
@section('content')

<!-- STAR HEADER SEARCH -->
<section id="hero-area" class="parallax-searchs home15 overlay" data-stellar-background-ratio="0.5">
            <div class="hero-main">
                <div class="container" data-aos="zoom-in">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-inner">
                                <!-- Welcome Text -->
                                <div class="welcome-text">
                                    <h1 class="h1">Find Your Dream
                                    <br class="d-md-none">
                                    <span class="typed border-bottom"></span>
                                </h1>
                                    <p class="mt-4">Our experience ensures that your projects will be done right and with the upmost professionalism.</p>
                                </div>
                                <!--/ End Welcome Text -->
                                <!-- Search Form -->
                                <div class="trip-search">
                                    <form class="form">
                                        <!-- Form Location -->
                                        <div class="form-group location">
                                            <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-map-marker"></i>Location</span>
                                                <ul class="list">
                                                    <li data-value="1" class="option selected ">New York</li>
                                                    <li data-value="2" class="option">Los Angeles</li>
                                                    <li data-value="3" class="option">Chicago</li>
                                                    <li data-value="3" class="option">Philadelphia</li>
                                                    <li data-value="3" class="option">San Francisco</li>
                                                    <li data-value="3" class="option">Miami</li>
                                                    <li data-value="3" class="option">Houston</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/ End Form Location -->
                                        <!-- Form Property Type -->
                                        <div class="form-group">
                                            <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-home"></i>Property Type</span>
                                                <ul class="list">
                                                    <li data-value="1" class="option selected ">Family House</li>
                                                    <li data-value="2" class="option">Apartment</li>
                                                    <li data-value="3" class="option">Condo</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/ End Form Property Type -->
                                        <!-- Form Property Status -->
                                        <div class="form-group duration">
                                            <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-home"></i>Property Status</span>
                                                <ul class="list">
                                                    <li data-value="1" class="option selected ">For Sale</li>
                                                    <li data-value="2" class="option">For Rent</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/ End Form Property Status -->
                                        <!-- Form Bedrooms -->
                                        <div class="form-group">
                                            <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-bed" aria-hidden="true"></i>Any Bedrooms</span>
                                                <ul class="list">
                                                    <li data-value="1" class="option selected">1</li>
                                                    <li data-value="2" class="option">2</li>
                                                    <li data-value="3" class="option">3</li>
                                                    <li data-value="3" class="option">4</li>
                                                    <li data-value="3" class="option">5</li>
                                                    <li data-value="3" class="option">6</li>
                                                    <li data-value="3" class="option">7</li>
                                                    <li data-value="3" class="option">8</li>
                                                    <li data-value="3" class="option">9</li>
                                                    <li data-value="3" class="option">10</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/ End Form Bedrooms -->
                                        <!-- Form Bathrooms -->
                                        <div class="form-group">
                                            <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-bath" aria-hidden="true"></i>Any Bathrooms</span>
                                                <ul class="list">
                                                    <li data-value="1" class="option selected">1</li>
                                                    <li data-value="2" class="option">2</li>
                                                    <li data-value="3" class="option">3</li>
                                                    <li data-value="3" class="option">4</li>
                                                    <li data-value="3" class="option">5</li>
                                                    <li data-value="3" class="option">6</li>
                                                    <li data-value="3" class="option">7</li>
                                                    <li data-value="3" class="option">8</li>
                                                    <li data-value="3" class="option">9</li>
                                                    <li data-value="3" class="option">10</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/ End Form Bathrooms -->
                                        <!-- Form Button -->
                                        <div class="form-group button">
                                            <button type="submit" class="btn">Search</button>
                                        </div>
                                        <!--/ End Form Button -->
                                    </form>
                                </div>
                                <!--/ End Search Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END HEADER SEARCH -->

        <!-- START SECTION INFO -->
        <section _ngcontent-bgi-c3="" class="featured-boxes-area bg-white-1">
            <div _ngcontent-bgi-c3="" class="container">
                <div _ngcontent-bgi-c3="" class="featured-boxes-inner">
                    <div _ngcontent-bgi-c3="" class="row m-0">
                        <div _ngcontent-bgi-c3="" class="col-xl-3 col-sm-6 col-lg-6 p-0" data-aos="fade-up" data-aos-delay="150">
                            <div _ngcontent-bgi-c3="" class="single-featured-box">
                                <div _ngcontent-bgi-c3="" class="icon color-fb7756"><img src="{{ asset(MyApp::ASSET_STYLE.'colors/icons/green/1.png') }}" width="50" alt=""></div>
                                <h3 class="mt-0" _ngcontent-bgi-c3="">Buy Property</h3>
                                <p _ngcontent-bgi-c3="">Lorem ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.</p><a _ngcontent-bgi-c3="" class="read-more-btn" href="single-property-1.html">Read More</a></div>
                        </div>
                        <div _ngcontent-bgi-c3="" class="col-xl-3 col-sm-6 col-lg-6  p-0" data-aos="fade-up" data-aos-delay="250">
                            <div _ngcontent-bgi-c3="" class="single-featured-box">
                                <div _ngcontent-bgi-c3="" class="icon color-facd60"><img src="{{ asset(MyApp::ASSET_STYLE.'colors/icons/green/2.png') }}" width="50" alt=""></div>
                                <h3 class="mt-0" _ngcontent-bgi-c3="">Rent Property</h3>
                                <p _ngcontent-bgi-c3="">Lorem ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.</p><a _ngcontent-bgi-c3="" class="read-more-btn" href="single-property-1.html">Read More</a></div>
                        </div>
                        <div _ngcontent-bgi-c3="" class="col-xl-3 col-sm-6 col-lg-6  p-0" data-aos="fade-up" data-aos-delay="350">
                            <div _ngcontent-bgi-c3="" class="single-featured-box">
                                <div _ngcontent-bgi-c3="" class="icon color-1ac0c6"><img src="{{ asset(MyApp::ASSET_STYLE.'colors/icons/green/3.png') }}" width="50" alt=""></div>
                                <h3 class="mt-0" _ngcontent-bgi-c3="">Real Estate Kit</h3>
                                <p _ngcontent-bgi-c3="">Lorem ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.</p><a _ngcontent-bgi-c3="" class="read-more-btn" href="single-property-1.html">Read More</a></div>
                        </div>
                        <div _ngcontent-bgi-c3="" class="col-xl-3 col-sm-6 col-lg-6  p-0" data-aos="fade-up" data-aos-delay="450">
                            <div _ngcontent-bgi-c3="" class="single-featured-box">
                                <div _ngcontent-bgi-c3="" class="icon"><img src="{{ asset(MyApp::ASSET_STYLE.'colors/icons/green/4.png') }}" width="65" alt=""></div>
                                <h3 class="mt-0" _ngcontent-bgi-c3="">Sell Property</h3>
                                <p _ngcontent-bgi-c3="">Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.</p><a _ngcontent-bgi-c3="" class="read-more-btn" href="single-property-1.html">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION INFO -->

        <!-- START SECTION PROPERTIES FOR SALE -->
        <section class="featured portfolio bg-white-1 rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Properties for </span>Sale</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="portfolio col-xl-12">
                    <div class="slick-lancers">
                        <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                            <div class="landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button alt featured">Featured</div>
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <img src="{{ asset(MyApp::ASSET_IMG.'blog/b-11.jpg') }}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1.html">Real House Luxury Villa</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix">
                                            <li>
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                <span>6 Beds</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-bath" aria-hidden="true"></i>
                                                <span>3 Baths</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-object-group" aria-hidden="true"></i>
                                                <span>720 sq ft</span>
                                            </li>
                                        </ul>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="single-property-1.html">$ 350,000</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="#" title="Compare">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                                <a href="#" title="Share">
                                                    <i class="fas fa-share-alt"></i>
                                                </a>
                                                <a href="#" title="Favorites">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="agents-grid">
                            <div class="people">
                                <div class="project-single" data-aos="fade-up" data-aos-delay="250">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <img src="{{ asset(MyApp::ASSET_IMG.'blog/b-12.jpg') }}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1.html">Real House Luxury Villa</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix">
                                            <li>
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                <span>6 Beds</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-bath" aria-hidden="true"></i>
                                                <span>3 Baths</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-object-group" aria-hidden="true"></i>
                                                <span>720 sq ft</span>
                                            </li>
                                        </ul>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="single-property-1.html">$ 350,000</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="#" title="Compare">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                                <a href="#" title="Share">
                                                    <i class="fas fa-share-alt"></i>
                                                </a>
                                                <a href="#" title="Favorites">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="agents-grid">
                            <div class="people landscapes no-pb pbp-3">
                                <div class="project-single" data-aos="fade-up" data-aos-delay="350">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <img src="{{ asset(MyApp::ASSET_IMG.'blog/b-1.jpg') }}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1.html">Real House Luxury Villa</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix">
                                            <li>
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                <span>6 Beds</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-bath" aria-hidden="true"></i>
                                                <span>3 Baths</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-object-group" aria-hidden="true"></i>
                                                <span>720 sq ft</span>
                                            </li>
                                        </ul>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="single-property-1.html">$ 350,000</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="#" title="Compare">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                                <a href="#" title="Share">
                                                    <i class="fas fa-share-alt"></i>
                                                </a>
                                                <a href="#" title="Favorites">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="agents-grid">
                            <div class="landscapes">
                                <div class="project-single no-mb" data-aos="fade-up" data-aos-delay="500">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button alt featured">Featured</div>
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <img src="{{ asset(MyApp::ASSET_IMG.'feature-properties/fp-10.jpg') }}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1.html">Real House Luxury Villa</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="properties-details.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix">
                                            <li>
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                <span>6 Beds</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-bath" aria-hidden="true"></i>
                                                <span>3 Baths</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-object-group" aria-hidden="true"></i>
                                                <span>720 sq ft</span>
                                            </li>
                                        </ul>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="single-property-1.html">$ 350,000</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="#" title="Compare">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                                <a href="#" title="Share">
                                                    <i class="fas fa-share-alt"></i>
                                                </a>
                                                <a href="#" title="Favorites">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="agents-grid">
                            <div class="people">
                                <div class="project-single no-mb" data-aos="fade-up">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <img src="{{ asset(MyApp::ASSET_IMG.'feature-properties/fp-11.jpg') }}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1.html">Real House Luxury Villa</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix">
                                            <li>
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                <span>6 Beds</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-bath" aria-hidden="true"></i>
                                                <span>3 Baths</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-object-group" aria-hidden="true"></i>
                                                <span>720 sq ft</span>
                                            </li>
                                        </ul>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="single-property-1.html">$ 350,000</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="#" title="Compare">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                                <a href="#" title="Share">
                                                    <i class="fas fa-share-alt"></i>
                                                </a>
                                                <a href="#" title="Favorites">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="agents-grid">
                            <div class="people landscapes no-pb pbp-3">
                                <div class="project-single no-mb last" data-aos="fade-up">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <img src="{{ asset(MyApp::ASSET_IMG.'feature-properties/fp-12.jpg') }}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1.html">Real House Luxury Villa</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix">
                                            <li>
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                <span>6 Beds</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-bath" aria-hidden="true"></i>
                                                <span>3 Baths</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-object-group" aria-hidden="true"></i>
                                                <span>720 sq ft</span>
                                            </li>
                                        </ul>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="single-property-1.html">$ 350,000</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="#" title="Compare">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                                <a href="#" title="Share">
                                                    <i class="fas fa-share-alt"></i>
                                                </a>
                                                <a href="#" title="Favorites">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="agents-grid">
                            <div class="landscapes">
                                <div class="project-single" data-aos="fade-up">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button alt featured">Featured</div>
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <img src="{{ asset(MyApp::ASSET_IMG.'blog/b-11.jpg') }}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1.html">Real House Luxury Villa</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix">
                                            <li>
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                <span>6 Beds</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-bath" aria-hidden="true"></i>
                                                <span>3 Baths</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-object-group" aria-hidden="true"></i>
                                                <span>720 sq ft</span>
                                            </li>
                                        </ul>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="single-property-1.html">$ 350,000</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="#" title="Compare">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                                <a href="#" title="Share">
                                                    <i class="fas fa-share-alt"></i>
                                                </a>
                                                <a href="#" title="Favorites">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="agents-grid">
                            <div class="people">
                                <div class="project-single" data-aos="fade-up">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <img src="{{ asset(MyApp::ASSET_IMG.'blog/b-12.jpg') }}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1.html">Real House Luxury Villa</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix">
                                            <li>
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                <span>6 Beds</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-bath" aria-hidden="true"></i>
                                                <span>3 Baths</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-object-group" aria-hidden="true"></i>
                                                <span>720 sq ft</span>
                                            </li>
                                        </ul>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="single-property-1.html">$ 350,000</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="#" title="Compare">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                                <a href="#" title="Share">
                                                    <i class="fas fa-share-alt"></i>
                                                </a>
                                                <a href="#" title="Favorites">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION PROPERTIES FOR SALE -->

        <!-- START SECTION INFO-HELP -->
        <section class="info-help">
            <div class="container">
                <div class="row info-head">
                    <div class="col-lg-6 col-md-8 col-xs-8" data-aos="fade-right">
                        <div class="info-text mt-5">
                            <h3>Special Offers Every Day.</h3>
                            <p>We Help you find the best places and offer near you. Bring to the table win-win survival strategies to ensure proactive domination going forward.</p>
                            <div class="inf-btn pro">
                                <a href="contact-us.html" class="btn btn-pro btn-secondary btn-lg">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-3"></div>
                </div>
            </div>
        </section>
        <!-- END SECTION INFO-HELP -->

        <!-- START SECTION PROPERTIES FOR RENT -->
        <section class="recently portfolio bg-white-1 rec-pro ho-17">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Properties for </span>Rent</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="row portfolio-items">
                    <div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale" data-aos="zoom-in" data-aos-delay="150">
                        <div class="landscapes listing-item compact thehp-2">
                            <a href="single-property-1.html" class="recent-16" data-aos="fade-up">
                                <div class="recent-img16 img-fluid img-center" style="background-image: url({{ asset(MyApp::ASSET_IMG.'interior/p-1.jpg') }});"></div>
                                <div class="recent-content"></div>
                                <div class="listing-badges">
                                    <span>For Rent</span>
                                </div>
                                <div class="recent-details">
                                    <div class="recent-title">Luxury House in New York</div>
                                    <div class="price-details">
                                    <div class="recent-price mb-3">$230,000</div>
                                    <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                                    </div>
                                </div>
                                <div class="view-proper">View Details</div>
                            </a>
                        </div>                        
                    </div>
                    <div class="item col-lg-4 col-md-6 col-xs-12 people rent" data-aos="zoom-in" data-aos-delay="250">
                        <div class="people listing-item compact thehp-2">
                            <a href="single-property-1.html" class="recent-16" data-aos="fade-up">
                                <div class="recent-img16 img-center" style="background-image: url({{ asset(MyApp::ASSET_IMG.'interior/p-2.jpg') }});"></div>
                                <div class="recent-content"></div>
                                <div class="listing-badges">
                                    <span>For Rent</span>
                                </div>
                                <div class="recent-details">
                                    <div class="recent-title">Villa House in Los Angeles</div>
                                    <div class="price-details">
                                    <div class="recent-price mb-3">$230,000</div>
                                    <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                                    </div>
                                </div>
                                <div class="view-proper">View Details</div>
                            </a>
                        </div>
                    </div>
                    <div class="item col-lg-4 col-md-6 col-xs-12 people landscapes sale" data-aos="zoom-in" data-aos-delay="350">
                        <div class="people landscapes no-pb pbp-3 listing-item compact thehp-2">
                            <a href="single-property-1.html" class="recent-16" data-aos="fade-up">
                                <div class="recent-img16 img-center" style="background-image: url({{ asset(MyApp::ASSET_IMG.'interior/p-3.jpg') }});"></div>
                                <div class="recent-content"></div>
                                <div class="listing-badges">
                                    <span>For Rent</span>
                                </div>
                                <div class="recent-details">
                                    <div class="recent-title">Family House in San Francisco</div>
                                    <div class="price-details">
                                    <div class="recent-price mb-3">$230,000</div>
                                    <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                                    </div>
                                </div>
                                <div class="view-proper">View Details</div>
                            </a>
                        </div>                        
                    </div>
                    <div class="item col-lg-4 col-md-6 col-xs-12 people landscapes sale" data-aos="zoom-in" data-aos-delay="150">
                        <div class="landscapes listing-item compact thehp-2">
                            <a href="single-property-1.html" class="recent-16" data-aos="fade-up">
                                <div class="recent-img16 img-center" style="background-image: url({{ asset(MyApp::ASSET_IMG.'feature-properties/fp-11.jpg') }});"></div>
                                <div class="recent-content"></div>
                                <div class="listing-badges">
                                    <span>For Rent</span>
                                </div>
                                <div class="recent-details">
                                    <div class="recent-title">Condo House in Miami</div>
                                    <div class="price-details">
                                    <div class="recent-price mb-3">$230,000</div>
                                    <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                                    </div>
                                </div>
                                <div class="view-proper">View Details</div>
                            </a>
                        </div>
                    </div>
                    <div class="item col-lg-4 col-md-6 col-xs-12 people landscapes sale" data-aos="zoom-in" data-aos-delay="250">
                        <div class="landscapes listing-item compact thehp-2">
                            <a href="single-property-1.html" class="recent-16" data-aos="fade-up">
                                <div class="recent-img16 img-center" style="background-image: url({{ asset(MyApp::ASSET_IMG.'single-property/s-6.jpg') }});"></div>
                                <div class="recent-content"></div>
                                <div class="listing-badges">
                                    <span>For Rent</span>
                                </div>
                                <div class="recent-details">
                                    <div class="recent-title">Condo House in Miami</div>
                                    <div class="price-details">
                                    <div class="recent-price mb-3">$230,000</div>
                                    <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                                    </div>
                                </div>
                                <div class="view-proper">View Details</div>
                            </a>
                        </div>
                    </div>
                    <div class="item col-lg-4 col-md-6 it2 col-xs-12 web rent ho17-thelast no-pb" data-aos="zoom-in" data-aos-delay="350">
                        <div class="people landscapes no-pb pbp-3 listing-item compact thehp-2">
                            <a href="single-property-1.html" class="recent-16" data-aos="fade-up">
                                <div class="recent-img16 img-center" style="background-image: url({{ asset(MyApp::ASSET_IMG.'single-property/s-1.jpg') }});"></div>
                                <div class="recent-content"></div>
                                <div class="listing-badges">
                                    <span>For Rent</span>
                                </div>
                                <div class="recent-details">
                                    <div class="recent-title">Luxury House in Toronto</div>
                                    <div class="price-details">
                                    <div class="recent-price mb-3">$230,000</div>
                                    <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                                    </div>
                                </div>
                                <div class="view-proper">View Details</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION PROPERTIES FOR RENT -->

        <!-- START SECTION BLOG -->
        <section class="blog-section bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Latest </span>News</h2>
                    <p>The latest news form real estate.</p>
                </div>
                <div class="news-wrap">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-xs-12" data-aos="fade-right">
                            <div class="news-item news-item-sm">
                                <a href="blog-details.html" class="news-img-link">
                                    <div class="news-item-img">
                                        <img class="resp-img" src="{{ asset(MyApp::ASSET_IMG.'blog/b-1.jpg') }}" alt="blog image">
                                    </div>
                                </a>
                                <div class="news-item-text">
                                    <a href="blog-details.html"><h3>The Real Estate News</h3></a>
                                    <span class="date">Jun 23, 2020 &nbsp;/&nbsp; By Admin</span>
                                    <div class="news-item-descr">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="blog-details.html" class="news-link">Read more...</a>
                                        <ul class="action-list">
                                            <li class="action-item"><i class="fa fa-heart"></i> <span>306</span></li>
                                            <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                            <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="news-item news-item-sm min-last">
                                <a href="blog-details.html" class="news-img-link">
                                    <div class="news-item-img">
                                        <img class="resp-img" src="{{ asset(MyApp::ASSET_IMG.'blog/b-2.jpg') }}" alt="blog image">
                                    </div>
                                </a>
                                <div class="news-item-text">
                                    <a href="blog-details.html"><h3>The Real Estate News</h3></a>
                                    <span class="date">Jun 23, 2020 &nbsp;/&nbsp; By Admin</span>
                                    <div class="news-item-descr">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="blog-details.html" class="news-link">Read more...</a>
                                        <ul class="action-list">
                                            <li class="action-item"><i class="fa fa-heart"></i> <span>306</span></li>
                                            <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                            <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12 col-xs-12" data-aos="fade-left">
                            <div class="news-item news-item-sm">
                                <a href="blog-details.html" class="news-img-link">
                                    <div class="news-item-img">
                                        <img class="resp-img" src="{{ asset(MyApp::ASSET_IMG.'blog/b-3.jpg') }}" alt="blog image">
                                    </div>
                                </a>
                                <div class="news-item-text">
                                    <a href="blog-details.html"><h3>The Real Estate News</h3></a>
                                    <span class="date">Jun 23, 2020 &nbsp;/&nbsp; By Admin</span>
                                    <div class="news-item-descr">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="blog-details.html" class="news-link">Read more...</a>
                                        <ul class="action-list">
                                            <li class="action-item"><i class="fa fa-heart"></i> <span>306</span></li>
                                            <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                            <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="news-item news-item-sm last">
                                <a href="blog-details.html" class="news-img-link">
                                    <div class="news-item-img">
                                        <img class="resp-img" src="{{ asset(MyApp::ASSET_IMG.'blog/b-4.jpg') }}" alt="blog image">
                                    </div>
                                </a>
                                <div class="news-item-text">
                                    <a href="blog-details.html"><h3>The Real Estate News</h3></a>
                                    <span class="date">Jun 23, 2020 &nbsp;/&nbsp; By Admin</span>
                                    <div class="news-item-descr">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="blog-details.html" class="news-link">Read more...</a>
                                        <ul class="action-list">
                                            <li class="action-item"><i class="fa fa-heart"></i> <span>306</span></li>
                                            <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                            <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION BLOG -->

        <!-- START SECTION AGENTS -->
        <section class="team bg-white-1 rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Meet Our </span>Agents</h2>
                    <p>Our Agents are here to help you</p>
                </div>
                <div class="row team-all">
                    <!--Team Block-->
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2" data-aos="fade-up" data-aos-delay="150">
                        <div class="inner-box team-details">
                            <div class="image team-head">
                                <a href="agents-listing-grid.html"><img src="{{ asset(MyApp::ASSET_IMG.'team/t-5.jpg') }}" alt="" /></a>
                                <div class="team-hover">
                                    <ul class="team-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="agents-listing-grid.html">Carls Jhons</a></h3>
                                <div class="designation">Real Estate Agent</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2" data-aos="fade-up" data-aos-delay="250">
                        <div class="inner-box team-details">
                            <div class="image team-head">
                                <a href="agents-listing-grid.html"><img src="{{ asset(MyApp::ASSET_IMG.'team/t-6.jpg') }}" alt="" /></a>
                                <div class="team-hover">
                                    <ul class="team-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="agents-listing-grid.html">Arling Tracy</a></h3>
                                <div class="designation">Real Estate Agent</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2" data-aos="fade-up" data-aos-delay="350">
                        <div class="inner-box team-details">
                            <div class="image team-head">
                                <a href="agents-listing-grid.html"><img src="{{ asset(MyApp::ASSET_IMG.'team/t-7.jpg') }}" alt="" /></a>
                                <div class="team-hover">
                                    <ul class="team-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="agents-listing-grid.html">Mark Web</a></h3>
                                <div class="designation">Real Estate Agent</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2 pb-none" data-aos="fade-up" data-aos-delay="450">
                        <div class="inner-box team-details">
                            <div class="image team-head">
                                <a href="agents-listing-grid.html"><img src="{{ asset(MyApp::ASSET_IMG.'team/t-8.jpg') }}" alt="" /></a>
                                <div class="team-hover">
                                    <ul class="team-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="agents-listing-grid.html">Katy Grace</a></h3>
                                <div class="designation">Real Estate Agent</div>
                            </div>
                        </div>
                    </div>
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2 pb-none" data-aos="fade-up" data-aos-delay="550">
                        <div class="inner-box team-details">
                            <div class="image team-head">
                                <a href="agents-listing-grid.html"><img src="{{ asset(MyApp::ASSET_IMG.'team/team-image-2.jpg') }}" alt="" /></a>
                                <div class="team-hover">
                                    <ul class="team-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="agents-listing-grid.html">Chris Melo</a></h3>
                                <div class="designation">Real Estate Agent</div>
                            </div>
                        </div>
                    </div>
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2 pb-none" data-aos="fade-up" data-aos-delay="650">
                        <div class="inner-box team-details">
                            <div class="image team-head">
                                <a href="agents-listing-grid.html"><img src="{{ asset(MyApp::ASSET_IMG.'team/team-image-7.jpg') }}" alt="" /></a>
                                <div class="team-hover">
                                    <ul class="team-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="agents-listing-grid.html">Nina Thomas</a></h3>
                                <div class="designation">Real Estate Agent</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION AGENTS -->

        <!-- STAR SECTION PARTNERS -->
        <div class="partners bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Our </span>Partners</h2>
                    <p>The Companies That Represent Us.</p>
                </div>
                <div class="owl-carousel style2">
                    <div class="owl-item" data-aos="fade-up"><img src="{{ asset(MyApp::ASSET_IMG.'partners/11.jpg') }}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{ asset(MyApp::ASSET_IMG.'partners/12.jpg') }}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{ asset(MyApp::ASSET_IMG.'partners/13.jpg') }}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{ asset(MyApp::ASSET_IMG.'partners/14.jpg') }}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{ asset(MyApp::ASSET_IMG.'partners/15.jpg') }}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{ asset(MyApp::ASSET_IMG.'partners/16.jpg') }}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{ asset(MyApp::ASSET_IMG.'partners/17.jpg') }}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{ asset(MyApp::ASSET_IMG.'partners/11.jpg') }}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{ asset(MyApp::ASSET_IMG.'partners/12.jpg') }}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{ asset(MyApp::ASSET_IMG.'partners/13.jpg') }}" alt=""></div>
                </div>
            </div>
        </div>
        <!-- END SECTION PARTNERS -->

        <!-- START SECTION TOP LOCATION -->
        <section class="top-location py-0">
            <h4>POPULAR PLACES</h4>
            <div class="owl-carousel owl-theme" id="tp-carousel">
                <div class="item" data-aos="zoom-in">
                    <div class="tp-caption">
                        <h6>New York City</h6>
                        <strong>203 Properties</strong>
                        <p>From:&nbsp; $230,000 - 1,223,456</p>
                    </div>
                    <img src="{{ asset(MyApp::ASSET_IMG.'blog/b-1.jpg') }}" alt="">
                </div>
                <div class="item" data-aos="zoom-in">
                    <div class="tp-caption">
                        <h6>Los Angeles</h6>
                        <strong>321 Properties</strong>
                        <p>From:&nbsp; $230,000 - 1,223,456</p>
                    </div>
                    <img src="{{ asset(MyApp::ASSET_IMG.'blog/b-2.jpg') }}" alt="">
                </div>
                <div class="item" data-aos="zoom-in">
                    <div class="tp-caption">
                        <h6>San Francisco</h6>
                        <strong>196 Properties</strong>
                        <p>From:&nbsp; $230,000 - 1,223,456</p>
                    </div>
                    <img src="{{ asset(MyApp::ASSET_IMG.'blog/b-3.jpg') }}" alt="">
                </div>
                <div class="item" data-aos="zoom-in">
                    <div class="tp-caption">
                        <h6>Miami</h6>
                        <strong>587 Properties</strong>
                        <p>From:&nbsp; $230,000 - 1,223,456</p>
                    </div>
                    <img src="{{ asset(MyApp::ASSET_IMG.'blog/b-4.jpg') }}" alt="">
                </div>
                <div class="item" data-aos="zoom-in">
                    <div class="tp-caption">
                        <h6>Chicago</h6>
                        <strong>467 Properties</strong>
                        <p>From:&nbsp; $230,000 - 1,223,456</p>
                    </div>
                    <img src="{{ asset(MyApp::ASSET_IMG.'blog/b-5.jpg') }}" alt="">
                </div>
                <div class="item" data-aos="zoom-in">
                    <div class="tp-caption">
                        <h6>Los Angeles</h6>
                        <strong>267 Properties</strong>
                        <p>From:&nbsp; $230,000 - 1,223,456</p>
                    </div>
                    <img src="{{ asset(MyApp::ASSET_IMG.'blog/b-6.jpg') }}" alt="">
                </div>
                <div class="item" data-aos="zoom-in">
                    <div class="tp-caption">
                        <h6>San Francisco</h6>
                        <strong>568 Properties</strong>
                        <p>From:&nbsp; $230,000 - 1,223,456</p>
                    </div>
                    <img src="{{ asset(MyApp::ASSET_IMG.'blog/b-7.jpg') }}" alt="">
                </div>
                <div class="item" data-aos="zoom-in">
                    <div class="tp-caption">
                        <h6>Miami</h6>
                        <strong>568 Properties</strong>
                        <p>From:&nbsp; $230,000 - 1,223,456</p>
                    </div>
                    <img src="{{ asset(MyApp::ASSET_IMG.'blog/b-8.jpg') }}" alt="">
                </div>
            </div>
        </section>
        <!-- END SECTION TOP LOCATION -->
@endsection

