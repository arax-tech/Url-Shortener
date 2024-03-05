<?php 
    
    use App\User;
    use App\Payment;
    use Carbon\Carbon;


    /*Check User Buy Package OR Not*/
    $check = Payment::where(['user_id' => Auth::User()->user_id, 'status' => 'Complete'])->count();
    if ($check == 0 )
    {
        echo '<script>window.location = "../pricing";</script>';
    }


    /*Here When Package Will Expired Then*/
    $register_at = Auth::User()->created_at;
    $expired_at = $register_at->addMonth();
   
    $ex_at =  date('Y-m-d H:m:s', time());

    if ($ex_at >= $expired_at)
    {
        $users = User::where('email', Auth::User()->email)->orWhere('created_at', '=', Carbon::now()->addMonth())->update(['status' => 'Expired']);

        echo '<script>window.location = "../pricing";</script>';
        return redirect()->back()->with('flash_message_error','Your Package is Expired Please Buy Again...');
    }    
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('back_end/assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('back_end/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('back_end/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('back_end/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        
        <!-- plugin css -->
        <link href="{{ asset('back_end/assets/libs/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        

    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
                <div class="container-fluid">
                    <!-- LOGO -->
                    <a href="{{url('/user/dashboard')}}" class="navbar-brand mr-0 mr-md-2 logo">
                        <span class="logo-lg">
                            <img src="{{ asset('back_end/assets/images/logo.png')}}" alt="" height="24" />
                            <span class="d-inline h5 ml-1 text-logo">{{Auth::User()->name}}</span>
                        </span>
                        <span class="logo-sm">
                            <img src="{{ asset('back_end/assets/images/logo.png') }}" alt="" height="24">
                        </span>
                    </a>

                    <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
                        <li class="">
                            <button class="button-menu-mobile open-left disable-btn">
                                <i data-feather="menu" class="menu-icon"></i>
                                <i data-feather="x" class="close-icon"></i>
                            </button>
                        </li>
                    </ul>

                  
                </div>

            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('user.app.inc.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            @yield('content')

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('back_end/assets/js/vendor.min.js') }}"></script>

        <!-- optional plugins -->
        <script src="{{ asset('back_end/assets/libs/moment/moment.min.js') }}"></script>
        <script src="{{ asset('back_end/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('back_end/assets/libs/flatpickr/flatpickr.min.js') }}"></script>

        <!-- page js -->
        <script src="{{ asset('back_end/assets/js/pages/dashboard.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('back_end/assets/js/app.min.js') }}"></script>

        <!-- DataTable -->
        <script src="{{ asset('back_end/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('back_end/assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
   

        <!-- Datatables init -->
        <script src="{{ asset('back_end/assets/js/pages/datatables.init.js') }}"></script>
        <!-- Sweet Alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        @yield('script')
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

        <script type="text/javascript">
            $(".delete_link").click(function(){
                var id = $(this).attr('rel');
                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this link!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })

                .then((willDelete) => {
                  if (willDelete) {
                    window.location.href = '{{url('')}}'+ '/user/delete-links/'+id;
                  } else {
                    swal("Your Link is safe!");
                  }
                });
            });



            $(".delete_tags").click(function(){
                var id = $(this).attr('rel');
                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this Tag!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })

                .then((willDelete) => {
                  if (willDelete) {
                    window.location.href = '{{url('')}}'+ '/user/delete-tags/'+id;
                  } else {
                    swal("Your Tag is safe!");
                  }
                });
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
        @yield('charts')
       

       
    </body>
</html>