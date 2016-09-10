@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('main-content')

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
								Call lasts for {{$call->duration}} minutes and ends at {{date_format($afterCall, "g:i A")}}
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
									User completes the survey about the call. The users opinion was {{$call->opinion}}.
						</div>

						<div class="timeline-footer">
						</div>
				</div>
		</li>
		<li>
						 <i class="fa fa-clock-o bg-gray"></i>
		</li>
		@endif
@endsection
