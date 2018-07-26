@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Tenants</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Tenants</li>
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
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">  
									<div class="row">
										<div class="col-sm-5">
											<h4 class="card-title">Manage Tenants</h4>
											<h6 class="card-subtitle">Tanents</h6>
										</div>
										<div class="col-sm-7 text-right">
											<button type="button" id="btn_add" class="btn btn-info"  ><i class="fa fa-plus"></i> Add New</button>    
										</div>

										<div class="table-responsive m-t-40">
										<table id="tenantdata" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>ID</th>
													<th>DB NAME</th>
													<th>DB HOST</th> 
													<th>DB_USERNAME</th> 
													<th>DB DRIVER</th> 
													<th>Created</th>
													<th>Action</th>
												</tr>
											</thead>

										</table>

									</div>

									<!-- Add Model Start here ------->
									 <!-- Passing BASE URL to AJAX -->

									<input id="hdnurl" type="hidden" value="{{ \Request::url() }}">
									<div class="modal fade" id="mymodel" tabindex="-1" role="dialog" aria-labelledby="mymodel">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title" id="exampleModalLabel1">Create New Connection</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																</div>
															<!-- server side validation start here -->
															 <div class="alert alert-danger print-error-msg" style="display:none">
									                              <ul></ul>
									                          </div>
									                          <!-- server side validation End here -->
																{!! Form::open(array('route' => 'admin.tenant.store','method'=>'POST','name'=>'tenantform','id'=>'tenantform','novalidate')) !!}
																<div class="modal-body">
                                                                          
																			<div class="row">
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>DB Host  <span class="text-danger">*</span></h5>
																							<div class="controls">
																									<input type="text" id="db_host" name="db_host" class="form-control" required data-validation-required-message="DB Host is required"/>
																							</div>
																						</div>
																				</div>
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>DB Username <span class="text-danger">*</span></h5>
																							<div class="controls">
																								<input id="db_username" name="db_username" class="form-control" type="text" required data-validation-required-message="DB Username is required"> 
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																			</div> 
                                                                            <div class="row">
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>DB Password <span class="text-danger">*</span></h5>
																							<div class="controls">
																								<input  id="db_password" name="db_password" class="form-control" type="text" required data-validation-required-message="DB Password is required"/> 
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>DB Port <span class="text-danger">*</span></h5>
																							<div class="controls">
																								<input  id="db_port" name="db_port" class="form-control"  type="text" required data-validation-required-message="DB Port is required"> 
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>DB Driver <span class="text-danger">*</span></h5>
																							<div class="controls">
																								<input   id="db_driver"  name="db_driver" class="form-control" type="text" required data-validation-required-message="DB Driver is required"> 
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																				<div class="col-xs-12 col-sm-6 col-md-6">
																					<div class="form-group">
																							<h5>DB Name <span class="text-danger">*</span></h5>
																							<div class="controls">
																								<input   id="db_name"  name="db_name" class="form-control" type="text" required data-validation-required-message="DB Name is required"> 
																								<div class="help-block"></div>
																							</div>
																						</div>	
																				</div>
																			</div> 
																		 
																		 
																			 
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	 
																	<button type="submit" id="btn-save" class="btn btn-primary">Submit</button>
																	<input type="hidden" id="user_id" name="user_id" value="101">
																	<input type="hidden" id="role_id" name="role_id" value="105">
																	<input type="hidden" id="tenantid" name="hdnpkgid" value="0">
																</div>
																{!! Form::close() !!}
															</div>
														</div>
									              </div>

									              	<!-- Delete Model -->
											 
											<!-- Modal Dialog -->
												<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
												  <div class="modal-dialog">
													<div class="modal-content">
													  <div class="modal-header">
													  	<h4 class="modal-title">Delete Parmanently</h4>
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														
													  </div>
													  <div class="modal-body">
														<p>Are you sure about this ?</p>
													  </div>
													  <div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
														<button type="button" class="btn btn-danger" id="confirm">Delete</button>
													  </div>
													</div>
												  </div>
												</div>



									</div>

								</div>
						</div>
				</div>
			</div>

       </div> 
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection
@section('footer_js') 
   
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
   <!--Custom JavaScript -->
	 <script src="{{ URL::to('admin/assets/js/custom.min.js') }}"></script>
	 <script src="{{ URL::to('admin/assets/js/validation.js') }}"></script> 
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>
     <!-- This is data table -->
    <script src="{{ URL::to('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    
    <script src="{{ URL::to('admin/assets/js/module/datatable/tenants_datatables.js') }}"></script>
    <!-- start - This is for export functionality only -->
      
    
@endsection 