@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Lead Management</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Lead Management</li>
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
											<h4 class="card-title">Lead Management</h4>
											
										</div>
										<div class="col-sm-7 text-right">
											
											<a class="btn btn-info" href="{{ route('admin.lead.create') }}"><i class="fa fa-plus"></i>Add New</a>    
										</div>
									</div>
									
									<div class="table-responsive m-t-40">
										<table id="leaddata" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>id</th>
													<th>First Name</th>
													<th>Last Name</th> 
													<th>Lead Owner</th> 
													<th>Company</th> 
													<th>Created</th>
													<th>Action</th>
												</tr>
											</thead>

										</table>

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
    
     <script src="{{ URL::to('admin/assets/js/module/datatable/lead_datatables.js') }}"></script>
    <!-- start - This is for export functionality only -->
      
    
@endsection 