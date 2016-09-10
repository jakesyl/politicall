@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
 <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-telephone-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Calls</span>
              <span class="info-box-number">{{$total}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-volume-control-phone"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pickups</span>
              <span class="info-box-number">{{$pickup}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
				<div class="col-md-3 col-sm-3 col-xs-6">
						          <div class="info-box">
						            <span class="info-box-icon bg-red"><i class="ion ion-heart"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">Volunteers</span>
						              <span class="info-box-number">{{count($volunteerCount)}}</span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
					</div>
	<div class="col-md-3 col-sm-3 col-xs-6">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-clock"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Average Call Time</span>
              <span class="info-box-number">{{gmdate("i:s", $aveLen)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
			</div>
			<!-- /.row -->

<div class="row">
<div class ="col-md-12">
	<div class="col-md-6">

<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">User Opinion</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
							<div class="row">
                  <div class="chart-responsive">
                    	<canvas id="mood" height="160" width="368" style="width: 368px; height: 160px; align:center;"></canvas>
                  <!-- ./chart-responsive -->
                </div>
							</div>
                <!-- /.col -->
								<div class="row">
                <div class="col-md-6">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-green"></i> Positive</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> Neutral</li>
		    					<li><i class="fa fa-circle-o text-red"></i> Negative</li>
                  </ul>
                <!-- /.col -->
              </div>
						</div>
              <!-- /.row -->
            </div>

          </div>
				</div>
				<div class="col-md-6">

	<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Picked Up</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
								<div class="row">
	                  <div class="chart-responsive">
	                    <canvas id="pickup" height="160" width="368" style="width: 368px; height: 160px; align:center;"></canvas>
	                  </div>
	                  <!-- ./chart-responsive -->
	                </div>
								<div class="row">
	                <!-- /.col -->
	                <div class="col-md-6">
	                  <ul class="chart-legend clearfix">
	                    <li><i class="fa fa-circle-o text-green"></i> Pick Up</li>
	                    <li><i class="fa fa-circle-o text-red"></i> No Answer</li>
											<li><i class="fa fa-circle-o text-black"></i> No Data</li>


	                  </ul>
	                </div>
								</div>
                <!-- /.col -->
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
</div>
            <!-- /.footer -->
	</div>
</div>
</div>
      <!-- /.row -->
         <!-- /.box -->
	<script> var negative = {{$negative}}; var positive = {{$positive}}; var neutral = {{$neutral}}; var pickup={{$pickup}}; var total = {{$total}};
	</script>
@endsection
