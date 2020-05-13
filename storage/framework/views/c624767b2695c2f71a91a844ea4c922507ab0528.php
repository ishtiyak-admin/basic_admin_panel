<?php $__env->startSection('content'); ?>
	<!-- Main content -->
	<section class="content">
	  	<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						<?php echo e(Form::open(array( "method" => "post", "id"=>"add_form", "enctype" => "multipart/form-data", 'url' => url('admin').'/'.$slug.'/create'.getUrlParams() ))); ?>

							<div class="form-group field_container">
								<?php echo e(Form::label("title","Title")); ?>

								<?php echo e(Form::text("title",null,array("class"=>"form-control","placeholder"=>"Title"))); ?>

								<?php if($errors->has('title')): ?>
									<span id="title-error" class="error text-danger"><?php echo e($errors->first('title')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group field_container">
								<?php echo e(Form::label("subject","Subject")); ?>

								<?php echo e(Form::text("subject",null,array("class"=>"form-control","placeholder"=>"Subject"))); ?>

								<?php if($errors->has('subject')): ?>
									<span id="subject-error" class="error text-danger"><?php echo e($errors->first('subject')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group field_container">
								<?php echo e(Form::label("content","Content")); ?>

								<?php echo e(Form::textarea("content",null,array("class"=>"form-control","placeholder"=>"Content","id"=>"ckeditor"))); ?>

								<?php if($errors->has('content')): ?>
									<span id="content-error" class="error text-danger"><?php echo e($errors->first('content')); ?></span>
								<?php endif; ?>
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
		$("#add_form").validate({
			ignore: [],
			rules: {
				title: {
					required: true,
					noSpace: true,
					minlength: 6,
					maxlength: 250,
				},
				subject: {
					required: true,
					noSpace: true,
				},
				content:{
					editorRequired: true,
					editorMaxLength: 5000,
				}
			},
			messages: {
				title: {
					required: "The title field is required",
					noSpace: "The title field is required",
					minlength: "The title field must be at least 6 characters long",
					maxlength: "The title field must not exceed 250 characters",
				},
				subject: {
					required: "The subject field is required",
					noSpace: "The subject field is required",
				},
			},
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/recbreaker/resources/views/backend/email_templates/add.blade.php ENDPATH**/ ?>