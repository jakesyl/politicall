@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

<!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-xs-12">
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Calls</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="calls" class="table table-bordered table-hover">
               <thead>
               <tr>
                 <th>Volunteer</th>
                 <th>Target Phone Number</th>
		 <th>Target Name</th>
                 <th>Reaction</th>
               </tr>
               </thead>
               <tbody>
							@foreach($calls as $call)
               <tr>
                 <td><a href="/call/{{$call->id}}">@if(isset($volunteers[$call->callerId])) {{$volunteers[$call->callerId] }} @else No Name  @endif</a></td>
                 <td><a href="/call/{{$call->id}}">{{$call->phone}}</a></td>
		 <td><a href="/call/{{$call->id}}">{{$call->name}}</a></td>

								 <td>@if($call->opinion == "Neutral")
									 		<span class="label label-warning">
										 @elseif($call->opinion == "Positive")
										 	<span class="label label-success">
										 @elseif($call->opinion == "Negative")
										 <span class="label label-danger">
										@else
										<span class="label label-warning">
											@endif
									 {{ucfirst($call->opinion)}}
								 </span>
								 </td>
               </tr>
						@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>


	 </script>
@endsection
