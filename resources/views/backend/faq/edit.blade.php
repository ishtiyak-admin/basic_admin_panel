@extends('layouts.admin')

@section('content')
	<!-- Main content -->
	<section class="content">
	  	<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						{{ Form::model($record,array( "method" => "post", "id"=>"edit_form", "enctype" => "multipart/form-data", 'url' => url('admin').'/'.$slug.'/edit/'.base64_encode($record->id).getUrlParams() )) }}
							<div class="form-group field_container">
								{{ Form::label("question","Question") }}
								{{ Form::text("question",null,array("class"=>"form-control","placeholder"=>"Question", "maxlength" => "250")) }}
								@if($errors->has('question'))
									<span id="question-error" class="error text-danger">{{ $errors->first('question') }}</span>
								@endif
							</div>
							<div class="form-group field_container">
								{{ Form::label("answer","Answer") }}
								{{ Form::textarea("answer",null,array("class"=>"form-control","placeholder"=>"Answer","id"=>"ckeditor", "maxlength" => "5000")) }}
								@if($errors->has('answer'))
									<span id="answer-error" class="error text-danger">{{ $errors->first('answer') }}</span>
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
		$("#edit_form").validate({
			ignore: [],
			rules: {
				question: {
					required: true,
					noSpace: true,
					minlength: 4,
					maxlength: 250,
				},
				answer:{
					editorRequired: true,
					editorMaxLength: 5000,
				}
			},
			messages: {
				question: {
					required: "The question field is required",
					noSpace: "The question field is required",
					minlength: "The question field must be at least 4 characters long",
					maxlength: "The question field must not exceed 250 characters",
				},
			},
		});
	</script>
@endsection