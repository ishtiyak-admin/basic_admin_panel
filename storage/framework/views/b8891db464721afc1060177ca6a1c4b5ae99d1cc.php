<?php
  $slug1	=	Request::segment(1);
	$slug2	=	Request::segment(2);
	$slug3	=	Request::segment(3);
	$slug4	=	Request::segment(4);
?>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
			<?php if(!empty(Auth::guard('admins')->user()->image)): ?>
				<img src="<?php echo e(url('public/uploads/user_images/').'/'.Auth::guard('admins')->user()->image); ?>" class="img-circle" alt="User Image" style="height:45px; width: 45px; background-color: #fff;">
			<?php else: ?>
				<img src="<?php echo e(url('public/uploads/dummy_user.png')); ?>" class="img-circle" alt="User Image" style="height:45px; width: 45px; background-color: #fff;">
			<?php endif; ?>
			</div>
			<div class="pull-left info">
			<p style="line-height: 30px;"><?php echo e(Auth::guard('admins')->user()->name); ?></p>
			<!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<?php 
				$side_user_data 	=	Auth::guard('admins')->user();
			?>
			<!-- <li class="header">MAIN NAVIGATION</li> -->
			<li class="<?php echo e(( empty($slug2) )? 'active' : ''); ?>">
				<a href="<?php echo e(url('admin')); ?>">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<li class="<?php echo e(( !empty($slug2) && ( $slug2 == 'users' ) )? 'active' : ''); ?>">
				<a href="<?php echo e(url('admin/users')); ?>">
					<i class="fa fa-users"></i> <span>Users Management</span>
				</a>
			</li>
			<li class="treeview <?php echo e(( !empty($slug2) && ( $slug2 == 'faq' ) )? 'active' : ''); ?>">
				<a href="javascript:void(0);">
					<i class="fa fa-question"></i>
					<span>Faqs</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?php echo e(( !empty($slug2) && ( $slug2 == 'faq' ) && ( empty($slug3) ) )? 'active' : ''); ?>">
						<a href="<?php echo e(url('admin/faq')); ?>"><i class="fa fa-circle-o"></i> Faqs</a>
					</li>
					<li class="<?php echo e(( !empty($slug2) && ( $slug2 == 'faq' ) && ( $slug3 == 'create' ) )? 'active' : ''); ?>">
						<a href="<?php echo e(url('admin/faq/create')); ?>"><i class="fa fa-circle-o"></i> Create</a>
					</li>
				</ul>
			</li>
			<li class="<?php echo e(( !empty($slug2) && ( $slug2 == 'enquiries' ) )? 'active' : ''); ?>">
				<a href="<?php echo e(url('admin/enquiries')); ?>">
					<i class="fa fa-list-alt"></i> <span>Enquiries</span>
				</a>
			</li>
			<li class="<?php echo e(( !empty($slug2) && ( $slug2 == 'cms_pages' ) )? 'active' : ''); ?>">
				<a href="<?php echo e(url('admin/cms_pages')); ?>">
					<i class="fa fa-file-o"></i> <span>CMS Pages</span>
				</a>
			</li>
			<li class="<?php echo e(( !empty($slug2) && ( $slug2 == 'email_templates' ) )? 'active' : ''); ?>">
				<a href="<?php echo e(url('admin/email_templates')); ?>">
					<i class="fa fa-envelope"></i> <span>Email Templates</span>
				</a>
			</li>
			<li class="<?php echo e(( !empty($slug2) && ( $slug2 == 'global_settings' ) )? 'active' : ''); ?>">
				<a href="<?php echo e(url('admin/global_settings')); ?>">
					<i class="fa fa-gear"></i> <span>Global Settings</span>
				</a>
			</li>
		</ul>
		</section>
		<!-- /.sidebar -->
	</aside>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php if(empty($slug2)): ?>
					Dashboard
				<?php else: ?>
					<?php echo e(title_case( str_replace("_"," ",$slug2) )); ?>

				<?php endif; ?>
				<?php if(!empty($slug3)): ?>
					<small><b><?php echo e(title_case( str_replace("_"," ",$slug3) )); ?></b></small>
				<?php endif; ?>
				<!-- <?php if(!empty($slug4)): ?>
					<small>(<?php echo e(title_case( str_replace("_"," ",$slug4) )); ?>)</small>
				<?php endif; ?> -->
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo e(url('/admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<?php if(empty($slug2)): ?>
					<li class="active">Dashboard</li>
				<?php else: ?>
					<li class="active">
						<a href="<?php echo e(url('/admin').'/'.$slug2); ?>">
							<?php echo e(title_case( str_replace("_"," ",$slug2) )); ?>

						</a>
					</li>
				<?php endif; ?>
				<?php if(!empty($slug3)): ?>
					<li class="active"><?php echo e(title_case( str_replace("_"," ",$slug3) )); ?></li>
				<?php endif; ?>
				<!-- <?php if(!empty($slug4)): ?>
					<li class="active"><?php echo e(title_case( str_replace("_"," ",$slug4) )); ?></li>
				<?php endif; ?> -->
			</ol>
		</section><?php /**PATH /opt/lampp/htdocs/helthiago/resources/views/backend/includes/sidebar.blade.php ENDPATH**/ ?>