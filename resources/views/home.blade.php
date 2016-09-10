@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
 <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-6">
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
        <div class="col-md-4 col-sm-4 col-xs-6">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pickups</span>
              <span class="info-box-number">{{$pickup}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
	<div class="col-md-4 col-sm-4 col-xs-6">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-clock"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Average Call Time</span>
              <span class="info-box-number">{{$aveLen}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
</div>
<div class="row"/>	
<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Browser Usage</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="mood" height="160" width="368" style="width: 368px; height: 160px;"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-green"></i> Positive</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> Neutral</li>
		    <li><i class="fa fa-circle-o text-red"></i> Negetive</li>
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">United States of America
                  <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                </li>
                <li><a href="#">China
                  <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
              </ul>
            </div>
            <!-- /.footer -->
          </div>
	</div>
	<div class="row"/> 
	<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Browser Usage</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pickup" height="160" width="368" style="width: 368px; height: 160px;"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-green"></i>Picked Up</li>
                    <li><i class="fa fa-circle-o text-red"></i>No Answer</li>
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">United States of America
                  <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                </li>
                <li><a href="#">China
                  <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
              </ul>
            </div>
            <!-- /.footer -->
          </div>
	</div>
      <!-- /.row -->
         <!-- /.box -->
	<script> var negative = 5/*{{$negative}}*/; var positive = 5/*{{$positive}}*/; var neutral = 3/*{{$neutral}}*/; var pickup=13/*{{$pickup}}*/; var total = 25/*{{$total}}*/; 
	</script>
@endsection
