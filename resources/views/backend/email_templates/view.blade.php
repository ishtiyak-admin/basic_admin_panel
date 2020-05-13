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
								<label class="col-md-3">Title :</label>
								<div class="col-md-9">{{ $record->title }}</div>
							</div>
						</div>
						<div class="row">
							<div class="box-body">
								<label class="col-md-3">Subject :</label>
								<div class="col-md-9">{{ $record->subject }}</div>
							</div>
						</div>
						<div class="row">
							<div class="box-body">
								<label class="col-md-3">Content :</label>
								<div class="col-md-9">{!! $record->content !!}</div>
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