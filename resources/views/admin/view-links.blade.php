@extends('admin.app.app')

@section('title', 'View Branded Links')
@section('content')
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
                                      <th>S#</th>
                                      <th>Orignal Link</th>
                                      <th>Branded Link</th>
                                      <th>Created Date</th>
                                      <th>Expiry Date</th>
                                      <th>Views</th>
                                      <th class="text-center">Status</th>
                                      
                                      <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            
                            
                                <tbody>
                                  @foreach($links as $link)
                                    
                                  
                                  <tr>
                                 
                                    
                                    <td>{{ $link->id }}</td>
                                    <td>{{ mb_strimwidth($link->orignal_link, 0, 40, "...") }}</td>
                                    <td><a target="_blank" href="{{ url($link->short_link) }}">{{$link->short_link}}</a></td>
                                    <td>{{ date('d M Y', strtotime($link->created_at)) }}</td>

                                    <td>{{ date('d M Y', strtotime($link->expiry_date)) }}</td>
                                    
                                    <td>{{ $link->count }}</td>
                                    <td class="verticle-align-middle">
                                      <?php if ($link->status == "Active"): ?>
                                      <span class="badge badge-soft-success py-1">Active</span>
                                      <?php else: ?>
                                      <span class="badge badge-soft-danger py-1">Expired</span>
                                      <?php endif ?>
                                      
                                    </td>
                                    <td class="text-center">
                                      
                                      <a rel="{{ $link->id }}" class="btn btn-danger btn-sm delete_link" href="javascript:">Delete</a>
                                     

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