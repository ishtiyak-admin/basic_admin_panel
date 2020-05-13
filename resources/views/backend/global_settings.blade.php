@extends('layouts.admin')

@section('content')
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#global" data-toggle="tab">Global</a></li>
						<li class=""><a href="#social_settings" data-toggle="tab">Social</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="global">
							<!-- <form class="form-horizontal"> -->
							{{ Form::open(array("method"=>"post","class"=>"form-horizontal","url"=>url('admin/profile_update'), "enctype"=>"multipart/form-data")) }}
								@if(!empty($records))
									@foreach($records as $record_key=>$record)
										@if($record->category == "G")
											<div class="form-group">
												<label class="col-sm-2 control-label" for="input-field-{{ $record->id }}">{{ $record->label }}</label>
												<div class="col-sm-8">
													@if($record->type == 'textarea')
														<textarea class="form-control" id="input-field-{{ $record->id }}" name="{{ $record->slug }}" placeholder="{{ $record->label }}" rows="2" cols="40" maxlength="1000" {{ ($record->required == 1)? 'required' : '' }}>{{ ($record->value) ? $record->value : '' }}</textarea>
													@elseif($record->type == 'select')
														<select class="form-control" id="input-field-{{ $record->id }}" name="{{ $record->slug }}" {{ ($record->required == 1)? 'required' : '' }}>
															@if($record->options)
																@foreach(json_decode($record->options) as $opt_key=>$opt_value)
																	<option value="{{$opt_key}}" {{ ($record->value == $opt_key)? "selected" : "" }}>{{ title_case($opt_value) }}</option>
																@endforeach
															@endif
														<select>
													@elseif($record->type == 'checkbox')
														<input class="" id="input-field-{{ $record->id }}" name="{{ $record->slug }}" type="{{ $record->type }}" value="{{ $record->value }}" placeholder="{{ $record->label }}" {{ ($record->value == "true")? "checked='checked'" : "" }} {{ ($record->required == 1)? 'required' : '' }}>
													@elseif($record->type == 'tel')
														<input class="form-control" id="input-field-{{ $record->id }}" maxlength="250" name="{{ $record->slug }}" type="{{ $record->type }}" value="{{ $record->value }}" placeholder="{{ $record->label }}" minlength="7" maxlength="15" {{ ($record->required == 1)? 'required' : '' }}>
													@else
														<input class="form-control" id="input-field-{{ $record->id }}" maxlength="250" name="{{ $record->slug }}" type="{{ $record->type }}" value="{{ $record->value }}" placeholder="{{ $record->label }}" {{ ($record->required == 1)? 'required' : '' }}>
													@endif
													<span class="help-block" id="success-msg-{{ $record->id }}" style="display:none;">
														<strong class="text-success">{{ $record->label }} updated successfully</strong>
													</span>
													<span class="help-block" id="error-msg-{{ $record->id }}" style="display:none;">
														<strong class="text-danger">Invalid {{ $record->label }}</strong>
													</span>
												</div>
												<div class="col-sm-2">
													<img id="loader-img-{{$record->id}}" src="{{ url('public/uploads/spinner.gif') }}" style="display:none;height:50px;width:50px;" />
													<button type="button" id="btn-field-{{ $record->id }}" class="btn btn-success btn-field">Submit</button>
												</div>
											</div>
										@endif
									@endforeach
								@endif
							{{ Form::close() }}
							<!-- </form> -->
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="social_settings">
							<!-- <form class="form-horizontal"> -->
							{{ Form::open(array("method"=>"post","class"=>"form-horizontal","url"=>url('admin/profile_update'), "enctype"=>"multipart/form-data")) }}
								@if(!empty($records))
									@foreach($records as $record_key=>$record)
										@if($record->category == "S")
											<div class="form-group">
												<label class="col-sm-2 control-label" for="input-field-{{ $record->id }}">{{ $record->label }}</label>
												<div class="col-sm-8">
													@if($record->type == 'textarea')
														<textarea class="form-control" id="input-field-{{ $record->id }}" name="{{ $record->slug }}" placeholder="{{ $record->label }}" rows="2" cols="40" maxlength="1000" {{ ($record->required == 1)? 'required' : '' }}>{{ ($record->value) ? $record->value : '' }}</textarea>
													@elseif($record->type == 'select')
														<select class="form-control" id="input-field-{{ $record->id }}" name="{{ $record->slug }}" {{ ($record->required == 1)? 'required' : '' }}>
															@if($record->options)
																@foreach(json_decode($record->options) as $opt_key=>$opt_value)
																	<option value="{{$opt_key}}" {{ ($record->value == $opt_key)? "selected" : "" }}>{{ title_case($opt_value) }}</option>
																@endforeach
															@endif
														<select>
													@elseif($record->type == 'checkbox')
														<input class="" id="input-field-{{ $record->id }}" name="{{ $record->slug }}" type="{{ $record->type }}" value="{{ $record->value }}" placeholder="{{ $record->label }}" {{ ($record->value == "true")? "checked='checked'" : "" }} {{ ($record->required == 1)? 'required' : '' }}>
													@else
														<input class="form-control" id="input-field-{{ $record->id }}" maxlength="250" name="{{ $record->slug }}" type="{{ $record->type }}" value="{{ $record->value }}" placeholder="{{ $record->label }}" {{ ($record->required == 1)? 'required' : '' }}>
													@endif
													<span class="help-block" id="success-msg-{{ $record->id }}" style="display:none;">
														<strong class="text-success">{{ $record->label }} updated successfully</strong>
													</span>
													<span class="help-block" id="error-msg-{{ $record->id }}" style="display:none;">
														<strong class="text-danger">Invalid {{ $record->label }}</strong>
													</span>
												</div>
												<div class="col-sm-2">
													<img id="loader-img-{{$record->id}}" src="{{ url('public/uploads/spinner.gif') }}" style="display:none;height:50px;width:50px;" />
													<button type="button" id="btn-field-{{ $record->id }}" class="btn btn-success btn-field">Submit</button>
												</div>
											</div>
										@endif
									@endforeach
								@endif
							{{ Form::close() }}
							<!-- </form> -->
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

@endsection

@section('scripts')
	<script>
		$(document).ready(function(){
			$(".btn-field").on('click',function(e){
				var id 			=	$(this).attr("id").replace("btn-field-","");
				var loader_img 	=	$("#loader-img-"+id);
				var button 		=	$("#btn-field-"+id);
				var success_msg =	$("#success-msg-"+id);
				var error_msg 	=	$("#error-msg-"+id);
				var value 		=	$("#input-field-"+id).val();
				var type 		=	$("#input-field-"+id).attr("type");
				var required	=	$("#input-field-"+id).attr("required");

				/** Emoji Check Start **/
				// var regex = /(\u00a9|\u00ae|[\u2000-\u3300]|\ud83c[\ud000-\udfff]|\ud83d[\ud000-\udfff]|\ud83e[\ud000-\udfff])/g;
				// match = regex.exec(value);
				// if(match != null){
				// 	error_msg.show();
				// 	loader_img.hide();
				// 	button.show();
				// 	return false;
				// }
				/** Emoji Check End **/

				loader_img.show();
				button.hide();
				if(type == "checkbox"){
					if($("#input-field-"+id).is(":checked")){
						value 	=	true;
					}else{
						value 	=	false;
					}
				}
				if(required){
					if(!value || value.length == 0){
						error_msg.show();
						loader_img.hide();
						button.show();
						return false;
					}
				}
				switch(type){
					case "email" :
						var emailRegex =	/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
						if(value.length != 0 && !emailRegex.test(value)){
							error_msg.show();
							loader_img.hide();
							button.show();
							return false;
						}
						break;
					case "number" :
						// var numberRegex =	/^[0-9]+$/;
						// var numberRegex =	/^\d+(\.\d{1,2})?$/;
						var numberRegex =	/^\d+(\.\d{1,2})?$/;
						if( ( value.length != 0 || value >= 0 ) && ( !numberRegex.test(value) || value > 100000000 ) ){
							error_msg.show();
							loader_img.hide();
							button.show();
							return false;
						}
						value.replace(/^0+/, '');
						break;
					case "tel" :
						var numberRegex =	/^\+?[0-9]{5,15}$/;
						// var numberRegex =	/^\+?((\d\-|\d)+\d){7,15}$/ig;
						if(value.length != 0 && !numberRegex.test(value)){
							error_msg.show();
							loader_img.hide();
							button.show();
							return false;
						}
						break;
					case "url" :
						var urlRegex =	/^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/;
						if(value.length != 0 && !urlRegex.test(value)){
							console.log("hello");
							error_msg.show();
							loader_img.hide();
							button.show();
							return false;
						}
						break;
				}
				$.ajax({
					url: "{{ url('admin/global_settings') }}",
					method:'POST',
					data:	{ "_token" : "{{ csrf_token() }}", "id" : id, "value" : value, },
					success: function(data){
						console.log(data);
						error_msg.hide();
						success_msg.show();
						loader_img.hide();
						button.show();
						setTimeout(() => { success_msg.hide(); }, 1000);
					},
					error: function(error){
						console.log(error);
					}
				})
			})
		})
	</script>
@endsection