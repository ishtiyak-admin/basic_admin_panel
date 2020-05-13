
<?php $__env->startSection('content'); ?>
	<div class="warper">
		<div class="inner_warper">
			<div class="container">
				<div class="contact_page_content">
					<div class="contact_inner">
						<div class="row">
							<div class="col-md-6">
								<div class="contact_form_box">
									<h2>Contact Us</h2>
									<?php echo e(Form::open(array("url" => url('pages/contact-us'), "onsubmit" => '$(".loader_container").show();'))); ?>

										<div class="form-group ">
											<?php echo e(Form::label('name',"Your Name")); ?>

											<?php echo e(Form::text('name',null,array("id" => "name", "class" => "form-control"))); ?>

											<?php if($errors->has('name')): ?>
												<span class="help-block">
													<strong class="text-danger"><?php echo e($errors->first('name')); ?></strong>
												</span>
											<?php endif; ?>
										</div>
										<div class="form-group ">
											<?php echo e(Form::label('email',"Email")); ?>

											<?php echo e(Form::text('email',null,array("id" => "email", "class" => "form-control"))); ?>

											<?php if($errors->has('email')): ?>
												<span class="help-block">
													<strong class="text-danger"><?php echo e($errors->first('email')); ?></strong>
												</span>
											<?php endif; ?>
										</div>
										<div class="form-group">
											<?php echo e(Form::label('message',"Your Message")); ?>

											<?php echo e(Form::textarea('message',null,array("id" => "message", "class" => "form-control"))); ?>

											<?php if($errors->has('message')): ?>
												<span class="help-block">
													<strong class="text-danger"><?php echo e($errors->first('message')); ?></strong>
												</span>
											<?php endif; ?>
										</div>
										<div class="form_submit_button">
											<button class="btn btn-primary">Submit</button>
										</div>
									<?php echo e(Form::close()); ?>

								</div>
							</div>
							<div class="col-md-6">
								<div class="address_info_box">
									<h2>Address Info</h2>
									<ul>
										<li>
											<figure>
												<i class="fas fa-map-marker-alt"></i>
											</figure>
											<figcaption>
												<p><?php echo e((getSettings('address'))? getSettings('address') : ""); ?></p>
											</figcaption>
										</li>
										<li>
											<figure>
												<i class="fas fa-phone-volume"></i>
											</figure>
											<figcaption>
												<p><?php echo e((getSettings('contact-number'))? getSettings('contact-number') : ""); ?></p>
											</figcaption>
										</li>
										<li>
											<figure>
												<i class="far fa-envelope"></i>
											</figure>
											<figcaption>
												<p><a href="mailto:<?php echo e((getSettings('admin-receive-email'))? getSettings('admin-receive-email') : ''); ?>"><?php echo e((getSettings('admin-receive-email'))? getSettings('admin-receive-email') : ""); ?></a></p>
											</figcaption>
										</li>
									</ul>
								</div>
							</div>
						</div> 
					</div>
				</div>
			</div> 
		</div> 
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/helthiago/resources/views/frontend/pages/contact_us.blade.php ENDPATH**/ ?>