<?php $__env->startSection('content'); ?>
	<!-- Main content -->
	<section class="content">
	  	<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<a class="btn btn-success" href="<?php echo e(url('admin').'/'.$slug.'/create'.getUrlParams()); ?>">
							<i class="fa fa-plus">&nbsp;</i>Create
						</a>
						<a class="btn btn-primary" href="<?php echo e(url('admin').'/'.$slug.'/export/csv'); ?>" onclick="return confirm('Are you sure you want to export all records?')">
							<i class="fa fa-download">&nbsp;</i>Export CSV
						</a>
					</div>
				</div>
			</div>
		</div>
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
								<?php echo e(Form::label("email","Email")); ?>

								<?php echo e(Form::text("email",request()->email,array("class"=>"form-control","placeholder"=>"Email"))); ?>

							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								<?php echo e(Form::label("mobile_number","Mobile Number")); ?>

								<?php echo e(Form::text("mobile_number",request()->mobile_number,array("class"=>"form-control","placeholder"=>"Mobile Number"))); ?>

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
									<th><?php echo sortableColumn($base_url,'image','Image',false); ?></th>
									<th><?php echo sortableColumn($base_url,'name','Name',true); ?></th>
									<th><?php echo sortableColumn($base_url,'email','Email',true); ?></th>
									<th><?php echo sortableColumn($base_url,'mobile_number','Mobile Number',true); ?></th>
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
											<td>
												<?php if($record->image): ?>
													<a href="<?php echo e(url('public/uploads/user_images').'/'.$record->image); ?>" data-lightbox="image-1" data-title="<?php echo e($record->name); ?>"><img src="<?php echo e(url('public/uploads/user_images').'/'.$record->image); ?>" style="width:100px;height:100px;" /></a>
												<?php else: ?>
													<a href="<?php echo e(url('public/uploads/dummy_user.png')); ?>" data-lightbox="image-1" data-title="<?php echo e($record->name); ?>"><img src="<?php echo e(url('public/uploads/dummy_user.png')); ?>" style="width:100px;height:100px;" /></a>
												<?php endif; ?>
											</td>
											<td><?php echo e(title_case($record->name)); ?></td>
											<td><?php echo e($record->email); ?></td>
											<td><?php echo e($record->mobile_number); ?></td>
											<td>
												<?php echo e(($record['status'] == 1)? 'Active' : 'Deactivate'); ?>

											</td>
											<td>
												<a class='btn btn-info' href="<?php echo e(url($base_url.'/view/'.base64_encode($record->id)).getUrlParams()); ?>" title="View"><i class='fa fa-eye'></i></a>
												<a class='btn btn-primary' href="<?php echo e(url($base_url.'/edit/'.base64_encode($record->id)).getUrlParams()); ?>" title="Edit"><i class='fa fa-edit'></i></a>
												<a class='btn btn-danger' onclick='return confirm("Are you sure you want to delete this record?")' href="<?php echo e(url($base_url.'/delete/'.base64_encode($record->id)).getUrlParams()); ?>" title="Delete"><i class='fa fa-trash'></i></a>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/helthiago/resources/views/backend/users/index.blade.php ENDPATH**/ ?>