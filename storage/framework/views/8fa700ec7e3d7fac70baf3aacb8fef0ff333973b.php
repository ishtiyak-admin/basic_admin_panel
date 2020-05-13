<?php $__env->startSection('content'); ?>
	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<?php $dash_user_data 	=	Auth::guard('admins')->user(); ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><?php echo e($users->count()); ?></h3>
						<p>User Registrations</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="<?php echo e(url('admin/users')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/helthiago/resources/views/backend/index.blade.php ENDPATH**/ ?>