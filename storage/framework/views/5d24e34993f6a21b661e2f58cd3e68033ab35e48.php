<?php $__env->startSection('content'); ?>
	<!-- Main content -->
	<section class="content">
	  	<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						<?php echo e(Form::model($record,array( "method" => "post", "id"=>"edit_form", "enctype" => "multipart/form-data", 'url' => url('admin').'/'.$slug.'/edit/'.base64_encode($record->id).getUrlParams() ))); ?>

							<div class="form-group field_container">
								<?php echo e(Form::label("first_name","First Name")); ?>

								<?php echo e(Form::text("first_name",null,array("class"=>"form-control","placeholder"=>"First Name", "maxlength" => "55"))); ?>

								<?php if($errors->has('title')): ?>
									<span id="title-error" class="error text-danger"><?php echo e($errors->first('title')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group field_container">
								<?php echo e(Form::label("last_name","Last Name")); ?>

								<?php echo e(Form::text("last_name",null,array("class"=>"form-control","placeholder"=>"Last Name", "maxlength" => "55"))); ?>

								<?php if($errors->has('title')): ?>
									<span id="title-error" class="error text-danger"><?php echo e($errors->first('title')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group field_container">
								<?php echo e(Form::label("username","Username")); ?>

								<?php echo e(Form::text("username",null,array("class"=>"form-control","placeholder"=>"Username", "maxlength" => "55"))); ?>

								<?php if($errors->has('title')): ?>
									<span id="title-error" class="error text-danger"><?php echo e($errors->first('title')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group field_container">
								<?php echo e(Form::label("email","Email")); ?>

								<?php echo e(Form::email("email",null,array("class"=>"form-control","placeholder"=>"Email", "maxlength" => "80"))); ?>

								<?php if($errors->has('title')): ?>
									<span id="title-error" class="error text-danger"><?php echo e($errors->first('title')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group field_container">
								<?php echo e(Form::label("mobile_number","Mobile Number")); ?>

								<br/>
								<?php echo e(Form::tel("mobile_number",null,array("class"=>"form-control intl_mobile_number numberOnly","placeholder"=>"Mobile Number", "maxlength" => "15"))); ?>

								<?php echo e(Form::hidden("mobile_number",null,array())); ?>

								<?php if($errors->has('title')): ?>
									<span id="title-error" class="error text-danger"><?php echo e($errors->first('title')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group field_container">
								<?php echo e(Form::label("password","Password")); ?>

								<?php echo e(Form::password("password",array("class"=>"form-control","placeholder"=>"Password"))); ?>

								<?php if($errors->has('title')): ?>
									<span id="title-error" class="error text-danger"><?php echo e($errors->first('title')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group field_container">
								<?php echo e(Form::label("confirm_password","Confirm Password")); ?>

								<?php echo e(Form::password("confirm_password",array("class"=>"form-control","placeholder"=>"Confirm Password"))); ?>

								<?php if($errors->has('title')): ?>
									<span id="title-error" class="error text-danger"><?php echo e($errors->first('title')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group row field_container">
								<div class="col-md-6">
									<?php echo e(Form::label("image","Image")); ?>

									<?php echo e(Form::file("image",array("class"=>"","placeholder"=>"Image", "accept" => "image/*"))); ?>

									<?php if($errors->has('title')): ?>
										<span id="title-error" class="error text-danger"><?php echo e($errors->first('title')); ?></span>
									<?php endif; ?>
								</div>
								<div class="col-md-6">
									<?php if($record->image): ?>
										<a href="<?php echo e(url('public/uploads/user_images').'/'.$record->image); ?>" data-lightbox="image-1" data-title="<?php echo e($record->name); ?>">
											<img src="<?php echo e(url('public/uploads/user_images').'/'.$record->image); ?>" style="width:100px;height:100px;" />
										</a>
									<?php endif; ?>
								</div>
							</div>
							<div class="form-group">
							</div>
							<div class="form-group">
								<a class="btn btn-primary" href="<?php echo e(url('admin').'/'.$slug.getUrlParams()); ?>">Back</a>
								<button class="btn btn-success">Submit</button>
							</div>
						<?php echo e(Form::close()); ?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
				username: {
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
					// required: true,
					// noSpace: true,
					minlength: 6,
					maxlength: 55,
					regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/,
				},
				confirm_password: {
					// required: true,
					// noSpace: true,
					minlength: 6,
					maxlength: 55,
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
					required: "The password field is required",
					noSpace: "The password field is required",
					minlength: "The password field must be at least 3 characters long",
					maxlength: "The password field must not exceed 55 characters",
					regex: "The password field must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character",
				},
				confirm_password: {
					required: "The confirm password field is required",
					noSpace: "The confirm password field is required",
					minlength: "The confirm password field must be at least 3 characters long",
					maxlength: "The confirm password field must not exceed 55 characters",
					regex: "The confirm password field must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character",
					equalTo: "Password and Confirm password do not match",
				},
			},
		});
	</script>
	<?php mobileIntlNumberScript(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/recbreaker/resources/views/backend/users/edit.blade.php ENDPATH**/ ?>