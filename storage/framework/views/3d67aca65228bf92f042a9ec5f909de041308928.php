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
								<?php echo e(Form::label("description","Description")); ?>

								<?php echo e(Form::textarea("description",null,array("class"=>"form-control","placeholder"=>"Description","id"=>"ckeditor"))); ?>

								<?php if($errors->has('description')): ?>
									<span id="description-error" class="error text-danger"><?php echo e($errors->first('description')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<?php echo e(Form::label("image","Image")); ?>

									<?php echo e(Form::file("image",array("class"=>"","placeholder"=>"Image", "accept" => "image/*"))); ?>

									<?php if($errors->has('image')): ?>
										<span id="image-error" class="error text-danger"><?php echo e($errors->first('image')); ?></span>
									<?php endif; ?>
								</div>
								<div class="col-md-6">
								</div>
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
		// $(document).ready(function(){ CKEDITOR.replace("content"); });
		$("#add_form").validate({
			ignore: [],
			rules: {
				title: {
					required: true,
					noSpace: true,
					minlength: 4,
					maxlength: 250,
				},
				description: {
					required: true,
					noSpace: true,
					maxlength: 5000,
				},
				image: {
					required: true,
				},
			},
			messages: {
				title: {
					required: "The title field is required",
					noSpace: "The title field is required",
					minlength: "The title field must be at least 3 characters long",
					maxlength: "The title field must not exceed 55 characters",
				},
				description: {
					required: "The description field is required",
					noSpace: "The description field is required",
					minlength: "The description field must be at least 3 characters long",
					maxlength: "The description field must not exceed 55 characters",
				},
				image: {
					required: "The image field is required",
				},
			},
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/recbreaker/resources/views/backend/app_tutorial_screens/add.blade.php ENDPATH**/ ?>