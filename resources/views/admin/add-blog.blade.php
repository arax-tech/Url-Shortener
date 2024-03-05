@extends('admin.app.app')

@section('title', 'Add Blog')
@section('content')
<div class="content-page">
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                    
                    <h4 class="mb-1 mt-0">Add Blog </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                           

                            <form method="post" enctype="multipart/form-data" action="{{ url('/admin/add-blog') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label">Author Name</label>
                                        <input type="text" class="form-control" name="author" placeholder="Author Name" required>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label class="col-form-label">Blog Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Blog Title" required>
                                    </div>

                                    
                                   
                                </div>



                                <div class="form-row">
                                  


                                    <div class="form-group col-md-12">
                                        <label class="col-form-label">Blog Description</label>
                                        <textarea class="form-control" rows="6" required  placeholder="Blog Description" id="content" name="content"></textarea>
                                    </div>

                                    
                                   
                                </div>


                                 <div class="form-row">
                                    
                                    <input type="hidden" name="currnt_img"  value="{{ Auth::User()->image }}" >
                                    <div class="form-group col-md-12">
                                        <label class="col-form-label">Blog Image</label>
                                        <div class="input-group mb-3">
                                          <div class="custom-file">
                                            <input type="file" required class="custom-file-input" name="image">
                                            <label class="custom-file-label">Choose file</label>
                                          </div>
                                        </div>
                                    </div>
                                    
                                </div>



                                <button type="submit" class="btn btn-primary waves-effect waves-light btn-block">Update Profile</button>

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