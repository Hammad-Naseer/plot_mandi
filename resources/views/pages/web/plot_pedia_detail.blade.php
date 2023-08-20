@extends('layouts.app')
@section('content')
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>{{ $plotPediaDetail->title }}</h1>
            <h2><a href="/">Home </a> &nbsp;/&nbsp; Plot Pedia Detail</h2>
        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->

<!-- START SECTION LOGIN -->
<div id="login">
    <div class="p-5 m-5">
        <section class="blog blog-section bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 blog-pots">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="news-item details no-mb2">
                                    <a href="#" class="news-img-link">
                                        <div class="news-item-img">
                                            <img class="img-responsive" src="{{ Storage::url($plotPediaDetail->image) }}" alt="{{ Storage::url($plotPediaDetail->image) }}">
                                        </div>
                                    </a>
                                    <div class="news-item-text details pb-0">
                                        <a href="#"><h3>{{ $plotPediaDetail->title }}</h3></a>
                                        <div class="dates">
                                            <span class="date">{{ PlotDateFormater($plotPediaDetail->created_at,"M d Y") }} </span> 
                                            {{-- &nbsp;/ --}}
                                            <ul class="action-list pl-0">
                                                {{-- <li class="action-item pl-2"><i class="fa fa-heart"></i> <span>306</span></li>
                                                <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                                <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li> --}}
                                            </ul>
                                        </div>
                                        <div class="news-item-descr big-news details visib mb-0">
                                            <p class="mb-3">
                                                {{ $plotPediaDetail->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <section class="comments">
                            <h3 class="mb-5">5 Comments</h3>
                            <div class="row mb-4">
                                <ul class="col-12 commented">
                                    <li class="comm-inf">
                                        <div class="col-md-2">
                                            <img src="images/testimonials/ts-4.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-10 comments-info">
                                            <h5 class="mb-1">Mario Smith</h5>
                                            <p class="mb-4">Jun 23, 2020</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam, quam congue dictum luctus, lacus magna congue ante, in finibus dui sapien eu dolor. Integer tincidunt suscipit erat, nec laoreet ipsum vestibulum sed.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="row ml-5">
                                <ul class="col-12 commented">
                                    <li class="comm-inf">
                                        <div class="col-md-2">
                                            <img src="images/testimonials/ts-5.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-10 comments-info">
                                            <h5 class="mb-1">Mary Tyron</h5>
                                            <p class="mb-4">Jun 23, 2020</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam, quam congue dictum luctus, lacus magna congue ante, in finibus dui sapien eu dolor. Integer tincidunt suscipit erat, nec laoreet ipsum vestibulum sed.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="row my-4">
                                <ul class="col-12 commented">
                                    <li class="comm-inf">
                                        <div class="col-md-2">
                                            <img src="images/testimonials/ts-6.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-10 comments-info no-mb">
                                            <h5 class="mb-1">Leo Williams</h5>
                                            <p class="mb-4">Jun 23, 2020</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam, quam congue dictum luctus, lacus magna congue ante, in finibus dui sapien eu dolor. Integer tincidunt suscipit erat, nec laoreet ipsum vestibulum sed.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section> --}}
                        {{-- <section class="leve-comments wpb">
                            <h3 class="mb-5">Leave a Comment</h3>
                            <div class="row">
                                <div class="col-md-12 data">
                                    <form action="#">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <textarea class="form-control" id="exampleTextarea" rows="8" placeholder="Message" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg mt-2">Submit Comment</button>
                                    </form>
                                </div>
                            </div>
                        </section> --}}
                    </div>
                    <aside class="col-lg-3 col-md-12">
                        <div class="widget">
                            <h5 class="font-weight-bold mb-4">Search</h5>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                            <button class="btn btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </span>
                            </div>
                            {{-- <div class="recent-post py-5">
                                <h5 class="font-weight-bold">Category</h5>
                                <ul>
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>House</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Garages</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Real Estate</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Real Home</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Bath</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Beds</a></li>
                                </ul>
                            </div>
                            <div class="recent-post">
                                <h5 class="font-weight-bold mb-4">Popular Tags</h5>
                                <div class="tags">
                                    <span><a href="#" class="btn btn-outline-primary">Houses</a></span>
                                    <span><a href="#" class="btn btn-outline-primary">Real Home</a></span>
                                </div>
                                <div class="tags">
                                    <span><a href="#" class="btn btn-outline-primary">Baths</a></span>
                                    <span><a href="#" class="btn btn-outline-primary">Beds</a></span>
                                </div>
                                <div class="tags">
                                    <span><a href="#" class="btn btn-outline-primary">Garages</a></span>
                                    <span><a href="#" class="btn btn-outline-primary">Family</a></span>
                                </div>
                                <div class="tags">
                                    <span><a href="#" class="btn btn-outline-primary">Real Estates</a></span>
                                    <span><a href="#" class="btn btn-outline-primary">Properties</a></span>
                                </div>
                                <div class="tags">
                                    <span><a href="#" class="btn btn-outline-primary">Location</a></span>
                                    <span><a href="#" class="btn btn-outline-primary">Price</a></span>
                                </div>
                            </div> --}}
                            <div class="recent-post pt-5">
                                <h5 class="font-weight-bold mb-4">Recent Plot Pedia</h5>
                                @foreach($recentPlotPedia as $post)
                                <div class="recent-main">
                                    <div class="recent-img">
                                        <a href="{{ route('plot_pedia_detail',base64_encode($post->plot_pedias_id)) }}">
                                            <img src="{{ Storage::url($post->image) }}" alt="{{ Storage::url($post->image) }}">
                                        </a>
                                    </div>
                                    <div class="info-img">
                                        <a href="{{ route('plot_pedia_detail',base64_encode($post->plot_pedias_id)) }}">
                                            <h6>{{ $post->title }}</h6>
                                        </a>
                                        <p>{{ PlotDateFormater($post->created_at,"M d Y") }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- END SECTION LOGIN -->
@endsection