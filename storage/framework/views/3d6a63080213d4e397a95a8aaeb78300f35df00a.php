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
								<?php echo e(Form::label("question","Question")); ?>

								<?php echo e(Form::text("question",null,array("class"=>"form-control","placeholder"=>"Question", "maxlength" => "250"))); ?>

								<?php if($errors->has('question')): ?>
									<span id="question-error" class="error text-danger"><?php echo e($errors->first('question')); ?></span>
								<?php endif; ?>
							</div>
							<div class="form-group field_container">
								<?php echo e(Form::label("answer","Answer")); ?>

								<?php echo e(Form::textarea("answer",null,array("class"=>"form-control","placeholder"=>"Answer","id"=>"ckeditor", "maxlength" => "5000"))); ?>

								<?php if($errors->has('answer')): ?>
									<span id="answer-error" class="error text-danger"><?php echo e($errors->first('answer')); ?></span>
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
				question: {
					required: true,
					noSpace: true,
					minlength: 3,
					maxlength: 55,
				},
				answer:{
					editorRequired: true,
					editorMaxLength: 5000,
				}
			},
			messages: {
				question: {
					required: "The question field is required",
					noSpace: "The question field is required",
					minlength: "The question field must be at least 3 characters long",
					maxlength: "The question field must not exceed 55 characters",
				},
			},
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/recbreaker/resources/views/backend/faq/add.blade.php ENDPATH**/ ?>