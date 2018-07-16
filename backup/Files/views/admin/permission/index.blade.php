@extends('admin.layouts.app')
@section('header-style') 
@endsection
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
   <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor">Manage Permissions </h3>
   </div>
   <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
         <li class="breadcrumb-item active">Manage Permission </li>
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
         <h4 class="card-title">Permission Mangement</h4>
         <h6 class="card-subtitle">Permission Management Data </h6>
       
      <form method="post" action="{{ route('admin.permission.showdata') }}">
	  {{ csrf_field() }}
         <div class="form-group">
            <h5>Select Module<span class="text-danger">*</span></h5>
            <div class="controls">
               <select name="module" class="form-control">
                  <option >Select...</option>
                  @foreach($module as $modules)
                  <option value="{{ $modules->id }}">{{ $modules->title }}</option>
                  @endforeach
               </select>
            </div>
			
			
				<div class="text-xs-right">
			<button type="submit" class="btn btn-success">Submit</button>
													
												</div>
			
         </div>
       {{ Form::close() }}
		 
		 
		   <a class="btn btn-success btn-md pull-right" href="{{ route('admin.permission.create') }}">Create Permission </a>
         <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Display Name</th>
                     <th>Guard Name</th>
                     <th>Description</th>
                     <th>Created On</th>
                     <th>Action</th>
                  </tr>
               </thead>
			 
			   @if(@data != '')
				     <tbody>
                  @foreach ($data as $key => $datas)
                  <tr>
                     <td>{{ ++$i }}</td>
                     <td>{{ $datas->name }}</td>
                     <td>{{ $datas->display_name }}</td>
                     <td>{{ $datas->guard_name }}</td>
                     <td>{{ $datas->description }}</td>
                     <td>{{ $datas->created_at}}</td>
                     <td>
                        <a class="btn btn-primary" href="{{ route('admin.permission.edit',$datas->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['admin.permission.destroy', $datas->id],'style'=>'display:inline']) !!} {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} {!! Form::close() !!} 
                     </td>
                  </tr>
                  @endforeach
               </tbody>
				   
			   @endif
			   
			   
            </table>
			
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