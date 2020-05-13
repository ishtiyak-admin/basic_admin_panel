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
							<div class="form-group">
								{{ Form::label("title","Title") }}
								{{ Form::text("title",null,array("class"=>"form-control","placeholder"=>"Title")) }}
								@if($errors->has('title'))
									<span class="help-block">
										<strong class="text-danger">{{ $errors->first('title') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group">
								{{ Form::label("subject","Subject") }}
								{{ Form::text("subject",null,array("class"=>"form-control","placeholder"=>"Subject")) }}
								@if($errors->has('subject'))
									<span class="help-block">
										<strong class="text-danger">{{ $errors->first('subject') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group">
								{{ Form::label("content","Content") }}
								{{ Form::textarea("content",null,array("class"=>"form-control","placeholder"=>"Content","id"=>"ckeditor")) }}
								@if($errors->has('content'))
									<span class="help-block">
										<strong class="text-danger">{{ $errors->first('content') }}</strong>
									</span>
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
		$(document).ready(function(){
			CKEDITOR.replace("ckeditor");
		});
	</script>
@endsection