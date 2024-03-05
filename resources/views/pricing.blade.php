@extends('front.app')
@section('title', 'Pricing ')
@section('content')

<!--============= Page Header Section Starts Here =============-->
<section class="page-header">
    <div class="banner-bg bg_img" data-background="assets/images/banner/banner-bg.jpg">
        <div class="banner-bg-shape"><img src="assets/images/banner/banner-shape.png" alt="banner"></div>
        <div class="round-1">
            <img src="assets/images/banner/01.png" alt="banner">
        </div>
        <div class="round-2">
            <img src="assets/images/banner/02.png" alt="banner">
        </div>
    </div>
    <div class="container">
        <div class="hero-content">
            <h1 class="title">Publisher Rates</h1>
        </div>
    </div>
</section>
<!--============= Page Header Section Ends Here =============-->


<!--============= Publisher Section Starts Here =============-->
<div class="publisher-section">
    <div class="container">
        <div class="row mb-30-none justify-content-center mt--150">
            <div class="col-md-6 col-lg-4">
                <div class="publisher-item">
                    <div class="publisher-inner">
                        <div class="thumb">
                            <img src="assets/images/publisher/01.png" alt="publisher">
                        </div>
                        <h4 class="title">Basic Package</h4>
                        <h5 class="mb-2">₹ 50 <span style="font-size: 16px !important">/month</span></h5>
                        <ol class="text-left">
                            <li>Up to 1,500 branded links / month</li>
                            <li>Create and share branded links</li>
                            <li>Advanced Analytics</li>
                            <li>Redirect any link</li>
                            <li>Trace Link</li>
                            <li>Link Counter</li>
                        </ol>
                        
                        <form action="{{url('/user/payments')}}" method="POST">
                            @csrf
                            @guest
                            @else
                            <input type="hidden" name="user_id" value="{{ Auth::User()->id }}">
                            @endguest
                            <input type="hidden" name="amount" value="50">
                            <button class="button-3 active float-right btn-block" style="margin-bottom: -50px;">Pay Now</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="publisher-item">
                    <div class="publisher-inner">
                        <div class="thumb">
                            <img src="assets/images/publisher/02.png" alt="publisher">
                        </div>
                        <h4 class="title">Up Coming Package</h4>
                        <p>NUp Coming Package.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="publisher-item">
                    <div class="publisher-inner">
                        <div class="thumb">
                            <img src="assets/images/publisher/03.png" alt="publisher">
                        </div>
                        <h4 class="title">Up Coming Package</h4>
                        <p>Up Coming Package</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============= Publisher Section Ends Here =============-->


<!--============= Payout Section Starts Here =============-->
<section class="payout-section padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="section-header mw-100">
                    <h5 class="cate">PAYOUT RATES</h5>
                    <h2 class="title">We offer you the best</h2>
                    <p>We pay for ALL legitimate visitor you bring to your links. Multiple views from the same viewer are also counted thus you will be benefiting from all your traffic.</p>
                </div>
            </div>
        </div>
     
    </div>
</section>
<!--============= Payout Section Ends Here =============-->


@endsection