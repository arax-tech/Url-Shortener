@extends('user.app.app')

@section('title', 'View - Order')
@section('content')
<div class="content-page">
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                    
                    <h4 class="mb-1 mt-0">Create Branded Links </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                           

                            <form method="post" enctype="multipart/form-data" action="{{ url('/user/create-links') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label">Orignal Link</label>
                                        <input type="text" class="form-control" name="link" placeholder="Orignal Link" required>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label class="col-form-label">Short Link</label>
                                        <input type="text" class="form-control" name="short" placeholder="Short Link" max="8">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-form-label">Tag</label>
                                        <select class="form-control" name="tags">
                                            <option selected disabled value="">Choose Tag</option>
                                            @foreach($tags as $tag)
                                            <option value="{{ $tag->tags}}">{{ $tag->tags}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label class="col-form-label">Expiry Date</label>
                                        <input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" name="expiry_date" placeholder="Expiry Date">
                                    </div>

                                    
                                   
                                </div>




                                <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">Create Branded Link</button>

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