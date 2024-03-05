@extends('user.app.app')

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
                           

                            <table id="basic-datatable" class="table dt-responsive nowrap table-responsive">
                                <thead>
                                    <tr>
                                      <th>S#</th>
                                      <th>Orignal Link</th>
                                      <th>Branded Link</th>
                                      <th>Created Date</th>
                                      <th>Expiry Date</th>
                                      <th>Tags</th>
                                      <th>Views</th>
                                      <th class="text-center">Status</th>
                                      
                                      <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            
                            
                                <tbody>
                                  <?php $i=1; ?>
                                  @foreach($links as $link)
                                    
                                  
                                  <tr>
                                 
                                    
                                    <td>{{ $i++ }}</td>
                                    <td>{{ mb_strimwidth($link->orignal_link, 0, 30, "...") }}</td>
                                    <td>
                                      <span style="display: none;" id="p{{$link->id}}">{{ url($link->short_link) }}</span>
                                      <a target="_blank" href="{{ url($link->short_link) }}">{{ mb_strimwidth($link->short_link, 0, 10, "...") }}</a>

                                      <button class="float-right bg-transparent border-0"  onclick="copyToClipboard('#p{{$link->id}}')">
                                        <i data-feather="copy" class="icon-dual icon-xs mr-2 float-right"></i>
                                      </button>
                                      @section('script')
                                      <script type="text/javascript">
                                          function copyToClipboard(element)
                                          {
                                              var $temp = $("<input>");
                                              $("body").append($temp);
                                              $temp.val($(element).text()).select();
                                              document.execCommand("copy");
                                              $temp.remove();
                                              swal({
                                                title: "Data Copy to Clipboard!",
                                                text: "",
                                                icon: "success",
                                              });
                                          }
                                      </script>
                                      @endsection
                             
                                    </td>
                                    <td>{{ date('d M Y', strtotime($link->created_at)) }}</td>

                                    <?php if (!empty($link->expiry_date)): ?>
                                      <td>{{ date('d M Y', strtotime($link->expiry_date)) }}</td>
                                    <?php else: ?>
                                      <td>Null</td>
                                    <?php endif ?>
                                    
                                    <td>{{ $link->tags }}</td>
                                    <td>{{ $link->count }}</td>
                                    <td class="verticle-align-middle">
                                      <?php if ($link->status == "Active"): ?>
                                      <span class="badge badge-soft-success py-1">Active</span>
                                      <?php else: ?>
                                      <span class="badge badge-soft-danger py-1">Expired</span>
                                      <?php endif ?>
                                      
                                    </td>
                                    <td class="text-center">
                                      <div class="btn-group">
                                        
                                        <a rel="{{ $link->id }}" class="btn btn-danger btn-sm delete_link" href="javascript:">Delete</a>
                                        <a href="{{ url('user/trace-link/'.$link->short_link) }}" class="btn btn-primary btn-sm ">Trace</a>
                                      </div>
                                     

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

