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
         <div class="form-group">
            <h5>Select Module<span class="text-danger">*</span></h5>
            <div class="controls">
               <select id= "module_data" name="module" class="form-control"  >
                  <option >Select...</option>
                  @foreach($module as $modules)
                  <option value="{{ $modules->id }}">{{ $modules->title }}</option>
                  @endforeach
               </select>
            </div>
         </div>
         <a class="btn btn-success btn-md pull-right" href="{{ route('admin.permission.create') }}">Create Permission </a>
         <div class="table-responsive m-t-40">
            <table id="table" class="table table-bordered table-striped">
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
               <tbody>
               </tbody>
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
<script >
   $(document).ready(function()
   {
   	
   	
   $("#module_data").change(function()
   {
   	
   var id=$(this).val();
   console.log(id);
   var dataString = id;
   console.log(dataString);
   
   $.ajax
   ({
   type: "GET",
   url: "{{url('admin/permission/')}}/"+dataString,
   
   success: function(data)
   {
   	
   	 var table = $('#table').DataTable({
		
		 
		 processing: true,
            serverSide: true,
   	 "ajax": "{{url('admin/permission/')}}/"+dataString,
   	 columns: [
                   { data: 'id', name: 'id' },
                   { data: 'name', name: 'name' },
                   { data: 'display_name', name: 'display_name' },
                   { data: 'guard_name', name: 'guard_name' },
                   { data: 'description', name: 'description'},
                   { data: 'created_at', name:'created_at'},
                   { data: 'actions', name: 'actions', orderable: false, searchable: false }
               ]
   			 });
           table.on( 'draw', function () {
               $('.livicon').each(function(){
                   $(this).updateLivicon();
               });
           } );
   	 
   	
   
   	
   }   
    
   });
   
   });
   
   });
</script>
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content"></div>
   </div>
</div>
<script>
   $(function () {
   	$('body').on('hidden.bs.modal', '.modal', function () {
   		$(this).removeData('bs.modal');
   	});
   });
</script>
@endsection