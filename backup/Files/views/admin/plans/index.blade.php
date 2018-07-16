@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h3 class="text-themecolor">Manage Plan Types</h3>
			</div>
			<div class="col-md-7 align-self-center">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
					<li class="breadcrumb-item active">Manage Plan Types</li>
				</ol>
			</div>
			<div>
				<button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Container fluid  -->
		<!-- ============================================================== -->
		<div class="container-fluid">
			<!-- ============================================================== -->
			<!-- Start Page Content -->
			<!-- ============================================================== -->
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Role Mangement</h4>
					<h6 class="card-subtitle">Role Management Data </h6> @can('role-create')
					<a class="btn btn-success btn-md pull-right" href="{{ route('admin.plans.create') }}"><i class="fa fa-user"></i>  Create New Plan Type</a> @endcan

					<div class="table-responsive m-t-40">
						<table id="myTable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Title</th>
									<th>Description</th>
									<th>Created On</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($plans as $key => $role)
								<tr>
									<td>{{ ++$i }}</td>
									<td>{{ $role->title }}</td>
									<td>{{ $role->description }}</td>
									<td>{{ $role->created_at}}</td>
									<td>

										<a class="btn btn-info" href="{{ route('admin.plans.show',$role->id) }}">Show</a> @can('role-edit')

										<a class="btn btn-primary" href="{{ route('admin.plans.edit',$role->id) }}">Edit</a> @endcan @can('role-delete') {!! Form::open(['method' => 'DELETE','route' => ['admin.plans.destroy', $role->id],'style'=>'display:inline']) !!} {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} {!! Form::close() !!} @endcan

									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! $plans->render() !!}
					</div>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- End Right sidebar -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Container fluid  -->
		<!-- ============================================================== -->
@endsection
@section('footer_js') 
   
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    
@endsection 