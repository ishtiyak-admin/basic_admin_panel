<?php $__env->startSection('content'); ?>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#global" data-toggle="tab">Global</a></li>
						<li class=""><a href="#social_settings" data-toggle="tab">Social</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="global">
							<!-- <form class="form-horizontal"> -->
							<?php echo e(Form::open(array("method"=>"post","class"=>"form-horizontal","url"=>url('admin/profile_update'), "enctype"=>"multipart/form-data"))); ?>

								<?php if(!empty($records)): ?>
									<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record_key=>$record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($record->category == "G"): ?>
											<div class="form-group">
												<label class="col-sm-2 control-label" for="input-field-<?php echo e($record->id); ?>"><?php echo e($record->label); ?></label>
												<div class="col-sm-8">
													<?php if($record->type == 'textarea'): ?>
														<textarea class="form-control" id="input-field-<?php echo e($record->id); ?>" name="<?php echo e($record->slug); ?>" placeholder="<?php echo e($record->label); ?>" rows="2" cols="40" maxlength="1000" <?php echo e(($record->required == 1)? 'required' : ''); ?>><?php echo e(($record->value) ? $record->value : ''); ?></textarea>
													<?php elseif($record->type == 'select'): ?>
														<select class="form-control" id="input-field-<?php echo e($record->id); ?>" name="<?php echo e($record->slug); ?>" <?php echo e(($record->required == 1)? 'required' : ''); ?>>
															<?php if($record->options): ?>
																<?php $__currentLoopData = json_decode($record->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt_key=>$opt_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<option value="<?php echo e($opt_key); ?>" <?php echo e(($record->value == $opt_key)? "selected" : ""); ?>><?php echo e(title_case($opt_value)); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															<?php endif; ?>
														<select>
													<?php elseif($record->type == 'checkbox'): ?>
														<input class="" id="input-field-<?php echo e($record->id); ?>" name="<?php echo e($record->slug); ?>" type="<?php echo e($record->type); ?>" value="<?php echo e($record->value); ?>" placeholder="<?php echo e($record->label); ?>" <?php echo e(($record->value == "true")? "checked='checked'" : ""); ?> <?php echo e(($record->required == 1)? 'required' : ''); ?>>
													<?php elseif($record->type == 'tel'): ?>
														<input class="form-control" id="input-field-<?php echo e($record->id); ?>" maxlength="250" name="<?php echo e($record->slug); ?>" type="<?php echo e($record->type); ?>" value="<?php echo e($record->value); ?>" placeholder="<?php echo e($record->label); ?>" minlength="7" maxlength="15" <?php echo e(($record->required == 1)? 'required' : ''); ?>>
													<?php else: ?>
														<input class="form-control" id="input-field-<?php echo e($record->id); ?>" maxlength="250" name="<?php echo e($record->slug); ?>" type="<?php echo e($record->type); ?>" value="<?php echo e($record->value); ?>" placeholder="<?php echo e($record->label); ?>" <?php echo e(($record->required == 1)? 'required' : ''); ?>>
													<?php endif; ?>
													<span class="help-block" id="success-msg-<?php echo e($record->id); ?>" style="display:none;">
														<strong class="text-success"><?php echo e($record->label); ?> updated successfully</strong>
													</span>
													<span class="help-block" id="error-msg-<?php echo e($record->id); ?>" style="display:none;">
														<strong class="text-danger">Invalid <?php echo e($record->label); ?></strong>
													</span>
												</div>
												<div class="col-sm-2">
													<img id="loader-img-<?php echo e($record->id); ?>" src="<?php echo e(url('public/uploads/spinner.gif')); ?>" style="display:none;height:50px;width:50px;" />
													<button type="button" id="btn-field-<?php echo e($record->id); ?>" class="btn btn-success btn-field">Submit</button>
												</div>
											</div>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							<?php echo e(Form::close()); ?>

							<!-- </form> -->
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="social_settings">
							<!-- <form class="form-horizontal"> -->
							<?php echo e(Form::open(array("method"=>"post","class"=>"form-horizontal","url"=>url('admin/profile_update'), "enctype"=>"multipart/form-data"))); ?>

								<?php if(!empty($records)): ?>
									<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record_key=>$record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($record->category == "S"): ?>
											<div class="form-group">
												<label class="col-sm-2 control-label" for="input-field-<?php echo e($record->id); ?>"><?php echo e($record->label); ?></label>
												<div class="col-sm-8">
													<?php if($record->type == 'textarea'): ?>
														<textarea class="form-control" id="input-field-<?php echo e($record->id); ?>" name="<?php echo e($record->slug); ?>" placeholder="<?php echo e($record->label); ?>" rows="2" cols="40" maxlength="1000" <?php echo e(($record->required == 1)? 'required' : ''); ?>><?php echo e(($record->value) ? $record->value : ''); ?></textarea>
													<?php elseif($record->type == 'select'): ?>
														<select class="form-control" id="input-field-<?php echo e($record->id); ?>" name="<?php echo e($record->slug); ?>" <?php echo e(($record->required == 1)? 'required' : ''); ?>>
															<?php if($record->options): ?>
																<?php $__currentLoopData = json_decode($record->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt_key=>$opt_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<option value="<?php echo e($opt_key); ?>" <?php echo e(($record->value == $opt_key)? "selected" : ""); ?>><?php echo e(title_case($opt_value)); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															<?php endif; ?>
														<select>
													<?php elseif($record->type == 'checkbox'): ?>
														<input class="" id="input-field-<?php echo e($record->id); ?>" name="<?php echo e($record->slug); ?>" type="<?php echo e($record->type); ?>" value="<?php echo e($record->value); ?>" placeholder="<?php echo e($record->label); ?>" <?php echo e(($record->value == "true")? "checked='checked'" : ""); ?> <?php echo e(($record->required == 1)? 'required' : ''); ?>>
													<?php else: ?>
														<input class="form-control" id="input-field-<?php echo e($record->id); ?>" maxlength="250" name="<?php echo e($record->slug); ?>" type="<?php echo e($record->type); ?>" value="<?php echo e($record->value); ?>" placeholder="<?php echo e($record->label); ?>" <?php echo e(($record->required == 1)? 'required' : ''); ?>>
													<?php endif; ?>
													<span class="help-block" id="success-msg-<?php echo e($record->id); ?>" style="display:none;">
														<strong class="text-success"><?php echo e($record->label); ?> updated successfully</strong>
													</span>
													<span class="help-block" id="error-msg-<?php echo e($record->id); ?>" style="display:none;">
														<strong class="text-danger">Invalid <?php echo e($record->label); ?></strong>
													</span>
												</div>
												<div class="col-sm-2">
													<img id="loader-img-<?php echo e($record->id); ?>" src="<?php echo e(url('public/uploads/spinner.gif')); ?>" style="display:none;height:50px;width:50px;" />
													<button type="button" id="btn-field-<?php echo e($record->id); ?>" class="btn btn-success btn-field">Submit</button>
												</div>
											</div>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							<?php echo e(Form::close()); ?>

							<!-- </form> -->
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		$(document).ready(function(){
			$(".btn-field").on('click',function(e){
				var id 			=	$(this).attr("id").replace("btn-field-","");
				var loader_img 	=	$("#loader-img-"+id);
				var button 		=	$("#btn-field-"+id);
				var success_msg =	$("#success-msg-"+id);
				var error_msg 	=	$("#error-msg-"+id);
				var value 		=	$("#input-field-"+id).val();
				var type 		=	$("#input-field-"+id).attr("type");
				var required	=	$("#input-field-"+id).attr("required");

				/** Emoji Check Start **/
				// var regex = /(\u00a9|\u00ae|[\u2000-\u3300]|\ud83c[\ud000-\udfff]|\ud83d[\ud000-\udfff]|\ud83e[\ud000-\udfff])/g;
				// match = regex.exec(value);
				// if(match != null){
				// 	error_msg.show();
				// 	loader_img.hide();
				// 	button.show();
				// 	return false;
				// }
				/** Emoji Check End **/

				loader_img.show();
				button.hide();
				if(type == "checkbox"){
					if($("#input-field-"+id).is(":checked")){
						value 	=	true;
					}else{
						value 	=	false;
					}
				}
				if(required){
					if(!value || value.length == 0){
						error_msg.show();
						loader_img.hide();
						button.show();
						return false;
					}
				}
				switch(type){
					case "email" :
						var emailRegex =	/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
						if(value.length != 0 && !emailRegex.test(value)){
							error_msg.show();
							loader_img.hide();
							button.show();
							return false;
						}
						break;
					case "number" :
						// var numberRegex =	/^[0-9]+$/;
						// var numberRegex =	/^\d+(\.\d{1,2})?$/;
						var numberRegex =	/^\d+(\.\d{1,2})?$/;
						if( ( value.length != 0 || value >= 0 ) && ( !numberRegex.test(value) || value > 100000000 ) ){
							error_msg.show();
							loader_img.hide();
							button.show();
							return false;
						}
						value.replace(/^0+/, '');
						break;
					case "tel" :
						var numberRegex =	/^\+?[0-9]{5,15}$/;
						// var numberRegex =	/^\+?((\d\-|\d)+\d){7,15}$/ig;
						if(value.length != 0 && !numberRegex.test(value)){
							error_msg.show();
							loader_img.hide();
							button.show();
							return false;
						}
						break;
					case "url" :
						var urlRegex =	/^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/;
						if(value.length != 0 && !urlRegex.test(value)){
							console.log("hello");
							error_msg.show();
							loader_img.hide();
							button.show();
							return false;
						}
						break;
				}
				$.ajax({
					url: "<?php echo e(url('admin/global_settings')); ?>",
					method:'POST',
					data:	{ "_token" : "<?php echo e(csrf_token()); ?>", "id" : id, "value" : value, },
					success: function(data){
						console.log(data);
						error_msg.hide();
						success_msg.show();
						loader_img.hide();
						button.show();
						setTimeout(() => { success_msg.hide(); }, 1000);
					},
					error: function(error){
						console.log(error);
					}
				})
			})
		})
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/recbreaker/resources/views/backend/global_settings.blade.php ENDPATH**/ ?>