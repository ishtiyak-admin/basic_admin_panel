<?php $__env->startSection('content'); ?>
	<div class="login-box">
		<div class="login-logo">
			<a href="<?php echo e(url('admin/login')); ?>">
				<img src="<?php echo e(url('public/uploads/logo.png')); ?>" style="width:200px;" />
				<!-- <b><?php echo e((getSettings('site-title'))? getSettings('site-title') : env("APP_NAME", "Laravel")); ?></b> -->
			</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>
			<!-- Session Work Start -->
			<?php if(Session::has('error')): ?>
				<p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
			<?php endif; ?>
			<?php if(Session::has('success')): ?>
				<p class="alert alert-success"><?php echo e(Session::get('success')); ?></p>
			<?php endif; ?>
			<!-- Session Work End -->

			<?php echo e(Form::open(array( "method" => "POST", 'url' => "/admin/login" ))); ?>

				<div class="form-group has-feedback">
					<?php echo e(Form::label("email","Email")); ?>

					<?php echo e(Form::email("email",null,array("class"=>"form-control","placeholder"=>"Email"))); ?>

					<?php /* {{ Form::email("email",(Cookie::get('rememberedAdmin-email'))? Cookie::get('rememberedAdmin-email') : null,array("class"=>"form-control","placeholder"=>"Email")) }} */ ?>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					<?php if($errors->has('email')): ?>
						<span class="help-block">
							<strong class="text-danger"><?php echo e($errors->first('email')); ?></strong>
						</span>
					<?php endif; ?>
				</div>
				<div class="form-group has-feedback">
					<?php echo e(Form::label("password","Password")); ?>

					<input type="password" name="password" id="password" class="form-control" value="" placeholder="Password">
					<?php /* <input type="password" name="password" id="password" class="form-control" value="{!! Cookie::get('rememberedAdmin-password') !!}" placeholder="Password"> */ ?>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					<?php if($errors->has('password')): ?>
						<span class="help-block">
							<strong class="text-danger"><?php echo e($errors->first('password')); ?></strong>
						</span>
					<?php endif; ?>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<?php /*
						<div class="checkbox icheck">
							<label>
								<input type="checkbox" name="remember" id="remember" class="form-control" {{ (Cookie::get('rememberedAdmin-remember_me'))? "checked" : ""  }}>
								Remember Me
							</label>
						</div>
						*/ ?>
						<a href="<?php echo e(url('admin/forgot_password')); ?>">I forgot my password</a><br>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			<?php echo e(Form::close()); ?>

			<!-- <a href="<?php echo e(url('admin/forgot_password')); ?>">I forgot my password</a><br> -->
		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/recbreaker/resources/views/backend/auth/login.blade.php ENDPATH**/ ?>