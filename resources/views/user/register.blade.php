<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>User - Login</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    
  
</head>

<body>

    <!--============= ScrollToTop Section Starts Here =============-->
    <div class="overlayer" id="overlayer">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    <!--============= ScrollToTop Section Ends Here =============-->

    <!--============= Sign In Section Starts Here =============-->
    <div class="account-section bg_img" data-background="assets/images/account-bg.jpg">
        <div class="container">
            <div class="account-title text-center">
                <a href="{{ url('/') }}" class="back-home"><i class="fas fa-angle-left"></i><span>Back <span class="d-none d-sm-inline-block">To Home</span></span></a>
                
            </div> 
            <div class="account-wrapper">
                <div class="account-body">
                    <h4 class="title mb-20">Welcome To Login</h4>
                    <form class="account-form" method="post" action="{{ url('/register')}}">
                        @csrf
                        <div class="form-group">
                            <label for="sign-up">Your Name </label>
                            <input type="text" name="name" placeholder="Enter Your Name " id="sign-up">
                        </div>

                        <div class="form-group">
                            <label for="sign-up">Your Email </label>
                            <input type="email" name="email" placeholder="Enter Your Email " id="sign-up">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="password" placeholder="Enter Your Password" id="pass">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="mt-2 mb-2">Sign Up</button>
                        </div>
                    </form>
                </div>
                <div class="or">
                    <span>OR</span>
                </div>
                <div class="account-header pb-0">
                    <span class="d-block mt-15">Have an account? <a href="{{ url('/login') }}">Login Here</a></span>
                </div>
            </div>
        </div>
    </div>
    <!--============= Sign In Section Ends Here =============-->


    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/paroller.js') }}"></script>
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(Session::has('flash_message_error'))
  
        <script>
            swal({
              text: "{!! session('flash_message_error') !!}",
              title: "Oopss!",
              icon: "error",
            });
        </script>
    @endif

    @if(Session::has('flash_message_success'))
        <script>
            swal({
              text: "",
              title: "{!! session('flash_message_success') !!}",
              icon: "success",
            });
        </script>
    @endif

</body>


<!-- Mirrored from pixner.net/cortaly/main/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Mar 2021 11:15:19 GMT -->
</html>