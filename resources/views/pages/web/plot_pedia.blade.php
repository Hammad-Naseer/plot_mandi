@extends('layouts.app')
@section('content')

<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>Plot Pedia</h1>
            <h2><a href="index-2.html">Home </a> &nbsp;/&nbsp; Plot Pedia</h2>
        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->
<style>
    img.img-responsive {
        height: 300px;
    }
</style>
<!-- START SECTION BLOG -->
<section class="blog-section">
    <div class="container">
        <div class="news-wrap">
            <div class="row">
                @foreach($pediaList as $list)
                <div class="col-lg-4 col-md-12 col-xs-12">
                    <div class="news-item">
                        <a href="{{ route('plot_pedia_detail',base64_encode($list->plot_pedias_id)) }}" class="news-img-link">
                            <div class="news-item-img text-center">
                                <img class="img-responsive" height="300px" src="{{ Storage::url($list->image) }}" alt="plot pedia image">
                            </div>
                        </a>
                        <div class="news-item-text">
                            <a href="{{ route('plot_pedia_detail',base64_encode($list->plot_pedias_id)) }}"><h3>{{ $list->title }}</h3></a>
                            <div class="dates">
                                <span class="date">{{ PlotDateFormater($list->created_at,"M d, Y") }} &nbsp;</span>
                                {{-- <ul class="action-list pl-0">
                                    <li class="action-item pl-2"><i class="fa fa-heart"></i> <span>306</span></li>
                                    <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                    <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                </ul> --}}
                            </div>
                            <div class="news-item-descr big-news">
                                <p>{{  Str::limit($list->description, 100) }}</p>
                            </div>
                            <div class="">
                                <a href="{{ route('plot_pedia_detail',base64_encode($list->plot_pedias_id)) }}" class="news-link">Read more...</a>
                                <div class="admin float-right">
                                    <p>By, Admin</p>
                                    <img src="{{ asset(MyApp::ASSET_IMG.'profile.png') }}" width="30" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{-- <nav aria-label="..." class="pt-5">
            <ul class="pagination mt-0">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav> --}}
    </div>
</section>
<!-- END SECTION BLOG -->

@endsection