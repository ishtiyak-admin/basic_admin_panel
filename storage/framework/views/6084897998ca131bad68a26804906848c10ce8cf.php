<?php $__env->startSection('content'); ?>
	<!-- Main content -->
	<section class="content">
	  	<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="box-body">
								<label class="col-md-3">Name :</label>
								<div class="col-md-9"><?php echo e($record->name); ?></div>
							</div>
						</div>
						<div class="row">
							<div class="box-body">
								<label class="col-md-3">Email :</label>
								<div class="col-md-9"><?php echo e($record->email); ?></div>
							</div>
						</div>
						<div class="row">
							<div class="box-body">
								<label class="col-md-3">Mobile Number :</label>
								<div class="col-md-9"><?php echo e($record->mobile_number); ?></div>
							</div>
						</div>
						<div class="row">
							<div class="box-body">
								<label class="col-md-3">Image :</label>
								<div class="col-md-9">
									<?php
										if($record->image){
											$image_path 			=	url('public/uploads/user_images').'/'.$record->image;
										}else{
											$image_path 			=	url('public/uploads/dummy_user.png');
										}
									?>
									<a href="<?php echo e($image_path); ?>" data-lightbox="image-1" data-title="<?php echo e($record->name); ?>"><img src="<?php echo e($image_path); ?>" style="width:100px;height:100px;" /></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="box-body">
								<label class="col-md-3">Status :</label>
								<div class="col-md-9"><?php echo e(($record->status == 1) ? 'Active' : 'Deactivated'); ?></div>
							</div>
						</div>
						<div class="row">
							<div class="box-body text-center">
								<a class="btn btn-primary" href="<?php echo e(url('admin').'/'.$slug.getUrlParams()); ?>" >Back</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		$(document).ready(function(){
			CKEDITOR.replace("ckeditor");
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/recbreaker/resources/views/backend/users/view.blade.php ENDPATH**/ ?>