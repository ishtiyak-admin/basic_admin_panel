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
								<label class="col-md-3">Question :</label>
								<div class="col-md-9">{{ $record->question }}</div>
							</div>
						</div>
						<div class="row">
							<div class="box-body">
								<label class="col-md-3">Answer :</label>
								<div class="col-md-9">{!! $record->answer !!}</div>
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