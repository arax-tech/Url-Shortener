<?php 
    use App\Link;

    /*When Branded Link is Expired*/

    $date =  date('Y-m-d', time());
    $getLinks = Link::where('expiry_date', $date)->get();

    $update_status = Link::where('expiry_date', $date)->update(['status' => 'Expired']);
?>


@extends('front.app')
@section('title', 'URL Shortner ')
@section('content')




<!--============= Banner Section Starts Here =============-->
<section class="banner-section">
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
        <div class="banner-content">
            <h3 class="cate">Short links, big results</h3>
            <p>A URL shortener built with powerful tools to help you grow and protect your brand.</p>
        </div>
        <div class="banner-form-group">
            <form class="banner-form" method="post">
                @csrf
                <input type="url" name="link" placeholder="Your URL here" required>
                <button type="submit" name="shortener">Shorten <i class="flaticon-startup"></i></button>
            </form>
            <?php if (!empty(session('fullUrl'))): ?>
                
            
            <div class="banner-counter">
                <div class="counter-item">
                    <p style="margin-top: 1px !important">{{ mb_strimwidth(session('fullUrl'), 0, 50, "...") }}</p>
                </div>
                <div class="counter-item">
                    <p><a id="p1" target="_blank" class="text-primary" href="{!! session('NewShortenUrl') !!}">{!! session('NewShortenUrl') !!}</a> 
                    
                    <a class="btn btn-light custom_copy" onclick="copyToClipboard('#p1')">Copy</a></p>
                </div>
            </div>
            <?php endif ?>
            <div class="custom_div mt-3">
                <div class="row">
                	<div class="col-md-9">
                		<h5 class="float-left mt-2">Want to customize, brand, and track your links? </h5>
                	</div>
                	<div class="col-md-3">
                        @guest
                		<a class="button-3 active float-right btn-block"  href="{{ url('/pricing') }}">Get Started</a>
                        @else
                        <a class="button-3 active float-right btn-block"  href="{{ url('/user/create-links') }}">Get Started</a>
                        @endguest
                	</div>
                </div>

            </div>
        </div>
    </div>
</section>
<!--============= Banner Section Ends Here =============-->


<!--============= Why Section Starts Here =============-->
<section class="why-section padding-bottom padding-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-lg-100">
                <div class="section-header left-style mb-lg-0 sticky-header mb-low ml-0">
                    <h2 class="title">
                        Why Join Us?
                    </h2>
                    <p>Cortaly is a completely free tool where you can create short links, which apart from being free, you get paid! So, now you can make money from home, when managing and protecting your links.</p>
                    <a href="#0" class="custom-button active mt-2">Create Your Account</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="choose-item">
                    <div class="choose-thumb">
                        <img src="assets/images/why/01.png" alt="why">
                    </div>
                    <div class="choose-content">
                        <h5 class="title">JOIN OUR NETWORK</h5>
                        <p>Signup for an account in just one minute, shorten URLs and 
                            sharing your links to everywhere. And you'll be paid from any views.</p>
                    </div>
                </div>
                <div class="choose-item">
                    <div class="choose-thumb">
                        <img src="assets/images/why/02.png" alt="why">
                    </div>
                    <div class="choose-content">
                        <h5 class="title">HIGHEST RATES</h5>
                        <p>Make the most out of your traffic with our always increasing rates. You are required to earn only $5.00 before you will be paid.</p>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</section>
<!--============= Why Section Ends Here =============-->


<!--============= Feature Section Starts Here =============-->
<section class="feature-section padding-top oh padding-bottom pb-lg-half bg_img pos-rel" data-background="assets/images/feature/feature-bg.jpg">
    <div class="top-shape d-none d-md-block">
        <img src="assets/css/img/top-shape.png" alt="css">
    </div>
    <div class="bottom-shape d-none d-md-block mw-0">
        <img src="assets/css/img/bottom-shape.png" alt="css">
    </div>
    <div class="ball-2" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
    data-paroller-type="foreground" data-paroller-direction="horizontal">
        <img src="assets/images/balls/1.png" alt="balls">
    </div>
    <div class="ball-3" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
    data-paroller-type="foreground" data-paroller-direction="horizontal">
        <img src="assets/images/balls/2.png" alt="balls">
    </div>
    <div class="ball-4" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
    data-paroller-type="foreground" data-paroller-direction="horizontal">
        <img src="assets/images/balls/3.png" alt="balls">
    </div>
    <div class="ball-5" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
    data-paroller-type="foreground" data-paroller-direction="vertical">
        <img src="assets/images/balls/4.png" alt="balls">
    </div>
    <div class="ball-6" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
    data-paroller-type="foreground" data-paroller-direction="horizontal">
        <img src="assets/images/balls/5.png" alt="balls">
    </div>
    <div class="ball-7" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
    data-paroller-type="foreground" data-paroller-direction="vertical">
        <img src="assets/images/balls/6.png" alt="balls">
    </div>
    <div class="container">
        <div class="section-header cl-white">
            <!-- <h5 class="cate">Choose a plan that's right for you</h5> -->
            <h2 class="title mt-md-0">All Features</h2>
            <p>
                Mosto has plans, from free to paid, that scale with your needs. Subscribe to a plan that fits the size of your business.
            </p>
        </div>
        <div class="tab">
            <ul class="tab-menu feature-tab">
                <li>
                    <div class="thumb">
                        <img src="assets/images/feature/01.png" alt="feature">
                    </div>
                    <div class="content"> Create Account</div>
                </li>
                <li>
                    <div class="thumb">
                        <img src="assets/images/feature/02.png" alt="feature">
                    </div>
                    <div class="content">Dashboard</div>
                </li>
                
                <li>
                    <div class="thumb">
                        <img src="assets/images/feature/05.png" alt="feature">
                    </div>
                    <div class="content">Support</div>
                </li>
            </ul>
            <div class="tab-area">
                <div class="tab-item active">
                    <div class="feature-item">
                        <h3 class="title"> Create Account</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
                <div class="tab-item">
                    <div class="feature-item">
                        <h3 class="title">Dashboard</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>

                <div class="tab-item">
                    <div class="feature-item">
                        <h3 class="title">Support</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!--============= Feature Section Ends Here =============-->
@endsection

@section('script')
<script type="text/javascript">
    function copyToClipboard(element)
    {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        swal({
          title: "Data Copy to Clipboard!",
          text: "",
          icon: "success",
        });
    }
</script>
@endsection