@extends('front.app')
@section('title', 'FAQ ')
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
                <h1 class="title">Frequently Asked Questions</h1>
            </div>
        </div>
    </section>
    <!--============= Page Header Section Ends Here =============-->


    <!--============= Payout Section Starts Here =============-->
    <section class="faq-section">
        <div class="container">
            <div class="faq-area padding-top padding-bottom mt--150">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        <div class="section-header mw-100">
                            <h5 class="cate">GOT A QUESTION?</h5>
                            <h2 class="title"> We've Got Answers.</h2>
                        </div>
                    </div>
                </div>
                <div class="faq-wrapper">
                    <div class="faq-item">
                        <div class="faq-title">
                            <img src="{{ asset('assets/css/img/faq.png') }}" alt="css"><span class="title">Why use a link shortener?</span><span class="right-icon"></span>
                        </div>
                        <div class="faq-content">
                            <p>Yes, we can do that provided that you send us a complete abuse notice to us. We will then block it.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-title">
                            <img src="{{ asset('assets/css/img/faq.png') }}" alt="css"><span class="title">What will happen if I wasn't able earn enough to be paid?</span><span class="right-icon"></span>
                        </div>
                        <div class="faq-content">
                            <p>Yes, we can do that provided that you send us a complete abuse notice to us. We will then block it.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-title">
                            <img src="{{ asset('assets/css/img/faq.png') }}" alt="css"><span class="title">Do you have a referral program? How much does it pay?</span><span class="right-icon"></span>
                        </div>
                        <div class="faq-content">
                            <p>Yes, we can do that provided that you send us a complete abuse notice to us. We will then block it.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-title">
                            <img src="{{ asset('assets/css/img/faq.png') }}" alt="css"><span class="title">How to withdrawal money?</span><span class="right-icon"></span>
                        </div>
                        <div class="faq-content">
                            <p>Yes, we can do that provided that you send us a complete abuse notice to us. We will then block it.</p>
                        </div>
                    </div>
                    <div class="faq-item open active">
                        <div class="faq-title">
                            <img src="{{ asset('assets/css/img/faq.png') }}" alt="css"><span class="title">Can you stop someone shrinking my URL?</span><span class="right-icon"></span>
                        </div>
                        <div class="faq-content">
                            <p>Yes, we can do that provided that you send us a complete abuse notice to us. We will then block it.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-title">
                            <img src="{{ asset('assets/css/img/faq.png') }}" alt="css"><span class="title">Why my views/earnings are not counting?</span><span class="right-icon"></span>
                        </div>
                        <div class="faq-content">
                            <p>Yes, we can do that provided that you send us a complete abuse notice to us. We will then block it.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-title">
                            <img src="{{ asset('assets/css/img/faq.png') }}" alt="css"><span class="title">How to create shorten link?</span><span class="right-icon"></span>
                        </div>
                        <div class="faq-content">
                            <p>Yes, we can do that provided that you send us a complete abuse notice to us. We will then block it.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Payout Section Ends Here =============-->

@endsection