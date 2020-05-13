<?php $__env->startSection('content'); ?>
	<!-- Main content -->
    <section class="content">
		<?php /* 
      	<div class="row">
        	<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<a class="btn btn-success" href="{{ url('admin').'/'.$slug.'/create'.getUrlParams() }}">
							<i class="fa fa-plus">&nbsp;</i>Add
						</a>
					</div>
				</div>
			</div>
		</div>
		*/ ?>
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
								<?php echo e(Form::label("title","Title")); ?>

								<?php echo e(Form::text("title",request()->title,array("class"=>"form-control","placeholder"=>"Title"))); ?>

							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								<?php echo e(Form::label("subject","Subject")); ?>

								<?php echo e(Form::text("subject",request()->subject,array("class"=>"form-control","placeholder"=>"Subject"))); ?>

							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								<?php echo e(Form::label("status","Status")); ?>

								<?php echo e(Form::select("status",[ "all" => "All", "active" => "Active", "deactive" => "Deactivate" ],request()->status,array("class"=>"form-control"))); ?>

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
									<th><?php echo sortableColumn($base_url,'title','Title',true); ?></th>
									<th><?php echo sortableColumn($base_url,'subject','Subject',true); ?></th>
									<th><?php echo sortableColumn($base_url,'status','Status',false); ?></th>
									<th><?php echo sortableColumn($base_url,'action','Action',false); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php if($records->count() > 0): ?>
									<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php $counter++; ?>
										<tr>
											<td><?php echo e($counter); ?></td>
											<td><?php echo e(title_case($record->title)); ?></td>
											<td><?php echo e(title_case($record->subject)); ?></td>
											<td><?php echo e(($record['status'] == 1)? 'Active' : 'Deactivate'); ?></td>
											<td>
												<a class='btn btn-info' href="<?php echo e(url($base_url.'/view/'.base64_encode($record->id)).getUrlParams()); ?>" title="View"><i class='fa fa-eye'></i></a>
												<a class='btn btn-primary' href="<?php echo e(url($base_url.'/edit/'.base64_encode($record->id)).getUrlParams()); ?>" title="Edit"><i class='fa fa-edit'></i></a>
												<?php if($record->status == 1): ?>
													<a class='btn btn-danger' onclick='return confirm("Are you sure you want to deactivate this record?")' href="<?php echo e(url($base_url.'/status_update/'.base64_encode($record->id).'/0').getUrlParams()); ?>" title="Deactivate">
														<i class='fa fa-lock'></i>
													</a>
												<?php else: ?>
													<a class='btn btn-success' onclick='return confirm("Are you sure you want to activate this record?")' href="<?php echo e(url($base_url.'/status_update/'.base64_encode($record->id).'/1').getUrlParams()); ?>" title="Activate">
														<i class='fa fa-unlock-alt'></i>
													</a>
												<?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/recbreaker/resources/views/backend/email_templates/index.blade.php ENDPATH**/ ?>