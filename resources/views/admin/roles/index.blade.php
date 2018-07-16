@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Roles</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Manage Roles</li>
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
												<h4 class="card-title">Roles Management</h4>
												<h6 class="card-subtitle">Roles Management Data </h6>
										</div>
										<div class="col-sm-7 text-right">
											  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModel"><i class="fa fa-plus"></i> Create New Role</button>		
										</div>
								</div>
								<div class="response"></div>
                                <div class="table-responsive m-t-40">
                                    <table id="RoleTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
											<th>Id</th>
											<th>Role Name</th>
											<th>Guard Name</th>
											<th>Created On</th>
											<th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        
							
                                    </table>
									
                                </div>
								
								
								<!-- Add Model Start here ------->
								
								
								<div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="addModel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">New message</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            	{!! Form::open(array('route' => 'admin.roles.store','method'=>'POST','class' => 'form-material m-t-40')) !!}
                                                     <div class="form-group">
															<label class="control-label" >Role Name</label>
													 
															{!! Form::text('name', null, array( 'id'=>'name','class' => 'form-control')) !!}
															<span class="validation_error" id="title_error"></span>
													  </div>
													  
                                                
                                            </div>
                                            
											 <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary store_submit">Add Role</button>
                                            </div>
                                                 
                                            
											{!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
								
								<!-- End Model Here ------------>
								<!-- Edit Model Here ------------>
							
								<div class="modal fade" id="edit_roles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									 
									<div class="modal-dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content" id="edithtml">
											   <!-- Server Side Code Here -->
										     
											   
											   <!--End here --->
											</div>
										</div>
									</div>
								
								
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
    <script src="{{ URL::to('admin/assets/js/module/datatable/roles_datatables.js') }}"></script>
    <!-- start - This is for export functionality only -->
@endsection 