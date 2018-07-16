@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h3 class="text-themecolor">Manage Role</h3>
			</div>
			<div class="col-md-7 align-self-center">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
					<li class="breadcrumb-item active">Manage Role</li>
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
					<a class="btn btn-success btn-md pull-right" href="{{ route('admin.roles.create') }}"><i class="fa fa-user"></i>  Create New Role</a> @endcan

					<div class="table-responsive m-t-40">
						<table id="myTable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Role Name</th>
									<th>Guard Name</th>
									<th>Created On</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($roles as $key => $role)
								<tr>
									<td>{{ ++$i }}</td>
									<td>{{ $role->name }}</td>
									<td>{{ $role->guard_name }}</td>
									<td>{{ $role->created_at}}</td>
									<td>

										<a class="btn btn-info" href="{{ route('admin.roles.show',$role->id) }}">Show</a> @can('role-edit')

										<a class="btn btn-primary" href="{{ route('admin.roles.edit',$role->id) }}">Edit</a> @endcan @can('role-delete') {!! Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']) !!} {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} {!! Form::close() !!} @endcan

									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! $roles->render() !!}
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