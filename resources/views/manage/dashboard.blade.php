@extends('layouts.manage')

@section('title', '&mdash; Dashboard')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">

@endsection

@section('content')
	<div class="container mt-5" id="force-left">
		{{-- <div class="row"> --}}
			<h3>Inventory</h3>
			<p class="lead">Media count <blockquote class="blockquote">{{$media}}</blockquote></p>
			<p class="lead">Album count <blockquote class="blockquote">{{$albums}}</blockquote></p>
		{{-- </div>	 --}}
	<hr>
		{{-- <div class="row"> --}}
			<div class="col offset">
				<form action="{{ route('manage.update') }}" class="form" method="POST">	
					{!! csrf_field() !!}
					<h2>Edit your details</h2>
					<div class="alert alert-danger" id="error_msg" style="display: none">	
					</div>
					@if (Session::has('form-errors'))

						<div class="alert alert-success mt-5" role="alert">
							<strong>Error:</strong> {{ Session::get('form-errors')}}
						</div>

					@endif
					<div class="alert alert-success" style="display: none"></div>
					<div class="form-group row">
						<label for="password">Current Password:</label>
						<input type="password" placeholder="Current Password" name="password" class="form-control">
					</div>
					
					<div class="form-group row">
						<label for="username">Name: </label>
						<input type="text" placeholder="name" name="username" class="form-control" value="{{Auth::user()->name}}" required>
					</div>
					<div class="form-group row">
						<label for="email">Email:</label>
						<input type="email" placeholder="Email" name="email" value="{{Auth::user()->email}}" class="form-control" required>
					</div>
					<div class="form-group row">
						<label for="password">New Password:</label>
						<input type="password" placeholder="New Password" name="password1" class="form-control">
					</div>

					<div class="form-group row">
						<label for="password2">Confirm Password:</label>
						<input type="password" placeholder="Confirm Password" name="password2" class="form-control">
					</div>
					
					<input type="submit" value="Save Changes" class="btn btn-success btn-h1-spacing">
				</form>
			</div>
			
		{{-- </div> --}}
	</div>
@endsection



@section('scripts')

	<script>
		var current = document.querySelectorAll('input[type="password"]')[0];
		var p_field = document.querySelectorAll('input[type="password"]')[1];
		var c_pfield = document.querySelectorAll('input[type="password"')[2];
		var error = '';

		function validateForm(){
			// or always fill password - old password
			// check if new password field is filled,
			// make sure confirm is also field
			// then check for regex

			// first check if current password field is field
			if(current.value == '' || current.value.length == 0){
				$('div.alert#error_msg').css('display','block').html('Please provide the current password');
				return false;
			} 

			// make sure new email is indeed an email
			// on second thought leave to html5 and check with php in backend.

			// check if new password field is filled
			if(p_field.value && p_field.value.length !== 0){
				// check for confirm password 
				if(p_field.value !== c_pfield.value){
					// mew password and confirm new password dont match
					$('div.alert#error_msg').css("display", "block").html("Password doesn't match");
					return false;
				}
				// validate
				if(!checkPassword(p_field)){
					// validation failed, supply help text
					$('div.alert#error_msg').css("display", "block").html("Password must be between 6 to 20 characters long and contain at least one numeric digit one uppercase and one lowercase letter!");
					return false;
				}
			}

			// catch all
			//$('div.alert#error_msg').css('display','block').html('Some arbitrary error');

			return true;
		}

		function checkPassword(inputtxt){
			var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/; 
			// brw 6 to 20 xters
			// contains at least one numeric digit one uppercase and one lowerxase
			if(inputtxt.value.match(passw)){
				return true;
			}

			return false;
		}


		$('form').on('submit', function(){
			return validateForm();
		})
	</script>
@endsection