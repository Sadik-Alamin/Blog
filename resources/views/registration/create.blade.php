@extends('master')

@section('content')
	<div class="col-sm-8">
		<h1>Register</h1>
		<form method="POST" method="/register">
			  {{ csrf_field() }}
			  <div class="form-group">
			    <label for="title">Name:</label>
			    <input type="text" class="form-control" id="title" name="name" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
			  </div>
			  <div class="form-group">
			    <label for="password_confirmation">Password</label>
			    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Register</button>

			  <div class="form-group">
			  	@include('layouts.errors')
			  </div>
		</form>
	</div>
@endsection