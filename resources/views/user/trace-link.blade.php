@extends('user.app.app')

@section('title', 'Trace Link')
@section('content')
<div class="content-page">
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-fluid">
          <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <canvas id="myChart"></canvas>
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
@section('charts')
<script id="rendered-js">
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
  labels: ["India", "Pakistan", "China", "Afghanistan", "Iran", "Nepal", "USA"],
  datasets: [{
  label: 'Visters',
  data: [<?php echo $in; ?>, <?php echo $pk; ?>, 0, 0, 0, 0, 0],
  backgroundColor: "#31353d" }] } });
</script>
@endsection