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
                                      <th>Amount</th>
                                      <th>PaymentId</th>
                                      <th>OrderId</th>
                                      <th>Pay Date</th>
                                      <th class="text-center">Payment Status</th>
                                      <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            
                            
                                <tbody>
                                  @foreach($payments as $payment)
                                
                                    
                                  
                                  <tr>
                                 
                                    
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ $payment->user_id }}</td>
                                    <td>₹ {{ $payment->amount }}</td>
                                    <td>{{ $payment->rzp_paymentid }}</td>
                                    <td>{{ $payment->rzp_orderid }}</td>
                                    <td>{{ date('d M Y', strtotime($payment->created_at)) }}</td>

                                    <td class="text-center verticle-align-middle">
                                      <?php if ($payment->status == "Complete"): ?>
                                      <span class="badge badge-soft-success py-1">Complete</span>
                                      <?php else: ?>
                                      <span class="badge badge-soft-danger py-1">InComplete</span>
                                      <?php endif ?>
                                      
                                    </td>
                                    <td class="text-center">
                                      
                                      <a rel="{{ $payment->id }}" class="btn btn-danger btn-sm del_pay" href="javascript:">Delete</a>
                                     

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