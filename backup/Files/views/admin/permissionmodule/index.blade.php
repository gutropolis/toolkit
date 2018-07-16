@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h3 class="text-themecolor">Manage Permission mOdule</h3>
			</div>
			<div class="col-md-7 align-self-center">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
					<li class="breadcrumb-item active">Manage Permission Module</li>
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
					<h4 class="card-title">Module Mangement</h4>
					<h6 class="card-subtitle">Module Management Data </h6> 
					<a class="btn btn-success btn-md pull-right" href="{{ route('admin.permissionmodule.create') }}">CreatePermission Module</a>

					<div class="table-responsive m-t-40">
						<table id="myTable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Title</th>
									<th>Description</th>
									<th>Created On</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($permissionmodule as $key => $module)
								<tr>
									<td>{{ ++$i }}</td>
									<td>{{ $module->title }}</td>
									<td>{{ $module->description }}</td>
									<td>{{ $module->created_at}}</td>
									<td>

								

										<a class="btn btn-primary" href="{{ route('admin.permissionmodule.edit',$module->id) }}">Edit</a>
										 
										{!! Form::open(['method' => 'DELETE','route' => ['admin.permissionmodule.destroy', $module->id],'style'=>'display:inline']) !!} {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} {!! Form::close() !!} 

									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! $permissionmodule->render() !!}
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