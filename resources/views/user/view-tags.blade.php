@extends('user.app.app')

@section('title', 'View Tags')
@section('content')
<div class="content-page">
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                    
                    <h4 class="mb-1 mt-0">View Tags </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                           

                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                      <th>S#</th>
                                      <th>Tags</th>
                                      <th>Created Date</th>
                                      <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            
                            
                                <tbody>
                                  <?php $i=1; ?>
                                  @foreach($tags as $tag)
                                    
                                  
                                  <tr>
                                 
                                    
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $tag->tags }}</td>
                                  
                                    <td>{{ date('d M Y', strtotime($tag->created_at)) }}</td>
                                    
                                    <td class="text-center">
                                      
                                      <a rel="{{ $tag->id }}" class="btn btn-danger btn-sm delete_tags" href="javascript:">Delete</a>
                                     

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