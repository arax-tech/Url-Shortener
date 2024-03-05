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
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Message</th>
                                      <th>Contact Date</th>
                                      <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            
                            
                                <tbody>
                                  @foreach($contacts as $contact)
                                
                                    
                                  
                                  <tr>
                                 
                                    
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>{{ date('d M Y', strtotime($contact->created_at)) }}</td>

                                    
                                    <td class="text-center">
                                      
                                      <a rel="{{ $contact->id }}" class="btn btn-danger btn-sm del_contact" href="javascript:">Delete</a>
                                     

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