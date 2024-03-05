@extends('user.app.app')

@section('title', 'View - Order')
@section('content')
<div class="content-page">
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                    
                    <h4 class="mb-1 mt-0">Create Tag </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                           

                            <form method="post" enctype="multipart/form-data" action="{{ url('/user/create-tag') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="col-form-label">Tag</label>
                                        <input type="text" class="form-control" name="tag" placeholder="Tag" required>
                                    </div>



                                    
                                   
                                </div>




                                <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">Create Tag</button>

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