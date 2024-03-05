@extends('admin.app.app')

@section('title', 'View Users')
@section('content')
<div class="content-page">
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                    
                    <h4 class="mb-1 mt-0">View Users </h4>
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
                                      <th>User Name</th>
                                      <th>User Email</th>
                                      <th>Register At</th>
                                      <th class="text-center">Payment Status</th>
                                      <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            
                            
                                <tbody>
                                  @foreach($users as $user)
                                
                                    
                                  
                                  <tr>
                                 
                                    
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ date('d M Y', strtotime($user->created_at)) }}</td>

                                    <td class="text-center verticle-align-middle">
                                      <?php if ($user->status == "Active"): ?>
                                      <span class="badge badge-soft-success py-1">Active</span>
                                      <?php else: ?>
                                      <span class="badge badge-soft-danger py-1">Expired</span>
                                      <?php endif ?>
                                      
                                    </td>
                                    <td class="text-center">
                                      
                                      <a rel="{{ $user->id }}" class="btn btn-danger btn-sm del_user" href="javascript:">Delete</a>
                                     

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