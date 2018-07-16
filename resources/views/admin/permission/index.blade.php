@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Permission </h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Permission </li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">  
								<div class="row">
										<div class="col-sm-5">
												<h4 class="card-title">Permission  Management</h4>
												<h6 class="card-subtitle">Permission Management Data </h6>
										</div>
										<div class="col-sm-7 text-right">
											  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModule"><i class="fa fa-plus"></i> Create New Permission</button>		
										</div>
								</div>
								<div class="response"></div>
                                <div class="table-responsive m-t-40">
                                    <table id="PermissionTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
                                      
                                    </table>
									
                                </div>
								
								
								<!-- Add Model Start here ------->
								<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="addModel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Create Permission Module</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            	{!! Form::open(array('route' => 'admin.permission.store','method'=>'POST')) !!}
												<div class="form-group">
													<h5>Select Module<span class="text-danger">*</span></h5>
													<div class="controls">
														<select name="module"   class="form-control">
														<option>Select...</option>
															@foreach($module as $modules)
														 <option value="{{ $modules->id }}">{{ $modules->title }}</option>
														@endforeach
														</select>
														</div>

												</div>
												
												<div class="form-group">
													<h5>Title<span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name="name" class="form-control"> </div>

												</div>
												<div class="form-group">
													<h5>Display Name<span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name="display_name" class="form-control"> </div>

												</div>
												<div class="form-group">
													<h5>Description <span class="text-danger">*</span></h5>
													<div class="controls">
														<textarea rows="4" cols="50" name ="description" class="form-control"></textarea>
													</div>
												</div>
												<div class="form-group">
													<h5>Order <span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name ="order"   name="order" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<h5>Guard Name <span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name ="guard_name"   name="guard_name" class="form-control">
													</div>
												</div>
                                            <div class="modal-footer">
											 
											
                                                <div class="modal-footer">
												 <button type="submit" class="btn btn-primary"  >Submit</button>
                                                <a type="button" href="{{ route('admin.permission.index') }}" class="btn btn-default" data-dismiss="modal">Cancel</a>
                                               
                                            </div>
                                            </div>
											{!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
								</div>
								
								<!-- End Model Here ------------>
								<!-- Edit Model Here ------------>
								<div class="modal fade" id="edit_permission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									 
									<div class="modal-dialog">
										 <div class="modal-content" id="edit_html">
                                            
								<!-- Edit Model Here ---------->
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                 
            </div> 
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection
@section('footer_js') 
   
     
     <!-- This is data table -->
    <script src="{{ URL::to('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ URL::to('admin/assets/js/module/datatable/permission_datatables.js') }}"></script>
    <!-- start - This is for export functionality only -->
      
	
@endsection 