@extends('layouts.admin')

@section('content')
	<!-- Main content -->
	<section class="content">
	  	<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<a class="btn btn-success" href="{{ url('admin').'/'.$slug.'/create'.getUrlParams() }}">
							<i class="fa fa-plus">&nbsp;</i>Create
						</a>
						<a class="btn btn-primary" href="{{ url('admin').'/'.$slug.'/export/csv' }}" onclick="return confirm('Are you sure you want to export all records?')">
							<i class="fa fa-download">&nbsp;</i>Export CSV
						</a>
					</div>
				</div>
			</div>
		</div>
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
								{{ Form::label("email","Email") }}
								{{ Form::text("email",request()->email,array("class"=>"form-control","placeholder"=>"Email")) }}
							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								{{ Form::label("mobile_number","Mobile Number") }}
								{{ Form::text("mobile_number",request()->mobile_number,array("class"=>"form-control","placeholder"=>"Mobile Number")) }}
							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								{{ Form::label("status","Status") }}
								{{ Form::select("status",[ "all" => "All", "active" => "Active", "deactive" => "Deactivate" ],request()->status,array("class"=>"form-control")) }}
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
									<th>{!! sortableColumn($base_url,'image','Image',false) !!}</th>
									<th>{!! sortableColumn($base_url,'name','Name',true) !!}</th>
									<th>{!! sortableColumn($base_url,'email','Email',true) !!}</th>
									<th>{!! sortableColumn($base_url,'mobile_number','Mobile Number',true) !!}</th>
									<th>{!! sortableColumn($base_url,'status','Status',false) !!}</th>
									<th>{!! sortableColumn($base_url,'action','Action',false) !!}</th>
								</tr>
							</thead>
							<tbody>
								@if($records->count() > 0)
									@foreach($records as $record)
										<?php $counter++; ?>
										<tr>
											<td>{{ $counter }}</td>
											<td>
												@if($record->image)
													<a href="{{ url('public/uploads/user_images').'/'.$record->image }}" data-lightbox="image-1" data-title="{{ $record->name }}"><img src="{{ url('public/uploads/user_images').'/'.$record->image }}" style="width:100px;height:100px;" /></a>
												@else
													<a href="{{ url('public/uploads/dummy_user.png') }}" data-lightbox="image-1" data-title="{{ $record->name }}"><img src="{{ url('public/uploads/dummy_user.png') }}" style="width:100px;height:100px;" /></a>
												@endif
											</td>
											<td>{{ title_case($record->name) }}</td>
											<td>{{ $record->email }}</td>
											<td>{{ $record->mobile_number }}</td>
											<td>
												{{ ($record['status'] == 1)? 'Active' : 'Deactivate' }}
											</td>
											<td>
												<a class='btn btn-info' href="{{ url($base_url.'/view/'.base64_encode($record->id)).getUrlParams() }}" title="View"><i class='fa fa-eye'></i></a>
												<a class='btn btn-primary' href="{{ url($base_url.'/edit/'.base64_encode($record->id)).getUrlParams() }}" title="Edit"><i class='fa fa-edit'></i></a>
												<a class='btn btn-danger' onclick='return confirm("Are you sure you want to delete this record?")' href="{{ url($base_url.'/delete/'.base64_encode($record->id)).getUrlParams() }}" title="Delete"><i class='fa fa-trash'></i></a>
												@if($record->status == 1)
													<a class='btn btn-danger' onclick='return confirm("Are you sure you want to deactivate this record?")' href="{{ url($base_url.'/status_update/'.base64_encode($record->id).'/0').getUrlParams() }}" title="Deactivate">
														<i class='fa fa-lock'></i>
													</a>
												@else
													<a class='btn btn-success' onclick='return confirm("Are you sure you want to activate this record?")' href="{{ url($base_url.'/status_update/'.base64_encode($record->id).'/1').getUrlParams() }}" title="Activate">
														<i class='fa fa-unlock-alt'></i>
													</a>
												@endif
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
@endsection

@section('scripts')

@endsection