@extends('layouts.admin')

@section('content')
	<!-- Main content -->
    <section class="content">
      	<div class="row">
        	<div class="col-xs-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-header">
						<h4>Search</h4>
					</div>
					<div class="box-body">
						{{ Form::open(array( "url" => $base_url, "method" => "get", "id"=>"search_form" )) }}
							<div class="col-lg-3 col-md-6 col-xs-12">
								{{ Form::label("name","Name") }}
								{{ Form::text("name",request()->name,array("class"=>"form-control","placeholder"=>"Name")) }}
							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								<label>&nbsp;</label>
								<button class="btn btn-primary form-control">Search</button>
							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								<label>&nbsp;</label>
								<a href="{{ $base_url }}" class="btn btn-primary form-control">Reset</a>
							</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
      	<div class="row">
        	<div class="col-xs-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						<table id="listind_table" class="table table-bordered table-hover datatable cell-border compact stripe hover">
							<thead>
								<tr>
									<th>{!! sortableColumn($base_url,'id','S.No.',true) !!}</th>
									<th>{!! sortableColumn($base_url,'name','Name',true) !!}</th>
									<th>{!! sortableColumn($base_url,'email','Email',true) !!}</th>
									<th>{!! sortableColumn($base_url,'view','View',false) !!}</th>
									<th>{!! sortableColumn($base_url,'reply','Reply',false) !!}</th>
								</tr>
							</thead>
							<tbody>
								@if($records->count() > 0)
									@foreach($records as $record)
										<?php $counter++; ?>
										<tr>
											<td>{{ $counter }}</td>
											<td>{{ $record->name }}</td>
											<td>{{ $record->email }}</td>
											<td>
												@if($record['replied'] == 1)
													<span class='text-success'>Already Replied</span>
												@else
													<a class='btn btn-primary' onclick='reply_to_enquiry("{{ base64_encode($record->id) }}","{{ $record->name }}","{{ $record->email }}")' ><i class='fa '>&nbsp;</i>Reply</a>
												@endif
											</td>
											<td>
												<a class='btn btn-info' href="{{ url($base_url.'/view/'.base64_encode($record->id)).getUrlParams() }}" title="View"><i class='fa fa-eye'></i></a>
											</td>
										</tr>
									@endforeach
								@else
									<tr><td colspan="100%"><div class="text-center"><h4>No {{$page_title}} found.</h4></div></td></tr>
								@endif
							</tbody>
						</table>
						<div class="pagination">
							{{ $records->appends(request()->except('page'))->links() }}
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

	<!-- Modal -->
	<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h3 class="modal-title text-center" id="exampleModalLongTitle">Reply To User</h3>
		      	</div>
		      	<div class="modal-body">
		        	{{ Form::open(array("url" => $base_url.getUrlParams(), "id" => "replyForm", "onsubmit" => '$("#replyModal").find(".submit_btn").attr("disabled","disabled"); $(".loader_container").show();', "enctype" => "multipart/form-data" )) }}
		        		<div class="form-group">
		        			{{ Form::label("name","Name") }}
		        			{{ Form::text("name",null,array( "class" => "form-control", "id" => "replyName", "readonly" => "readonly" )) }}
		        		</div>
		        		<div class="form-group">
		        			{{ Form::label("email","Email") }}
		        			{{ Form::text("email",null,array( "class" => "form-control", "id" => "replyEmail", "readonly" => "readonly" )) }}
		        		</div>
		        		<div class="form-group">
		        			{{ Form::label("content","Content") }}
		        			{{ Form::textarea("content",null,array( "class" => "form-control", "id" => "replyContent", "required" => 
		        			"required" )) }}
		        		</div>
		        		<div class="form-group">
		        			{{ Form::label("attachment","Attachment") }}
		        			{{ Form::file("attachment",array( "class" => "mail_attach", "id" => "attachment" )) }}
		        		</div>
		        		<div class="form-group text-center">
		        			<button type="submit" class="btn btn-primary submit_btn">Submit</button>
		        			<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
		        		</div>
		        	{{ Form::close() }}
		      	</div>
		    </div>
	  	</div>
	</div>
@endsection

@section('scripts')
	<script>
		function reply_to_enquiry(id,name,email){
			var confirm_msg = "Are you sure you want to reply to this enquiry?";
			// if( confirm(confirm_msg) === true ){
				var getUrlParams = "{{ getUrlParams() }}";
				getUrlParams = decodeHTMLEntities(getUrlParams);
				var action = "{{ url('admin/'.$slug.'/reply') }}"+"/"+id+""+getUrlParams;
				$("#replyModal").find("#replyForm").attr("action",action);
				$("#replyModal").find("#replyName").val(name);
				$("#replyModal").find("#replyEmail").val(email);
				// $("#replyModal").find("#replyMsg").html(message);
				$("#replyModal").find("#replyContent").val("");
				$("#replyModal").find("#attachment").val("");
				$("#replyModal").modal("show");
			// }
		}
	</script>
@endsection