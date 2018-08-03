@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Plan Package</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Manage Plan Package</li>
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
											<h4 class="card-title">Manage Plan Package</h4>
											<h6 class="card-subtitle">Plans are name of plan</h6>
										</div>
										<div class="col-sm-7 text-right">
											<button type="button" id="btn_add" class="btn btn-info"  ><i class="fa fa-plus"></i> Add New</button>    
										</div>
									</div>
									
									<div class="table-responsive m-t-40">
										<table id="planpackagdata" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>id</th>
													<th>Plan Name</th>
													<th>Price</th> 
													<th>Package Type</th> 
													<th>User Allowed</th> 
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
																	<h4 class="modal-title" id="exampleModalLabel1">Create New Package</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																</div>
																{!! Form::open(array('route' => 'admin.planpackage.store','method'=>'POST','name'=>'planpackageform','id'=>'planpackageform')) !!}
																<div class="modal-body">
                                                                           <div class="form-group">
																				<h5>Select Plan <span class="text-danger">*</span></h5>
																				<div class="controls"> 
																						<select name="plan_type" id="plan_type" required="" class="form-control" aria-invalid="false">
                                                                                        @if (count($planData) > 0)
                                                                                             <option value="">Choose Plan</option>
                                                                                           @foreach ($planData as $objplan) 
																								<option value="{{$objplan->id}}">{{$objplan->title}}</option> 
                                                                                            @endforeach
																						
																						@endif
																						</select>
																						<div class="help-block"></div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Has Trial <span class="text-danger">*</span></h5>
																							<div class="controls">
																									<div class="switch">
																										<label>OFF
																											<input id="have_trial" name="have_trial" value="1" type="checkbox"><span class="lever"></span>ON</label>
																									</div>
																							</div>
																						</div>
																				</div>
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Trial Interval <span class="text-danger">*</span></h5>
																							<div class="controls">
																								<input id="trial_days" name="trial_days" class="form-control" required="" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="No Characters Allowed, Only Numbers" aria-invalid="false" type="text"> 
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																			</div> 
                                                                            <div class="row">
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Package Type <span class="text-danger">*</span></h5>
																							<div class="controls">
																								 
																								<select name="package_type" id="package_type" required="" class="form-control" aria-invalid="false">
																									 
																										 <option value="">Choose Plan</option>
																										 <option value="day">day(1 day)</option> 
																									      <option value="week">Weekly(7 days)</option> 
																										  <option value="month">Monthly(30 days)</option>   
																										  <option value="year">Annually(365 days)</option>  
																								 </select>
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Price <span class="text-danger">*</span></h5>
																							<div class="controls">
																								<input  id="price" name="price" class="form-control" required="" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="No Characters Allowed, Only Numbers" aria-invalid="false" type="text"> 
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>User Limit <span class="text-danger">*</span></h5>
																							<div class="controls">
																								<input   id="users_limit"  name="users_limit" class="form-control" required="" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="No Characters Allowed, Only Numbers" aria-invalid="false" type="text"> 
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Is Support Available <span class="text-danger">*</span></h5>
																							<div class="controls">
																								 <div class="switch">
																										<label>OFF
																											<input   id="support_available"   value="1" name ="support_available" type="checkbox"><span class="lever"></span>ON</label>
																								 </div>
																							</div>
																						</div>
																				</div>
																			</div> 
																			<div class="row">
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Make Stripe Plan <span class="text-danger">*</span></h5>
																							<div class="controls">
																									<div class="switch">
																										<label>No
																											<input id="is_stripe_plan" name="is_stripe_plan" value="1" type="checkbox"><span class="lever"></span>Yes</label>
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
																											<input id="is_razor_plan" name="is_razor_plan" value="1" type="checkbox"><span class="lever"></span>Yes</label>
																									</div>
																							</div>
																						</div>
																				</div>
																		 </div>
																		 <div class="row">
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Stripe Package <span class="text-danger">*</span></h5>
																							<div class="controls">
																								 
																								<select name="package_type" id="package_type" required="" class="form-control" aria-invalid="false">
																									 
																										 <option value="">Choose Plan</option>
																										 <option value="day">day(1 day)</option> 
																									      <option value="week">Weekly(7 days)</option> 
																										  <option value="month">Monthly(30 days)</option>   
																										  <option value="year">Annually(365 days)</option>  
																								 </select>
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Price <span class="text-danger">*</span></h5>
																							<div class="controls">
																								<input  id="price" name="price" class="form-control" required="" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="No Characters Allowed, Only Numbers" aria-invalid="false" type="text"> 
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																			</div>
																		 
																			 
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	 
																	<button type="submit" id="btn-save" class="btn btn-primary">Submit</button>
																	<input type="hidden" id="hdnpkgid" name="hdnpkgid" value="0">
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
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>
     <!-- This is data table -->
    <script src="{{ URL::to('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    
    <script src="{{ URL::to('admin/assets/js/module/datatable/planpackage_datatables.js') }}"></script>
    <!-- start - This is for export functionality only -->
      
    
@endsection 