@extends('layouts.admin')

@section('content')
	<!-- Main content -->
	<section class="content">
	  	<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						{{ Form::model($record,array( "method" => "post", "id"=>"edit_form", "enctype" => "multipart/form-data", 'url' => url('admin').'/'.$slug.'/edit/'.base64_encode($record->id).getUrlParams() )) }}
							<div class="form-group field_container">
								{{ Form::label("first_name","First Name") }}
								{{ Form::text("first_name",null,array("class"=>"form-control","placeholder"=>"First Name", "maxlength" => "55")) }}
								@if($errors->has('title'))
									<span id="title-error" class="error text-danger">{{ $errors->first('title') }}</span>
								@endif
							</div>
							<div class="form-group field_container">
								{{ Form::label("last_name","Last Name") }}
								{{ Form::text("last_name",null,array("class"=>"form-control","placeholder"=>"Last Name", "maxlength" => "55")) }}
								@if($errors->has('title'))
									<span id="title-error" class="error text-danger">{{ $errors->first('title') }}</span>
								@endif
							</div>
							<div class="form-group field_container">
								{{ Form::label("email","Email") }}
								{{ Form::email("email",null,array("class"=>"form-control","placeholder"=>"Email", "maxlength" => "80")) }}
								@if($errors->has('title'))
									<span id="title-error" class="error text-danger">{{ $errors->first('title') }}</span>
								@endif
							</div>
							<div class="form-group field_container">
								{{ Form::label("mobile_number","Mobile Number") }}
								<br/>
								{{ Form::tel("mobile_number",null,array("class"=>"form-control intl_mobile_number numberOnly","placeholder"=>"Mobile Number", "maxlength" => "15")) }}
								{{ Form::hidden("mobile_number",null,array()) }}
								@if($errors->has('title'))
									<span id="title-error" class="error text-danger">{{ $errors->first('title') }}</span>
								@endif
							</div>
							<div class="form-group field_container">
								{{ Form::label("password","Password") }}
								{{ Form::password("password",array("class"=>"form-control","placeholder"=>"Password")) }}
								@if($errors->has('title'))
									<span id="title-error" class="error text-danger">{{ $errors->first('title') }}</span>
								@endif
							</div>
							<div class="form-group field_container">
								{{ Form::label("confirm_password","Confirm Password") }}
								{{ Form::password("confirm_password",array("class"=>"form-control","placeholder"=>"Confirm Password")) }}
								@if($errors->has('title'))
									<span id="title-error" class="error text-danger">{{ $errors->first('title') }}</span>
								@endif
							</div>
							<div class="form-group row field_container">
								<div class="col-md-6">
									{{ Form::label("image","Image") }}
									{{ Form::file("image",array("class"=>"","placeholder"=>"Image", "accept" => "image/*")) }}
									@if($errors->has('title'))
										<span id="title-error" class="error text-danger">{{ $errors->first('title') }}</span>
									@endif
								</div>
								<div class="col-md-6">
									@if($record->image)
										<a href="{{ url('public/uploads/user_images').'/'.$record->image }}" data-lightbox="image-1" data-title="{{ $record->name }}">
											<img src="{{ url('public/uploads/user_images').'/'.$record->image }}" style="width:100px;height:100px;" />
										</a>
									@endif
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
		$("#edit_form").validate({
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
					regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/,
				},
				confirm_password: {
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
				username: {
					required: "The username field is required",
					noSpace: "The username field is required",
					minlength: "The username field must be at least 3 characters long",
					maxlength: "The username field must not exceed 55 characters",
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
					regex: "The password field must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character",
				},
				confirm_password: {
					regex: "The confirm password field must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character",
					equalTo: "Password and Confirm password do not match",
				},
			},
		});
	</script>
	<?php mobileIntlNumberScript(); ?>
@endsection