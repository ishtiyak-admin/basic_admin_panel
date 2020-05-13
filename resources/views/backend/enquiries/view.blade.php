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
								<label class="col-md-3">Message :</label>
								<div class="col-md-9">{!! $record->message !!}</div>
							</div>
						</div>
						@if($record->replied == 1)
							<div class="row">
								<div class="box-body">
									<label class="col-md-3">Replied Message :</label>
									<div class="col-md-9">{!! $record->reply_message !!}</div>
								</div>
							</div>
							@if($record->attachment)
								<div class="row">
									<div class="box-body">
										<label class="col-md-3">Attachment :</label>
										<div class="col-md-9">
											<a href="{{ url('public/uploads/enquiry_attachments/'.$record->attachment) }}" class="btn btn-primary" download="{{ $record->attachment }}">Download Attachment</a>
										</div>
									</div>
								</div>
							@endif
						@endif
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