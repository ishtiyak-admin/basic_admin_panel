@extends('layouts.admin')

@section('content')
	<!-- Main content -->
	<section class="content">
	  	<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						{{ Form::open(array( "method" => "post", "id"=>"add_form", "enctype" => "multipart/form-data", 'url' => url('admin').'/'.$slug.'/create'.getUrlParams() )) }}
							<div class="form-group field_container">
								{{ Form::label("first_name","First Name") }}
								{{ Form::text("first_name",null,array("class"=>"form-control","placeholder"=>"First Name", "maxlength" => "55")) }}
								@if($errors->has('first_name'))
									<span id="first_name-error" class="error text-danger">{{ $errors->first('first_name') }}</span>
								@endif
							</div>
							<div class="form-group field_container">
								{{ Form::label("last_name","Last Name") }}
								{{ Form::text("last_name",null,array("class"=>"form-control","placeholder"=>"Last Name", "maxlength" => "55")) }}
								@if($errors->has('last_name'))
									<span id="last_name-error" class="error text-danger">{{ $errors->first('last_name') }}</span>
								@endif
							</div>
							<div class="form-group field_container">
								{{ Form::label("email","Email") }}
								{{ Form::email("email",null,array("class"=>"form-control","placeholder"=>"Email", "maxlength" => "80")) }}
								@if($errors->has('email'))
									<span id="email-error" class="error text-danger">{{ $errors->first('email') }}</span>
								@endif
							</div>
							<div class="form-group field_container">
								{{ Form::label("mobile_number","Mobile Number") }}
								<br/>
								{{ Form::tel("mobile_number",null,array("class"=>"form-control intl_mobile_number numberOnly","placeholder"=>"Mobile Number", "maxlength" => "15")) }}
								@if($errors->has('mobile_number'))
									<span id="mobile_number-error" class="error text-danger">{{ $errors->first('mobile_number') }}</span>
								@endif
							</div>
							<div class="form-group field_container">
								{{ Form::label("password","Password") }}
								{{ Form::password("password",array("class"=>"form-control","placeholder"=>"Password","id"=>"password")) }}
								@if($errors->has('password'))
									<span id="password-error" class="error text-danger">{{ $errors->first('password') }}</span>
								@endif
							</div>
							<div class="form-group field_container">
								{{ Form::label("confirm_password","Confirm Password") }}
								{{ Form::password("confirm_password",array("class"=>"form-control","placeholder"=>"Confirm Password")) }}
								@if($errors->has('confirm_password'))
									<span id="confirm_password-error" class="error text-danger">{{ $errors->first('confirm_password') }}</span>
								@endif
							</div>
							<div class="form-group row field_container">
								<div class="col-md-6">
									{{ Form::label("image","Image") }}
									{{ Form::file("image",array("class"=>"","placeholder"=>"Image", "accept" => "image/*")) }}
									@if($errors->has('image'))
										<span id="image-error" class="error text-danger">{{ $errors->first('image') }}</span>
									@endif
								</div>
								<div class="col-md-6">
								</div>
							</div>
							<div class="form-group">
							</div>
							<div class="form-group">
								<a class="btn btn-primary" href="{{ url('admin').'/'.$slug.getUrlParams() }}">Back</a>
								<button class="btn btn-success">Submit</button>
							</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
@endsection

@section('scripts')
	<script>
		$(document).ready(function(){ CKEDITOR.replace("ckeditor"); });
		
		$("#add_form").validate({
			ignore: [],
			rules: {
				first_name: {
					required: true,
					noSpace: true,
					minlength: 3,
					maxlength: 55,
				},
				last_name: {
					required: true,
					noSpace: true,
					minlength: 3,
					maxlength: 55,
				},
				email: {
					required: true,
					noSpace: true,
					email: true,
					regex: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,
					minlength: 3,
					maxlength: 80,
				},
				mobile_number: {
					required: true,
					noSpace: true,
					number: true,
					minlength: 7,
					maxlength: 20,
				},
				password: {
					required: true,
					noSpace: true,
					regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/,
				},
				confirm_password: {
					required: true,
					noSpace: true,
					regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/,
					equalTo: "#password"
				},
			},
			messages: {
				first_name: {
					required: "The first name field is required",
					noSpace: "The first name field is required",
					minlength: "The first name field must be at least 3 characters long",
					maxlength: "The first name field must not exceed 55 characters",
				},
				last_name: {
					required: "The last name field is required",
					noSpace: "The last name field is required",
					minlength: "The last name field must be at least 3 characters long",
					maxlength: "The last name field must not exceed 55 characters",
				},
				email: {
					required: "The email field is required",
					noSpace: "The email field is required",
					email: "The email field is invalid",
					regex: "The email field is invalid",
					minlength: "The email field must be at least 3 characters long",
					maxlength: "The email field must not exceed 55 characters",
				},
				mobile_number: {
					required: "The mobile number field is required",
					noSpace: "The mobile number field is required",
					number: "The mobile number field is invalid",
					minlength: "The mobile number field must be at least 3 characters long",
					maxlength: "The mobile number field must not exceed 55 characters",
				},
				password: {
					required: "The password field is required",
					noSpace: "The password field is required",
					regex: "The password field must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character",
				},
				confirm_password: {
					required: "The confirm password field is required",
					noSpace: "The confirm password field is required",
					regex: "The confirm password field must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character",
					equalTo: "Password and Confirm password do not match",
				},
			},
		});
		
	</script>
	<?php mobileIntlNumberScript(); ?>
@endsection