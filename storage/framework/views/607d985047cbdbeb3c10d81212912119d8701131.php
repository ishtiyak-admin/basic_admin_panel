<?php $__env->startSection('content'); ?>
	<!-- Main content -->
    <section class="content">
      	<div class="row">
        	<div class="col-xs-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-header">
						<h4>Search</h4>
					</div>
					<div class="box-body">
						<?php echo e(Form::open(array( "url" => $base_url, "method" => "get", "id"=>"search_form" ))); ?>

							<div class="col-lg-3 col-md-6 col-xs-12">
								<?php echo e(Form::label("name","Name")); ?>

								<?php echo e(Form::text("name",request()->name,array("class"=>"form-control","placeholder"=>"Name"))); ?>

							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								<label>&nbsp;</label>
								<button class="btn btn-primary form-control">Search</button>
							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								<label>&nbsp;</label>
								<a href="<?php echo e($base_url); ?>" class="btn btn-primary form-control">Reset</a>
							</div>
						<?php echo e(Form::close()); ?>

					</div>
				</div>
			</div>
		</div>
      	<div class="row">
        	<div class="col-xs-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						<table id="listind_table" class="table table-bordered table-hover datatable cell-border compact stripe hover">
							<thead>
								<tr>
									<th><?php echo sortableColumn($base_url,'id','S.No.',true); ?></th>
									<th><?php echo sortableColumn($base_url,'name','Name',true); ?></th>
									<th><?php echo sortableColumn($base_url,'email','Email',true); ?></th>
									<th><?php echo sortableColumn($base_url,'view','View',false); ?></th>
									<th><?php echo sortableColumn($base_url,'reply','Reply',false); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php if($records->count() > 0): ?>
									<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php $counter++; ?>
										<tr>
											<td><?php echo e($counter); ?></td>
											<td><?php echo e($record->name); ?></td>
											<td><?php echo e($record->email); ?></td>
											<td>
												<?php if($record['replied'] == 1): ?>
													<span class='text-success'>Already Replied</span>
												<?php else: ?>
													<a class='btn btn-primary' onclick='reply_to_enquiry("<?php echo e(base64_encode($record->id)); ?>","<?php echo e($record->name); ?>","<?php echo e($record->email); ?>")' ><i class='fa '>&nbsp;</i>Reply</a>
												<?php endif; ?>
											</td>
											<td>
												<a class='btn btn-info' href="<?php echo e(url($base_url.'/view/'.base64_encode($record->id)).getUrlParams()); ?>" title="View"><i class='fa fa-eye'></i></a>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php else: ?>
									<tr><td colspan="100%"><div class="text-center"><h4>No <?php echo e($page_title); ?> found.</h4></div></td></tr>
								<?php endif; ?>
							</tbody>
						</table>
						<div class="pagination">
							<?php echo e($records->appends(request()->except('page'))->links()); ?>

						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

	<!-- Modal -->
	<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h3 class="modal-title text-center" id="exampleModalLongTitle">Reply To User</h3>
		      	</div>
		      	<div class="modal-body">
		        	<?php echo e(Form::open(array("url" => $base_url.getUrlParams(), "id" => "replyForm", "onsubmit" => '$("#replyModal").modal("hide");', "enctype" => "multipart/form-data" ))); ?>

		        		<div class="form-group">
		        			<?php echo e(Form::label("name","Name")); ?>

		        			<?php echo e(Form::text("name",null,array( "class" => "form-control", "id" => "replyName", "readonly" => "readonly" ))); ?>

		        		</div>
		        		<div class="form-group">
		        			<?php echo e(Form::label("email","Email")); ?>

		        			<?php echo e(Form::text("email",null,array( "class" => "form-control", "id" => "replyEmail", "readonly" => "readonly" ))); ?>

		        		</div>
		        		<div class="form-group">
		        			<?php echo e(Form::label("content","Content")); ?>

		        			<?php echo e(Form::textarea("content",null,array( "class" => "form-control", "id" => "replyContent", "required" => 
		        			"required" ))); ?>

		        		</div>
		        		<div class="form-group">
		        			<?php echo e(Form::label("attachment","Attachment")); ?>

		        			<?php echo e(Form::file("attachment",null,array( "class" => "form-control", "id" => "attachment" ))); ?>

		        		</div>
		        		<div class="form-group text-center">
		        			<button type="submit" class="btn btn-primary">Submit</button>
		        			<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
		        		</div>
		        	<?php echo e(Form::close()); ?>

		      	</div>
		    </div>
	  	</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		function reply_to_enquiry(id,name,email){
			var confirm_msg = "Are you sure you want to reply to this enquiry?";
			if( confirm(confirm_msg) === true ){
				var getUrlParams = "<?php echo e(getUrlParams()); ?>";
				getUrlParams = decodeHTMLEntities(getUrlParams);
				var action = "<?php echo e(url('admin/enquiry/reply')); ?>"+"/"+id+""+getUrlParams;
				$("#replyModal").find("#replyForm").attr("action",action);
				$("#replyModal").find("#replyName").val(name);
				$("#replyModal").find("#replyEmail").val(email);
				// $("#replyModal").find("#replyMsg").html(message);
				$("#replyModal").find("#replyContent").val("");
				$("#replyModal").modal("show");
			}
		}
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/recbreaker/resources/views/backend/enquiry/index.blade.php ENDPATH**/ ?>