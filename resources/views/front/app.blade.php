<?php 
    
    use App\User;
    use App\Payment;
    use Carbon\Carbon;


    

    
    
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <style type="text/css">
    	.btn-light{background-color: #14679e !important;color: #fefefe !important;}
    	.banner-form-group{border-radius: 10px !important;}
    	.custom_copy{background: #edf2fe !important; color: #2a5bd7 !important; margin-top: -5px !important}
    	.custom_div{background: #edf2fe !important; padding: 10px; margin: 20px -60px -40px -60px !important;}
    	@media only screen and (max-width: 480px)
    	{
    		.custom_div{margin: 25px -15px -10px -15px !important;}
    	}
    </style>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
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
    <!--============= Header Section Starts Here =============-->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="{{ url('/')}}">
                        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo">
                    </a>
                </div>
                <ul class="menu">
                    <li>
                        <a href="{{ url('/')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/pricing')}}">Pricing</a>
                    </li>
                    <li>
                        <a href="{{ url('faq')}}">Faq</a>
                    </li>

                    <li>
                        <a href="{{ url('blog')}}">Blog</a>
                    </li>
                    
                </ul>
                <div class="header-bar d-lg-none mr-sm-3">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                @guest
                <div class="header-right">
                    <a href="{{ url('/login') }}" class="header-button d-none d-sm-inline-block m-0 active">Login</a>
                    <a href="{{ url('/register') }}" class="header-button d-none d-sm-inline-block m-0">Register</a>
                </div>

                @else
                <?php if (Auth::User()->role == "User"): ?>
                    
                
                <div class="header-right">
                    <a href="{{ url('/user/dashboard') }}" class="header-button d-none d-sm-inline-block m-0">Dashboard</a>

                    <a href="{{ url('/user/logout') }}" class="header-button d-none d-sm-inline-block m-0 active">Logout</a>
                </div>

                <?php else: ?>
                <div class="header-right">
                    <a href="{{ url('/admin/dashboard') }}" class="header-button d-none d-sm-inline-block m-0">Dashboard</a>

                    <a href="{{ url('/admin/logout') }}" class="header-button d-none d-sm-inline-block m-0 active">Logout</a>
                </div>



                <?php endif ?>
                @endguest
            </div>
        </div>
    </header>
    <!--============= Header Section Ends Here =============-->


    @yield('content')



    <!--============= Footer Section Starts Here =============-->
    <footer class="footer-section padding-top">
        <div class="footer-bg bg_img" data-background="{{ asset('assets/images/footer/footer-bg.jpg') }}"></div>
        <div class="footer-bg d-md-block d-none"><img src="{{ asset('assets/images/footer/wave.png') }}" alt="footer"></div>
        <div class="container">
            <div class="section-header cl-white-499">
                <h5 class="cate">Contact Us</h5>
                <h2 class="title">Get in touch!</h2>
                <p>We thrive to ensure that you get the most out of your experience</p>
            </div>
            <form class="contact-form" method="post" action="{{ url('/contact') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Your Full Name</label>
                    <input type="text" name="name" required placeholder="Enter Your Full Name">
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" placeholder="Enter Your Message"></textarea>
                </div>
                <div class="form-group check-group">
                    <input type="checkbox" id="check" required>
                    <label for="check">I agree to receive emails messages</label>
                </div>
                <div class="form-group text-center">
                    <button type="submit">Send Message</button>
                </div>
            </form>
            <div class="footer-top">
                <div class="logo">
                    <a href="{{ url('/')}}">
                        <img src="{{ asset('assets/images/logo/footer-logo.png') }}" alt="logo">
                    </a>
                </div>
                <ul class="links">
                    <li>
                        <a href="#0"><img style="width: 450px" src="{{ asset('assets/rozorpay.png') }}" alt="footer"></a>
                    </li>
                   
                </ul>
            </div>
            <div class="footer-bottom">
                <div class="footer-bottom-area">
                    <div class="left cl-white">
                        <p>&copy; Copyright {{ date('Y')}} | <a href="#0">URL Shortner</a></p>
                    </div>

                    <div class="left cl-white">
                        <p>Devloped By | <a target="_blank" href="https://www.fiverr.com/arham_khan_web">Arham Khan</a></p>
                    </div>
                    <ul class="social-icons">
                        <li>
                            <a href="#0" class="active">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--============= Footer Section Ends Here =============-->




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
    @yield('script')
    @if(Session::has('flash_message_error'))
         <script>
            swal({
              text: "{!! session('flash_message_error') !!}",
              title: "Oops!",
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

    @if(!empty(Session::get('confirmation')) OR Session::get('confirmation') == 'modal')
    <script>
    $(function() {
        $('#confirm_modal').modal('show');
    });
    </script>
    @endif
    
   @guest
   @else
   <?php 
   /*Check User Buy Package OR Not*/
   $check = Payment::where(['user_id' => Auth::User()->user_id, 'status' => 'Complete'])->count();
   if ($check == 0 )
   {
       echo "<script>
       $(function() {
           $('#confirm_modal').modal('show');
       });
       </script>";
   }

   ?>
   @endguest
    <!-- Modal -->
    <div class="modal fade" id="confirm_modal" >
      <div class="modal-dialog">
        <div class="modal-content">
         
          <div class="modal-body p-5">
            <h4 class="text-center mb-4">Confirm Payments</h4>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{url('/user/payments')}}" method="POST">
                        @csrf
                        @guest
                        @else
                        <input type="hidden" name="user_id" value="{{ Auth::User()->id }}">
                        @endguest
                        <input type="hidden" name="amount" value="50">
                        <button class="btn btn-primary btn-block">Pay Now</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <a class="btn btn-danger btn-block" href="{{ url('/user/cancel') }}">Cancel</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>