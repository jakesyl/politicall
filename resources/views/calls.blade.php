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
             <h3 class="box-title">Hover Data Table</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="calls" class="table table-bordered table-hover">
               <thead>
               <tr>
                 <th>Rendering engine</th>
                 <th>Browser</th>
                 <th>Platform(s)</th>
                 <th>Engine version</th>
                 <th>CSS grade</th>
               </tr>
               </thead>
               <tbody>
               <tr>
                 <td>Trident</td>
                 <td>Internet
                   Explorer 4.0
                 </td>
                 <td>Win 95+</td>
                 <td> 4</td>
                 <td>X</td>
               </tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	

	 </script>
@endsection
