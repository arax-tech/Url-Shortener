@extends('front.app')
@section('title', 'Blog - Details ')
@section('content')


<!--============= Page Header Section Starts Here =============-->
<section class="page-header">
    <div class="banner-bg bg_img" data-background="{{ asset('assets/images/banner/banner-bg.jpg') }}">
        <div class="banner-bg-shape"><img src="{{ asset('assets/images/banner/banner-shape.png') }}" alt="banner"></div>
        <div class="round-1">
            <img src="{{ asset('assets/images/banner/01.png') }}" alt="banner">
        </div>
        <div class="round-2">
            <img src="{{ asset('assets/images/banner/02.png') }}" alt="banner">
        </div>
    </div>
    <div class="container">
        <div class="hero-content">
            <h1 class="title"><?php echo mb_strimwidth($blog->title, 0, 30, "..."); ?></h1>
        </div>
    </div>
</section>
<!--============= Page Header Section Ends Here =============-->




<!--============= Blog Section Starts Here =============-->
<section class="blog-section mt--150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article class="mb-40-none">
                    <div class="post-item style-two">
                        <div class="post-thumb">
                            <a href="{{ url('/blog/'.$blog->id)}}"><img style="height: 400px;" src="{{ asset('/back_end/uploads/blogs/'.$blog->image) }}"></a>
                        </div>
                        <div class="post-content">
                            <h3 class="title">
                                <a href="{{ url('/blog/'.$blog->id)}}">{{ $blog->title }} </a>
                            </h3>
                            <p>
                                {!! $blog->description !!}
                            </p>
                            <a href="{{ url('/blog/'.$blog->id)}}" class="read">{{ $blog->author }}</a>
                        </div>
                    </div>

                </article>
              
            </div>
            <div class="col-lg-4 col-md-8 col-sm-10">
                <aside class="sticky-menu">
                   
                    <div class="widget widget-post">
                        <h5 class="title">latest post</h5>
                        <div class="slider-nav">
                            <span class="widget-prev"><i class="fas fa-angle-left"></i></span>
                            <span class="widget-next active"><i class="fas fa-angle-right"></i></span>
                        </div>
                        <div class="widget-slider owl-carousel owl-theme">
                            @foreach($latests as $latest)
                            <div class="item">
                                <div class="thumb">
                                    <a href="{{ url('/blog/'.$latest->id)}}">
                                        <img style="height: 190px;" src="{{ asset('/back_end/uploads/blogs/'.$latest->image) }}" alt="blog">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="p-title">
                                        <a href="{{ url('/blog/'.$latest->id)}}">{{$latest->title}}</a>
                                    </h6>
                                    <div class="meta-post">
                                        <a href="{{ url('/blog/'.$latest->id)}}"><i class="flaticon-eye"></i>{{ $latest->author}}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    
                </aside>
            </div>
        </div>
    </div>
</section>
<!--============= Blog Section Ends Here =============-->



@endsection