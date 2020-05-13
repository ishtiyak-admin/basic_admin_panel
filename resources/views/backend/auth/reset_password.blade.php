@extends('layouts.auth_admin')

@section('content')
	<div class="login-box">
		<div class="login-logo">
			<a href="{{ url('admin/login') }}">
				<img src="{{ url('public/uploads/logo.png') }}" style="width:200px;" />
			</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>
			<!-- Session Work Start -->
			@if(Session::has('error'))
				<p class="alert alert-danger">{{ Session::get('error') }}</p>
			@endif
			@if(Session::has('success'))
				<p class="alert alert-success">{{ Session::get('success') }}</p>
			@endif
			<!-- Session Work End -->
			{{ Form::open(array( "method" => "POST", 'url' => "/admin/reset_password/$slug" )) }}
				<div class="form-group has-feedback">
					{{ Form::label("password","Password") }}
					{{ Form::password("password",array("class"=>"form-control","placeholder"=>"Password")) }}
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					@if($errors->has('password'))
						<span class="help-block">
							<strong class="text-danger">{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group has-feedback">
					{{ Form::label("confirm_password","Confirm Password") }}
					{{ Form::password("confirm_password",array("class"=>"form-control","placeholder"=>"Confirm Password")) }}
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					@if($errors->has('confirm_password'))
						<span class="help-block">
							<strong class="text-danger">{{ $errors->first('confirm_password') }}</strong>
						</span>
					@endif
				</div>
				<div class="row">
					<div class="col-xs-8">
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
					</div>
					<!-- /.col -->
				</div>
			{{ Form::close() }}
		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->
@endsection