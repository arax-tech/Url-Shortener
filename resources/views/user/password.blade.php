@extends('user.app.app')

@section('title', 'Update - Passwor')
@section('content')
<div class="content-page">
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                    
                    <h4 class="mb-1 mt-0">Update Password </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                           

                            <form method="post" action="{{ url('/user/password/update/') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" name="current_password" placeholder="Current Password">
                                    </div>

                                </div>
                          

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" name="new_password" placeholder="New Password">
                                    </div>

                                </div>
                                


                                <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">Update Password</button>

                            </form>
                            
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->


        </div> <!-- container-fluid -->

    </div> <!-- content -->

    

   <!-- Footer Start -->
    @include('user.app.inc.footer')
    <!-- end Footer -->

</div>
@endsection