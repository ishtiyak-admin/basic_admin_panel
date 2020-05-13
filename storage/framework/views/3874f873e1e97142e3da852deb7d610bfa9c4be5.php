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
								<?php echo e(Form::label("title","Title")); ?>

								<?php echo e(Form::text("title",null,array("class"=>"form-control","placeholder"=>"Title"))); ?>

								<?php if($errors->has('title')): ?>
									<span id="title-error" class="error text-danger"><?php echo e($errors->first('title')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group field_container">
								<?php echo e(Form::label("description","Content")); ?>

								<?php echo e(Form::textarea("description",null,array("class"=>"form-control","placeholder"=>"Content","id"=>"ckeditor"))); ?>

								<?php if($errors->has('description')): ?>
									<span id="description-error" class="error text-danger"><?php echo e($errors->first('description')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<?php echo e(Form::label("image","Image")); ?>

									<?php echo e(Form::file("image",array("class"=>"","placeholder"=>"Image", "accept" => "image/*"))); ?>

									<?php if($errors->has('image')): ?>
										<span class="help-block">
											<strong class="text-danger"><?php echo e($errors->first('image')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
								<div class="col-md-6">
									<?php if($record->image): ?>
										<a href="<?php echo e(url('public/uploads/app_tutorial_screens').'/'.$record->image); ?>" data-lightbox="image-1" data-title="<?php echo e($record->name); ?>">
											<img src="<?php echo e(url('public/uploads/app_tutorial_screens').'/'.$record->image); ?>" style="width:100px;height:100px;" />
										</a>
									<?php endif; ?>
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
		// $(document).ready(function(){ CKEDITOR.replace("ckeditor"); });
		$("#edit_form").validate({
			ignore: [],
			rules: {
				title: {
					required: true,
					noSpace: true,
					minlength: 3,
					maxlength: 55,
				},
				description: {
					required: true,
					noSpace: true,
					minlength: 3,
					maxlength: 1000,
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
			},
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/recbreaker/resources/views/backend/app_tutorial_screens/edit.blade.php ENDPATH**/ ?>