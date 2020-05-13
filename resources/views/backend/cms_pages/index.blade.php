@extends('layouts.admin')

@section('content')
	<!-- Main content -->
    <section class="content">
		<?php /* 
      	<div class="row">
        	<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<a class="btn btn-success" href="{{ url('admin').'/'.$slug.'/create'.getUrlParams() }}">
							<i class="fa fa-plus">&nbsp;</i>Add
						</a>
					</div>
				</div>
			</div>
		</div>
		*/ ?>
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
								{{ Form::label("title","Title") }}
								{{ Form::text("title",request()->title,array("class"=>"form-control","placeholder"=>"Title")) }}
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
									<th>{!! sortableColumn($base_url,'title','Title',true) !!}</th>
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
											<td>{{ title_case($record->title) }}</td>
											<td>{{ ($record['status'] == 1)? 'Active' : 'Deactivate' }}</td>
											<td>
												<a class='btn btn-info' href="{{ url($base_url.'/view/'.base64_encode($record->id)).getUrlParams() }}" title="View"><i class='fa fa-eye'></i></a>
												<a class='btn btn-primary' href="{{ url($base_url.'/edit/'.base64_encode($record->id)).getUrlParams() }}" title="Edit"><i class='fa fa-edit'></i></a>
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