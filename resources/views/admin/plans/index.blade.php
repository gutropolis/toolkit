@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Plans</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Manage Plans</li>
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
											<h4 class="card-title">Manage Plans</h4>
											<h6 class="card-subtitle">Plans are name of plan</h6>
										</div>
										<div class="col-sm-7 text-right">
											<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addPlan"><i class="fa fa-plus"></i> Add New</button>    
										</div>
									</div>
									
									<div class="table-responsive m-t-40">
										<table id="plandata" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>id</th>
													<th>Plan Name</th>
													<th>Slug</th>
													<th>Description</th> 
													<th>Created</th>
													<th>Action</th>
												</tr>
											</thead>

										</table>

									</div>
									<!-- Add Model Start here ------->
									<div class="modal fade" id="addPlan" tabindex="-1" role="dialog" aria-labelledby="addModel">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title" id="exampleModalLabel1">Create New Plan</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																</div>
																{!! Form::open(array('route' => 'admin.plans.store','method'=>'POST','name'=>'planform','id'=>'planform')) !!}
																<div class="modal-body"> 
																		 <div class="form-group">
																			<label for="title" class="control-label">Title:</label>
																			<input name="title" class="form-control" required="" data-validation-required-message="Title is required" aria-invalid="false" type="text"> 
																		</div>
																		 <div class="form-group">
																			<h5>description <span class="text-danger">*</span></h5>
																			<div class="controls">
																				<textarea name="description" id="description" class="form-control" required="" placeholder="Put Description" aria-invalid="false"></textarea>
																			<div class="help-block"></div></div>
																		</div>  
																		<div class="row">
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Make Stripe Plan <span class="text-danger">*</span></h5>
																							<div class="controls">
																									<div class="switch">
																										<label>No
																											<input id="have_trial" name="is_stripe_plan" value="1" type="checkbox"><span class="lever"></span>Yes</label>
																									</div>
																							</div>
																						</div>
																				</div>
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Make Razor Plan <span class="text-danger">*</span></h5>
																							<div class="controls">
																									<div class="switch">
																										<label>No
																											<input id="have_trial" name="is_razor_plan" value="1" type="checkbox"><span class="lever"></span>Yes</label>
																									</div>
																							</div>
																						</div>
																				</div>
																		 </div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	 
																	<button type="submit" class="btn btn-primary">Submit</button>
																</div>
																{!! Form::close() !!}
															</div>
														</div>
									 </div>
									 
									<!-- Edit Model Here ------------>
									<div class="modal fade" id="myModalPlan" tabindex="-1" role="dialog" aria-labelledby="myModalPlan" aria-hidden="true">
									   
									  <div class="modal-dialog">
											<div class="modal-content" id="edithtml">
											   <!-- Server Side Code Here -->
											 
											   
											   <!--End here --->
											</div>
									  </div>
									</div>
									
									<!-- Edit Model Here ---------->
                 
                                    <!-- Delete Model -->
											 
											<!-- Modal Dialog -->
												<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
												  <div class="modal-dialog">
													<div class="modal-content">
													  <div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h4 class="modal-title">Delete Parmanently</h4>
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
   
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
   <!--Custom JavaScript -->
	 <script src="{{ URL::to('admin/assets/js/custom.min.js') }}"></script>
	 <script src="{{ URL::to('admin/assets/js/validation.js') }}"></script> 
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(), $(".skin-square input").iCheck({
            checkboxClass: "icheckbox_square-green",
            radioClass: "iradio_square-green"
        }), $(".touchspin").TouchSpin(), $(".switchBootstrap").bootstrapSwitch();
    }(window, document, jQuery);
    </script>
     <!-- This is data table -->
    <script src="{{ URL::to('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    
    <script src="{{ URL::to('admin/assets/js/module/datatable/plan_datatables.js') }}"></script>
    <!-- start - This is for export functionality only -->
      
    
@endsection 