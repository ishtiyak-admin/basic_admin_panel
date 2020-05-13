@extends('layouts.admin')

@section('content')
	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<?php $dash_user_data 	=	Auth::guard('admins')->user(); ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3>{{ $users->count() }}</h3>
						<p>User Registrations</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="{{ url('admin/users') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
@endsection