@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Settings</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Settings</li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-xlg-2 col-lg-3 col-md-4">
                                    <div class="card-body inbox-panel"><a href="app-compose.html" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Compose</a>
                                        <ul class="list-group list-group-full">
                                            <li class="list-group-item active"> <a href="javascript:void(0)"><i class="mdi mdi-gmail"></i> Inbox </a><span class="badge badge-success ml-auto">6</span></li>
                                            <li class="list-group-item">
                                                <a href="/admin/emailtemplate"> <i class="mdi mdi-star"></i> Email Template </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="javascript:void(0)"> <i class="mdi mdi-send"></i> Draft </a><span class="badge badge-danger ml-auto">3</span></li>
                                            <li class="list-group-item ">
                                                <a href="javascript:void(0)"> <i class="mdi mdi-file-document-box"></i> Sent Mail </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="javascript:void(0)"> <i class="mdi mdi-delete"></i> Trash </a>
                                            </li>
                                        </ul>
                                        <h3 class="card-title m-t-40">Labels</h3>
                                        <div class="list-group b-0 mail-list"> <a href="#" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Work</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Family</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-purple m-r-10"></span>Private</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-danger m-r-10"></span>Friends</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-success m-r-10"></span>Corporate</a> </div>
                                    </div>
                                </div>
                                <div class="col-xlg-10 col-lg-9 col-md-8 bg-light-part b-l">
                                    <div class="card-body">
                                       
                                     <div class="row">
										<div class="col-sm-5">
											<h4 class="card-title">Email Template</h4>
											<h6 class="card-subtitle"></h6>
										</div>
										<div class="col-sm-7 text-right">
											<button type="button" id="btn_add" class="btn btn-info"  ><i class="fa fa-plus"></i> Add New</button>    
										</div>
									</div>
									 
                                
                                    </div>
                                   
                                           
                                           
                               <div class="col-md-12">
													
																					
								<div class="table-responsive m-t-40">
									<table id="emailtemplate_data" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>id</th>
												<th>Title</th>
												<th>Type</th> 
												<th>Subject</th> 
												<th>From Name</th> 
												<th>Created At</th>
												<th>Action</th>
											</tr>
										</thead>
									</table>
								</div>
								<!-- Add Model Start here ------->
								<!-- Passing BASE URL to AJAX -->
								<input id="hdnurl" type="hidden" value="{{ \Request::url() }}">
								<div class="modal fade" id="emailtemplate_add" tabindex="-1" role="dialog" aria-labelledby="mymodel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="exampleModalLabel1">Create New Email Template</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											</div>
											{!! Form::open(array('route' => 'admin.emailtemplate.store','method'=>'POST','name'=>'emailtemplate_form','id'=>'emailtemplate_form')) !!}
											<div class="modal-body"> 
												<div class="row">
													<div class="col-xs-12 col-sm-6 col-md-6">
														<div class="form-group">
															<h5>Title<span class="text-danger">*</span></h5>
															<div class="controls">
																 <input id="title" name="title" type="text" class="form-control" />  
															</div>
														</div>
													</div>
													<div class="col-xs-12 col-sm-6 col-md-6">
														<div class="form-group"> 
															<h5>Type<span class="text-danger">*</span></h5>
															<div class="controls">
																<input id="type" name="type" class="form-control"  type="text">  
																<div class="help-block"></div>
															</div>
														</div>
													</div>
												</div> 
												<div class="row">
													<div class="col-xs-12 col-sm-12 col-md-12">
														<div class="form-group">
															<h5>Subject<span class="text-danger">*</span></h5>
															<div class="controls">
																<input  id="subject" name="subject" class="form-control"  type="text"> 
																<div class="help-block"></div>
															</div>
														</div>
													</div>
													<div class="col-xs-12 col-sm-6 col-md-6">
														<div class="form-group">
															<h5>From Email<span class="text-danger">*</span></h5>
															<div class="controls">
																<input  id="from_email" name="from_email" class="form-control"  type="email"> 
																<div class="help-block"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-xs-12 col-sm-12 col-md-12">
														<div class="form-group">
															<h5>From Name<span class="text-danger">*</span></h5>
															<div class="controls">
																<input  id="from_name" name="from_name" class="form-control"  type="text"> 
																<div class="help-block"></div>
															</div>
														</div>
													</div> 
												</div>
												<div class="row">
													<div class="col-xs-12 col-sm-6 col-md-6">
														<div class="form-group">
															<h5>Template Status<span class="text-danger">*</span></h5>
															<div class="controls">
																<div class="switch">
																	<label>InActive
																	<input id="template_status" name="template_status" value="active" type="checkbox"><span class="lever"></span>Active</label> 
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-xs-12 col-sm-12 col-md-12">
														<div class="form-group">
															<h5>Content<span class="text-danger">*</span></h5>
															<div class="controls">
																<textarea name="content" id="mymce" style="height:100px;" class="content"></textarea>
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
								<!-- Delete Model Starts--> 
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
								<!-- Delete Model Ends--> 
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
                <!-- End Page Content -->
                <!-- ============================================================== -->
               
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
   <!--Custom JavaScript -->
	 <script src="{{ URL::to('admin/assets/js/custom.min.js') }}"></script>
	 <script src="{{ URL::to('admin/assets/js/validation.js') }}"></script> 
    <script>
    !function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>
     <!-- This is data table -->
    <script src="{{ URL::to('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>    
    <script src="{{ URL::to('admin/assets/js/module/datatable/emailtemplate_datatables.js') }}"></script>
	
	<!-- This is for content editor -->	 
	<script src="{{ URL::to('admin/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
    $(document).ready(function() {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });
    </script>
    
@endsection 