@extends('front.layouts.sidebar')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Domain</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Manage Domain</li>
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
											<h4 class="card-title">Manage Domain</h4>
											<h6 class="card-subtitle">Tracking website domain</h6>
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
													<th>Domain Name</th> 
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
																 {!! Form::open(array('route' => 'admin.plans.store','method'=>'POST','name'=>'planform','id'=>'planform')) !!}
																<div class="modal-body"> 
																		 <div class="form-group">
																			<label for="title" class="control-label">Domain:</label>
																			<input name="title" class="form-control" required="" data-validation-required-message="Title is required" aria-invalid="false" type="text"> 
																		</div>
																		 <div class="form-group">
																			<h5>description <span class="text-danger">*</span></h5>
																			<div class="controls">
																				<textarea name="description" id="description" class="form-control" required="" placeholder="Put Description" aria-invalid="false"></textarea>
																			<div class="help-block"></div></div>
																		</div>  
																		 
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	 <input type="hidden" id="hdnpkgid" name="hdnpkgid" value="0">
																	<button type="submit" class="btn btn-primary">Submit</button>
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