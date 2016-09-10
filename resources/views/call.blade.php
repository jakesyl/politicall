@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('main-content')

<div class="row">
	<div class="col-md-6">
		<!-- small box -->
		<!-- /.info-box -->
		          <div class="info-box bg-aqua">
		            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Call Duration</span>
		              <span class="info-box-number">{{$call->duration}}</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: {{($callDurationSeconds/$averageLength) * 100}}"></div>
		              </div>
		                  <span class="progress-description">
		                    {{($callDurationSeconds/$averageLength) * 100 }}% of the average length of a call (average length={{gmdate("i:s", $averageLength)}})
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
	</div>
	<!-- ./col -->


	@if($call->opinion=="Positive")
	<!-- ./col -->
	<div class="col-md-6">
           <div class="info-box">
             <span class="info-box-icon bg-green"><i class="fa fa-thumbs-o-up"></i></span>

             <div class="info-box-content">
               <span class="info-box-text">Reaction</span>
               <span class="info-box-number">Positive</span>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <!-- /.col -->
		 <!-- ./col -->
	 </div>

	 @elseif($call->opinion=="Neutral")
	 <!-- ./col -->
 	<div class="col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fa fa-stop"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Reaction</span>
                <span class="info-box-number">Neutral</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
 		 <!-- ./col -->
 	 </div>
 @elseif($call->opinion=="Negative")
	 <!-- ./col -->
 	<div class="col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Reaction</span>
                <span class="info-box-number">Negative</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
 		 <!-- ./col -->
 	 </div>
@else
<!-- ./col -->
<div class="col-md-6">
				 <div class="info-box">
					 <span class="info-box-icon bg-yellow"><i class="fa fa-stop"></i></span>

					 <div class="info-box-content">
						 <span class="info-box-text">Reaction</span>
						 <span class="info-box-number">Neutral</span>
					 </div>
					 <!-- /.info-box-content -->
				 </div>
				 <!-- /.info-box -->
			 </div>
			 <!-- /.col -->
	<!-- ./col -->
</div>
@endif

	<div class="row">
		<div class="col-md-12">
			<!-- The time line -->
		<ul class="timeline">

		    <!-- timeline time label -->
		    <li class="time-label">
		        <span class="bg-red">
							{{date_format(new DateTime($call->created_at), "d M. Y g:i A")}}
		        </span>
		    </li>
		    <!-- /.timeline-label -->

		    <!-- timeline item -->
		    <li>
		        <!-- timeline icon -->
		        <i class="fa fa-phone bg-blue"></i>
		        <div class="timeline-item">
		            <span class="time"><i class="fa fa-clock-o"></i>{{date_format(new DateTime($call->created_at), "g:i A")}}</span>

		            <h3 class="timeline-header"><a href="#">Outgoing Call</a></h3>

		            <div class="timeline-body">
										{{$volunteer->name or ''}} calls @if($call->name != '') {{$call->name}} at @endif {{$call->phone}}
		            </div>

		            <div class="timeline-footer">
		            </div>
		        </div>
		    </li>

				<!-- timeline item -->
				<li>
						<!-- timeline icon -->
						@if(!($call->pickup))
						<i class="fa fa-phone bg-red"></i>
						<div class="timeline-item">
								<span class="time"><i class="fa fa-clock-o"></i>{{date_format(new DateTime($call->created_at), "g:i A")}}</span>

								<h3 class="timeline-header"><a href="#">Reject Call</a></h3>

								<div class="timeline-body">
										@if($call->name != '') {{$call->name}}  @else {{$call->phone}} @endif doesn't pick up.
								</div>

								<div class="timeline-footer">
								</div>
						</div>
				</li>
				<li>
								 <i class="fa fa-clock-o bg-gray"></i>
				</li>
				@else
				<!-- timeline item -->
				<li>
						<!-- timeline icon -->
						<i class="fa fa-volume-control-phone bg-aqua"></i>
						<div class="timeline-item">
								<span class="time"><i class="fa fa-clock-o"></i>{{date_format(new DateTime($call->created_at), "g:i A")}}</span>

								<h3 class="timeline-header"><a href="#">Pickup Call</a></h3>

								<div class="timeline-body">
									@if($call->name != '') {{$call->name}}  @else {{$call->phone}} @endif pick's up.
								</div>

								<div class="timeline-footer">
								</div>
						</div>
				</li>
				<!-- timeline item -->
				<li>
						<!-- timeline icon -->
						<i class="fa fa-bullhorn bg-yellow"></i>
						<div class="timeline-item">
								<span class="time"><i class="fa fa-clock-o"></i>{{date_format($afterCall, "g:i A")}}</span>

								<h3 class="timeline-header"><a href="#">Conversation</a></h3>

								<div class="timeline-body">
										Call lasted for {{$call->duration}}  and ends at {{date_format($afterCall, "g:i A")}}
								</div>

								<div class="timeline-footer">
								</div>
						</div>
				</li>
				<!-- timeline item -->
				<li>
						<!-- timeline icon -->
						<i class="fa fa-check-square-o bg-purple"></i>
						<div class="timeline-item">
								<span class="time"><i class="fa fa-clock-o"></i>{{date_format($afterCall, "g:i A")}}</span>

								<h3 class="timeline-header"><a href="#">Survey</a></h3>

								<div class="timeline-body">
											User completes the survey about the call.  @if($call->name != '') {{$call->name}}  @else {{$call->phone}} @endif 's opinion was {{$call->opinion}}.
								</div>

								<div class="timeline-footer">
								</div>
						</div>
				</li>
				<li>
								 <i class="fa fa-clock-o bg-gray"></i>
				</li>
			</div>
		</div>
		@endif
@endsection
