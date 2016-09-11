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
             <h3 class="box-title">Contacts</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="calls" class="table table-bordered table-hover">
               <thead>
               <tr>
                 <th>Phone Number</th>
                 <th>Name</th>
								 <th>Opinion</th>
               </tr>
               </thead>
               <tbody>
							<?php $c=0;?>
							@foreach($contacts as $contact)
               <tr>
                 <td>{{$contact->phone}}</td>
								 <td>{{$names[$c]}}</td>
						     <td>
									 @if($opinions[$c] == "Neutral")
									 		 <span class="label label-warning">
									 		@elseif($opinions[$c] == "Positive")
									 		 <span class="label label-success">
									 		@elseif($opinions[$c] == "Negative")
									 		<span class="label label-danger">
									 	 @else
									 	 <span class="label label-warning">
									 		 @endif
									 	{{ucfirst($opinions[$c])}}

								 </td>
               </tr>
							 <?php $c++;?>
						@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
