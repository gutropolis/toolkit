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
											<h4 class="card-title">Edit Email Template</h4>
											<h6 class="card-subtitle"></h6>
										</div>
										
									</div>
									 
                                
                                    </div>
                                    <div class="card-body p-t-0">
                                        
                                           
                                           
                                                 <div class="col-md-12">
													
														{!! Form::model($emailtemplatebyid, ['method' => 'PATCH','route' => ['admin.emailtemplate.update', $emailtemplatebyid->id]]) !!}
												<div class="row">
													<div class="col-xs-12 col-sm-6 col-md-6">
													  <div class="form-group">
														  <h5>Title<span class="text-danger">*</span></h5>
														   <div class="controls">
															 <input type="text" name="title" class="form-control" value="{{$emailtemplatebyid->title}}">
														  </div>
													   </div>
													   <div class="form-group">
														  <h5>Type<span class="text-danger">*</span></h5>
														   <div class="controls">
															 <input type="text" name="type" class="form-control" value="{{$emailtemplatebyid->type}}">
														  </div>
													   </div>
													</div>
												 
													<div class="col-xs-12 col-sm-6 col-md-6">
													   <div class="form-group">
														  <h5>Subject<span class="text-danger">*</span></h5>
														   <div class="controls">
															 <input type="text" name="subject" class="form-control" value="{{$emailtemplatebyid->subject}}">
														  </div>
													   </div>
													   <div class="form-group">
														 <h5>From Name<span class="text-danger">*</span></h5>
														   <div class="controls">
															 <input type="text" name="from_name" class="form-control" value="{{$emailtemplatebyid->from_name}}">
														  </div>
													   </div>
													 </div>
													 
													<div class="col-xs-12 col-sm-6 col-md-6">
														<div class="form-group">
															<h5>Template Status<span class="text-danger">*</span></h5>
															<div class="controls">
																<div class="switch">
																	<label>InActive
																	<input id="template_status" name="template_status" value="active" type="checkbox" {{$emailtemplatebyid->template_status == 'active' ? 'checked' : '' }} />
																	<span class="lever"></span>Active</label> 
																</div>
															</div>
														</div>
													</div>
												 
													<div class="col-xs-12 col-sm-6 col-md-6">
														<div class="form-group">
															<h5>From Email<span class="text-danger">*</span></h5>
														    <div class="controls">
																<input type="email" name="from_email" class="form-control" value="{{$emailtemplatebyid->from_email}}">
															</div>
													    </div>
													</div> 
													<div class="col-xs-12 col-sm-12 col-md-12">
														<div class="form-group">
															<h5>Content<span class="text-danger">*</span></h5>
															<div class="controls">
																 <textarea name="content" id="mymce" class="content">{{$emailtemplatebyid->content}}</textarea>
																<div class="help-block"></div>
															</div>
														</div>
													</div>
												</div>
												   <div class="text-xs-right">
													  <button type="submit" id="btn-update" class="btn btn-info">Update</button> 
													  <a class=" btn btn-inverse " href="{{ route('admin.emailtemplate.index') }}">Cancel</a>
												   </div>
												   {!! Form::close() !!} 
															
														 
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
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>
     <!-- This is data table -->
    <script src="{{ URL::to('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    
    <script src="{{ URL::to('admin/assets/js/module/datatable/emailtemplate_datatables.js') }}"></script>
    <!-- start - This is for export functionality only -->
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