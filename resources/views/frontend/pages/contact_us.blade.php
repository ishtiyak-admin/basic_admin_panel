@extends('layouts.app')
@section('content')
	<div class="warper">
		<div class="inner_warper">
			<div class="container">
				<div class="contact_page_content">
					<div class="contact_inner">
						<div class="row">
							<div class="col-md-6">
								<div class="contact_form_box">
									<h2>Contact Us</h2>
									{{ Form::open(array("url" => url('pages/contact-us'), "onsubmit" => '$(".loader_container").show();')) }}
										<div class="form-group ">
											{{ Form::label('name',"Your Name") }}
											{{ Form::text('name',null,array("id" => "name", "class" => "form-control")) }}
											@if($errors->has('name'))
												<span class="help-block">
													<strong class="text-danger">{{ $errors->first('name') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group ">
											{{ Form::label('email',"Email") }}
											{{ Form::text('email',null,array("id" => "email", "class" => "form-control")) }}
											@if($errors->has('email'))
												<span class="help-block">
													<strong class="text-danger">{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group">
											{{ Form::label('message',"Your Message") }}
											{{ Form::textarea('message',null,array("id" => "message", "class" => "form-control")) }}
											@if($errors->has('message'))
												<span class="help-block">
													<strong class="text-danger">{{ $errors->first('message') }}</strong>
												</span>
											@endif
										</div>
										<div class="form_submit_button">
											<button class="btn btn-primary">Submit</button>
										</div>
									{{ Form::close() }}
								</div>
							</div>
							<div class="col-md-6">
								<div class="address_info_box">
									<h2>Address Info</h2>
									<ul>
										<li>
											<figure>
												<i class="fas fa-map-marker-alt"></i>
											</figure>
											<figcaption>
												<p>{{ (getSettings('address'))? getSettings('address') : "" }}</p>
											</figcaption>
										</li>
										<li>
											<figure>
												<i class="fas fa-phone-volume"></i>
											</figure>
											<figcaption>
												<p>{{ (getSettings('contact-number'))? getSettings('contact-number') : "" }}</p>
											</figcaption>
										</li>
										<li>
											<figure>
												<i class="far fa-envelope"></i>
											</figure>
											<figcaption>
												<p><a href="mailto:{{ (getSettings('admin-receive-email'))? getSettings('admin-receive-email') : '' }}">{{ (getSettings('admin-receive-email'))? getSettings('admin-receive-email') : "" }}</a></p>
											</figcaption>
										</li>
									</ul>
								</div>
							</div>
						</div> 
					</div>
				</div>
			</div> 
		</div> 
	</div>
@endsection
@section('scripts')

@endsection