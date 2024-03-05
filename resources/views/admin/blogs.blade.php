@extends('admin.app.app')

@section('title', 'View Branded Links')
@section('content')
<style type="text/css">
  td{vertical-align: middle !important;}
</style>
<div class="content-page">
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                    
                    <h4 class="mb-1 mt-0">View Branded Links </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                           

                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                      <th style="width: 10%;">Image</th>
                                      <th>Author</th>
                                      <th>Title</th>
                                      <th>Description</th>
                                      <th>Created</th>
                                      <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            
                            
                                <tbody>
                                  @foreach($blogs as $blog)                                   
                                  
                                  <tr>
                                 
                                    
                                    <td><img class="img-thumbnail" style="width: 60%;" src="{{ asset('/back_end/uploads/blogs/'.$blog->image) }}"></td>
                                    <td>{{ $blog->author }}</td>
                                    <td>{{ mb_strimwidth($blog->title, 0, 20, "...") }}</td>
                                    <td>{!! mb_strimwidth($blog->description, 0, 50, "...") !!}</td>
                                    <td>{{ date('d M Y', strtotime($blog->created_at)) }}</td>

                                    <td class="text-center">
                                      
                                      <a rel="{{ $blog->id }}" class="btn btn-danger btn-sm delete_blog" href="javascript:">Delete</a>
                                     

                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>

                            </table>

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