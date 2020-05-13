@extends('layouts.admin')

@section('content')
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-3">
				<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile">
						@if(!empty(Auth::guard('admins')->user()->image))
							<img src="{{ url('public/uploads/user_images/').'/'.Auth::guard('admins')->user()->image }}" class="profile-user-img img-responsive img-circle" alt="User Image" style="height:100px">
						@else
							<img src="{{ url('public/uploads/dummy_user.png') }}" class="profile-user-img img-responsive img-circle" alt="User Image" style="height:100px">
						@endif
						<h3 class="profile-username text-center">{{ Auth::guard('admins')->user()->name }}</h3>
						<!-- <p class="text-muted text-center">Software Engineer</p> -->
						<ul class="list-group list-group-unbordered">
							<li class="list-group-item">
								<b>Email</b> <a class="pull-right">{{ Auth::guard('admins')->user()->email }}</a>
							</li>
							<li class="list-group-item">
								<b>Mobile Number</b> <a class="pull-right">{{ Auth::guard('admins')->user()->mobile_number }}</a>
							</li>
							<li class="list-group-item">
								<b>Date of Birth</b> <a class="pull-right">{{ Auth::guard('admins')->user()->dob }}</a>
							</li>
							<li class="list-group-item">
								<b>Gender</b> <a class="pull-right">{{ title_case(Auth::guard('admins')->user()->gender) }}</a>
							</li>
						</ul>
					</div>
					<!-- /.box-body -->
				</div>
			<!-- /.box -->
			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<?php
					if(Session::has('password')){
						$pass_active 	=	"active";
						$setting_active =	"";
					}else{
						$pass_active 	=	"";
						$setting_active =	"active";
					}
				?>
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="{{$setting_active}}"><a href="#settings" data-toggle="tab">Settings</a></li>
						<li class="{{$pass_active}}"><a href="#password_update" data-toggle="tab">Change Password</a></li>
					</ul>
					<div class="tab-content">
						<div class="{{$setting_active}} tab-pane" id="settings">
							<!-- <form class="form-horizontal"> -->
							{{ Form::model($record,array("method"=>"post","class"=>"form-horizontal","url"=>url('admin/profile_update'), "enctype"=>"multipart/form-data")) }}
								<div class="form-group">
									{{ Form::label('first_name',"First Name",array("class"=>"col-sm-2 control-label")) }}
									<div class="col-sm-10">
										{{ Form::text("first_name",null,array("placeholder"=>"First Name","class"=>"form-control")) }}
										@if($errors->has('first_name'))
											<span class="help-block">
												<strong class="text-danger">{{ $errors->first('first_name') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('last_name',"Last Name",array("class"=>"col-sm-2 control-label")) }}
									<div class="col-sm-10">
										{{ Form::text("last_name",null,array("placeholder"=>"Last Name","class"=>"form-control")) }}
										@if($errors->has('last_name'))
											<span class="help-block">
												<strong class="text-danger">{{ $errors->first('last_name') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('mobile_number',"Mobile Number",array("class"=>"col-sm-2 control-label")) }}
									<div class="col-sm-10">
										{{ Form::text("mobile_number",null,array("placeholder"=>"Mobile Number","class"=>"form-control intl_mobile_number")) }}
										@if($errors->has('mobile_number'))
											<span class="help-block">
												<strong class="text-danger">{{ $errors->first('mobile_number') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('email',"Email",array("class"=>"col-sm-2 control-label")) }}
									<div class="col-sm-10">
										{{ Form::email("email",null,array("placeholder"=>"Email","class"=>"form-control", "readonly" => "readonly")) }}
										@if($errors->has('email'))
											<span class="help-block">
												<strong class="text-danger">{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('date_of_birth',"Date of Birth",array("class"=>"col-sm-2 control-label")) }}
									<div class="col-sm-10">
										{{ Form::text("date_of_birth",old("date_of_birth",$record->dob),array("placeholder"=>"Date of Birth","class"=>"form-control datepicker", "readonly" => "readonly")) }}
										@if($errors->has('date_of_birth'))
											<span class="help-block">
												<strong class="text-danger">{{ $errors->first('date_of_birth') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('',"Gender",array("class"=>"col-sm-2 control-label")) }}
									<div class="col-sm-10">
										{{ Form::radio('gender', 'male' , null, array("id" => "male")) }} 
										{{ Form::label('male',"Male") }} 
										{{ Form::radio('gender', 'female' , null, array("id" => "female")) }} 
										{{ Form::label('female',"Female") }}
										@if($errors->has('date_of_birth'))
											<span class="help-block">
												<strong class="text-danger">{{ $errors->first('date_of_birth') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('image',"Image",array("class"=>"col-sm-2 control-label")) }}
									<div class="col-sm-10">
										{{ Form::file("image",null,array("placeholder"=>"Email","class"=>"form-control", "accept" => "image/*")) }}
										@if($errors->has('image'))
											<span class="help-block">
												<strong class="text-danger">{{ $errors->first('image') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success">Submit</button>
									</div>
								</div>
							{{ Form::close() }}
							<!-- </form> -->
						</div>
						<!-- /.tab-pane -->
						<div class="{{$pass_active}} tab-pane" id="password_update">
							<!-- <form class="form-horizontal"> -->
							{{ Form::open(array("method"=>"post","class"=>"form-horizontal","url"=>url('admin/change_password'), "enctype"=>"multipart/form-data")) }}
								<div class="form-group">
									{{ Form::label('old_password',"Old Password",array("class"=>"col-sm-2 control-label")) }}
									<div class="col-sm-10">
										{{ Form::password("old_password",array("placeholder"=>"Old Password","class"=>"form-control")) }}
										@if($errors->has('old_password'))
											<span class="help-block">
												<strong class="text-danger">{{ $errors->first('old_password') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('new_password',"New Password",array("class"=>"col-sm-2 control-label")) }}
									<div class="col-sm-10">
										{{ Form::password("new_password",array("placeholder"=>"New Password","class"=>"form-control")) }}
										@if($errors->has('new_password'))
											<span class="help-block">
												<strong class="text-danger">{{ $errors->first('new_password') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('confirm_password',"Confirm Password",array("class"=>"col-sm-2 control-label")) }}
									<div class="col-sm-10">
										{{ Form::password("confirm_password",array("placeholder"=>"Confirm Password","class"=>"form-control")) }}
										@if($errors->has('confirm_password'))
											<span class="help-block">
												<strong class="text-danger">{{ $errors->first('confirm_password') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success">Submit</button>
									</div>
								</div>
							{{ Form::close() }}
							<!-- </form> -->
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

@endsection

@section('scripts')
	<?php mobileIntlNumberScript(); ?>
@endsection