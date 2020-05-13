<?php $__env->startSection('content'); ?>
	<!-- Main content -->
	<section class="content">
	  	<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						<?php echo e(Form::open(array( "method" => "post", "id"=>"add_form", "enctype" => "multipart/form-data", 'url' => url('admin').'/'.$slug.'/create'.getUrlParams(), "autocomplete" => "off" ))); ?>

							<div class="form-group field_container">
								<?php echo e(Form::label("title","Title")); ?>

								<?php echo e(Form::text("title",null,array("class"=>"form-control ","placeholder"=>"Title"))); ?>

								<?php if($errors->has('title')): ?>
									<span id="title-error" class="error text-danger"><?php echo e($errors->first('title')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group field_container">
								<?php echo e(Form::label("content","Content")); ?>

								<?php echo e(Form::textarea("content",null,array("class"=>"form-control","placeholder"=>"Content","id"=>"content"))); ?>

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
		$(document).ready(function(){ CKEDITOR.replace("content"); });
		$("#add_form").validate({
			ignore: [],
			rules: {
				title: {
					required: true,
					noSpace: true,
					minlength: 3,
					maxlength: 250,
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
					minlength: "The title field must be at least 3 characters long",
					maxlength: "The title field must not exceed 250 characters",
				},
			},
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/recbreaker/resources/views/backend/cms_pages/add.blade.php ENDPATH**/ ?>