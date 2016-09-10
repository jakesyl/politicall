@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Contacts</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="phone" class="col-sm-2 control-label">Phone Numbers</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="123456789">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info center">Add Contacts</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
@endsection
