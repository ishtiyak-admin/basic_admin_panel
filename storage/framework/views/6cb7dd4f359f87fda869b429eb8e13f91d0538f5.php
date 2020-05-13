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
								<label class="col-md-3">Message :</label>
								<div class="col-md-9"><?php echo $record->message; ?></div>
							</div>
						</div>
						<?php if($record->replied == 1): ?>
							<div class="row">
								<div class="box-body">
									<label class="col-md-3">Replied Message :</label>
									<div class="col-md-9"><?php echo $record->reply_message; ?></div>
								</div>
							</div>
							<?php if($record->attachment): ?>
								<div class="row">
									<div class="box-body">
										<label class="col-md-3">Attachment :</label>
										<div class="col-md-9">
											<a href="<?php echo e(url('public/uploads/enquiry_attachments/'.$record->attachment)); ?>" class="btn btn-primary" download="<?php echo e($record->attachment); ?>">Download Attachment</a>
											<!-- <a href="<?php echo e(url('public/uploads/enquiry_attachments/'.$record->attachment)); ?>" data-lightbox="image-1" data-title="<?php echo e($record->email); ?>"><img src="<?php echo e(url('public/uploads/enquiry_attachments/'.$record->attachment)); ?>" style="width:100px;height:100px;" /></a> -->
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endif; ?>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/recbreaker/resources/views/backend/enquiries/view.blade.php ENDPATH**/ ?>