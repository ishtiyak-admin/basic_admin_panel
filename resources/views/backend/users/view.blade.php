@extends('layouts.admin')

@section('content')
	<!-- Main content -->
	<section class="content">
	  	<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="box-body">
								<label class="col-md-3">Name :</label>
								<div class="col-md-9">{{ $record->name }}</div>
							</div>
						</div>
						<div class="row">
							<div class="box-body">
								<label class="col-md-3">Email :</label>
								<div class="col-md-9">{{ $record->email }}</div>
							</div>
						</div>
						<div class="row">
							<div class="box-body">
								<label class="col-md-3">Mobile Number :</label>
								<div class="col-md-9">{{ $record->mobile_number }}</div>
							</div>
						</div>
						<div class="row">
							<div class="box-body">
								<label class="col-md-3">Image :</label>
								<div class="col-md-9">
									<?php
										if($record->image){
											$image_path 			=	url('public/uploads/user_images').'/'.$record->image;
										}else{
											$image_path 			=	url('public/uploads/dummy_user.png');
										}
									?>
									<a href="{{ $image_path }}" data-lightbox="image-1" data-title="{{ $record->name }}"><img src="{{ $image_path }}" style="width:100px;height:100px;" /></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="box-body">
								<label class="col-md-3">Status :</label>
								<div class="col-md-9">{{ ($record->status == 1) ? 'Active' : 'Deactivate' }}</div>
							</div>
						</div>
						<div class="row">
							<div class="box-body text-center">
								<a class="btn btn-primary" href="{{ url('admin').'/'.$slug.getUrlParams() }}" >Back</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
@endsection

@section('scripts')
	<script>
		$(document).ready(function(){
			CKEDITOR.replace("ckeditor");
		});
	</script>
@endsection