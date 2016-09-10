@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="container">
  <h2>Create a Contact:</h2>
  <form>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="+123456789">
    </div>

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="John Doe">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
	</div>
@endsection
