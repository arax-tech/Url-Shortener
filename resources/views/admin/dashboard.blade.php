@extends('admin.app.app')

@section('title', 'Admin - Dashboard')
@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row page-title align-items-center">
                <div class="col-sm-4 col-xl-6">
                    <h4 class="mb-1 mt-0">Dashboard</h4>
                </div>
                
            </div>

            <!-- content -->
            <div class="row">
                <div class="col-md-3 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                                        Branded Links
                                    </span>
                                    <h2 class="mb-0">{{ $branded_links }}</h2>
                                </div>
                                <div class="align-self-center">
                                    <i data-feather="command" class="align-self-center icon-dual icon-lg"></i>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                                       Free Links
                                    </span>
                                    <h2 class="mb-0">{{ $free_links }}</h2>
                                </div>

                                <div class="align-self-center">
                                    <i data-feather="command" class="align-self-center icon-dual icon-lg"></i>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                                       Active Links
                                    </span>
                                    <h2 class="mb-0">{{ $active_links }}</h2>
                                </div>

                                <div class="align-self-center">
                                    <i data-feather="command" class="align-self-center icon-dual icon-lg"></i>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                                       Expired Links
                                    </span>
                                    <h2 class="mb-0">{{ $expied_links }}</h2>
                                </div>

                                <div class="align-self-center">
                                    <i data-feather="command" class="align-self-center icon-dual icon-lg"></i>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-md-6 col-xl-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                                       Total User
                                    </span>
                                    <h2 class="mb-0">{{ $users }}</h2>
                                </div>

                                <div class="align-self-center">
                                    <i data-feather="users" class="align-self-center icon-dual icon-lg"></i>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-xl-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                                       Total Payments
                                    </span>
                                    <h2 class="mb-0">{{ $payments }}</h2>
                                </div>

                                <div class="align-self-center">
                                    <i data-feather="dollar-sign" class="align-self-center icon-dual icon-lg"></i>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>


       


             

                

               
            </div>

       

        </div>
    </div> <!-- content -->

    

    <!-- Footer Start -->
    @include('user.app.inc.footer')
    <!-- end Footer -->
</div>
@endsection