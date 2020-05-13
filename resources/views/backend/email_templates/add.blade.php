@extends('layouts.admin')

@section('content')
	<!-- Main content -->
	<section class="content">
	  	<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						{{ Form::open(array( "method" => "post", "id"=>"add_form", "enctype" => "multipart/form-data", 'url' => url('admin').'/'.$slug.'/create'.getUrlParams() )) }}
							<div class="form-group field_container">
								{{ Form::label("title","Title") }}
								{{ Form::text("title",null,array("class"=>"form-control","placeholder"=>"Title")) }}
								@if($errors->has('title'))
									<span id="title-error" class="error text-danger">{{ $errors->first('title') }}</span>
								@endif
							</div>
							<div class="form-group field_container">
								{{ Form::label("subject","Subject") }}
								{{ Form::text("subject",null,array("class"=>"form-control","placeholder"=>"Subject")) }}
								@if($errors->has('subject'))
									<span id="subject-error" class="error text-danger">{{ $errors->first('subject') }}</span>
								@endif
							</div>
							<div class="form-group field_container">
								{{ Form::label("content","Content") }}
								{{ Form::textarea("content",null,array("class"=>"form-control","placeholder"=>"Content","id"=>"ckeditor")) }}
								@if($errors->has('content'))
									<span id="content-error" class="error text-danger">{{ $errors->first('content') }}</span>
								@endif
							</div>
							<div class="form-group">
								<a class="btn btn-primary" href="{{ url('admin').'/'.$slug.getUrlParams() }}">Back</a>
								<button class="btn btn-success">Submit</button>
							</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
@endsection

@section('scripts')
	<script>
		$(document).ready(function(){ CKEDITOR.replace("ckeditor"); });
		$("#add_form").validate({
			ignore: [],
			rules: {
				title: {
					required: true,
					noSpace: true,
					minlength: 6,
					maxlength: 250,
				},
				subject: {
					required: true,
					noSpace: true,
					minlength: 6,
					maxlength: 250,
				},
				content:{
					editorRequired: true,
					editorMaxLength: 5000,
				}
			},
			messages: {
				title: {
					required: "The title field is required",
					noSpace: "The title field is required",
					minlength: "The title field must be at least 6 characters long",
					maxlength: "The title field must not exceed 250 characters",
				},
				subject: {
					required: "The subject field is required",
					noSpace: "The subject field is required",
					minlength: "The subject field must be at least 6 characters long",
					maxlength: "The subject field must not exceed 250 characters",
				},
			},
		});
	</script>
@endsection