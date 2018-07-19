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
                                                <a href="javascript:void(0)"> <i class="mdi mdi-star"></i> Starred </a>
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
											<h4 class="card-title">Manage Website Settings</h4>
											<h6 class="card-subtitle">Plans are name of plan</h6>
										</div>
										<div class="col-sm-7 text-right">
											<button type="button" id="btn_add" class="btn btn-info"  ><i class="fa fa-plus"></i> Add New</button>    
										</div>
									</div>
									 
                                
                                    </div>
                                    <div class="card-body p-t-0">
                                        <div class="card b-all shadow-none">
                                           
                                           
                                                 <div class="col-md-12">
														 
															<div class="card-body p-b-0">
															 <!-- Nav tabs -->
															<ul class="nav nav-tabs customtab" role="tablist">
																<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home2" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Home</span></a> </li>
																<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Profile</span></a> </li>
																<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages2" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li>
															</ul>
															<!-- Tab panes -->
															<div class="tab-content">
																<div class="tab-pane active show" id="home2" role="tabpanel">
																	<!-- Tab Start Here -->
																		 
																		<form class="m-t-40" novalidate>
																			<div class="form-group">
																				<h5>Basic Text Input <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="text" class="form-control" required data-validation-required-message="This field is required"> </div>
																				<div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>
																			</div>
																			<div class="form-group">
																				<h5>Email Field <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
																			</div>
																			<div class="form-group">
																				<h5>Password Input Field <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="password" name="password" class="form-control" required data-validation-required-message="This field is required"> </div>
																			</div>
																			<div class="form-group">
																				<h5>Repeat Password Input Field <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="password" name="password2" data-validation-match-match="password" class="form-control" required> </div>
																			</div>
																			<div class="form-group">
																				<h5>File Input Field <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="file" name="file" class="form-control" required> </div>
																			</div>
																			<div class="form-group">
																				<h5>Input with Icon <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<div class="input-group">
																						<input type="text" class="form-control" placeholder="Addon To Right" data-validation-required-message="This field is required">
																						<div class="input-group-append">
																							<span class="input-group-text">$</span>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<h5>Maximum Character Length <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="maxChar" class="form-control" required data-validation-required-message="This field is required" maxlength="10">
																				</div>
																				<div class="form-control-feedback"><small>Add <code>maxlength='10'</code> attribute for maximum number of characters to accept. </small></div>
																			</div>
																			<div class="form-group">
																				<h5>Minimum Character Length <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="minChar" class="form-control" required data-validation-required-message="This field is required" minlength="6">
																				</div>
																				<div class="form-control-feedback"><small>Add <code>minlength="6"</code> attribute for minimum number of characters to accept.</small></div>
																			</div>
																			<div class="form-group">
																				<h5>Only Numbers <span class="text-danger">*</span></h5>
																				<div class="input-group">
																					<div class="input-group-prepend">
																						<span class="input-group-text">$</span>
																					</div>
																					<input type="number" name="onlyNum" class="form-control" required data-validation-required-message="This field is required">
																					<div class="input-group-append">
																						<span class="input-group-text">.00</span>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<h5>Maximum Number <span class="text-danger">*</span></h5>
																				<input type="text" name="maxNum" class="form-control" required data-validation-required-message="This field is required" max="25">
																				<div class="form-control-feedback"> <small><i>Must be lower than 25</i></small> - <small>Add <code>max</code> attribute for maximum number to accept. Also use <code>data-validation-max-message</code> attribute for max failure message</small> </div>
																			</div>
																			<div class="form-group">
																				<h5>Minimum Number <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="minNum" class="form-control" required data-validation-required-message="This field is required" min="10">
																				</div>
																				<div class="form-control-feedback"><small><i>Must be higher than 10</i></small> - <small>Add <code>min</code> attribute for minimum number to accept. Also use <code>data-validation-min-message</code> attribute for min failure message</small></div>
																			</div>
																			<div class="form-group">
																				<h5>Text Input Range <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="text" class="form-control" required data-validation-required-message="This field is required" minlength="10" maxlength="20" placeholder="Enter number between 10 &amp; 20"> </div>
																			</div>
																			<div class="form-group">
																				<h5>Input with Button <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<div class="input-group">
																						<input type="text" class="form-control" placeholder="Search" required>
																						<div class="input-group-append">
																							<button class="btn btn-info" type="button">Go!</button>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<h5>No Characters, Only Numbers <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="noChar" class="form-control" required data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="No Characters Allowed, Only Numbers"> </div>
																			</div>
																			<div class="form-group">
																				<h5>Pattern <span class="text-danger">*</span> <small><i>Must start with 'a' and end with 'z'</i></small></h5>
																				<div class="controls">
																					<input type="text" name="pattern" pattern="a.*z" data-validation-pattern-message="Must start with 'a' and end with 'z'" class="form-control" required>
																					<div class="form-control-feedback"><small>Add <code>pattern</code> attribute to set input pattern. Also use <code>data-validation-pattern-message</code> attribute for pattern failure message</small></div>
																				</div>
																			</div>
																			<div class="form-group">
																				<h5>Enter URL <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" class="form-control" placeholder="Add URL" data-validation-regex-regex="((http[s]?|ftp[s]?):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*" data-validation-regex-message="Only Valid URL's">
																					<div class="form-control-feedback"><small>Add <code>data-validation-regex-regex</code> attribute for regular expression. Also use <code>data-validation-regex-message</code> attribute for regex failure message</small></div>
																				</div>
																			</div>
																			<div class="form-group">
																				<h5>Enter Email Address <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" class="form-control" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Enter Valid Email"> </div>
																			</div>
																			<div class="form-group">
																				<h5>Enter Date <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" class="form-control" placeholder="MM/DD/YYYY" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Enter Valid Email"> </div>
																			</div>
																			<div class="form-group">
																				<h5>Basic Select <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<select name="select" id="select" required class="form-control">
																						<option value="">Select Your City</option>
																						<option value="1">India</option>
																						<option value="2">USA</option>
																						<option value="3">UK</option>
																						<option value="4">Canada</option>
																						<option value="5">Dubai</option>
																					</select>
																				</div>
																			</div>
																			<div class="form-group">
																				<h5>Textarea <span class="text-danger">*</span></h5>
																				<div class="controls">
																					<textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-md-6">
																					<div class="form-group">
																						<h5>Checkbox <span class="text-danger">*</span></h5>
																						<div class="controls">
																							<label class="custom-control custom-checkbox">
																								<input type="checkbox" required value="single" name="styled_single_checkbox" class="custom-control-input"><span class="custom-control-label">Check this custom checkbox</span> </label>
																						</div>
																					</div>
																				</div>
																				<div class="col-md-6">
																					<div class="form-group">
																						<h5>Checkbox Group <span class="text-danger">*</span></h5>
																						<div class="controls">
																							<fieldset>
																								<label class="custom-control custom-checkbox">
																									<input type="checkbox" value="x" name="styled_checkbox" required class="custom-control-input"><span class="custom-control-label">I am unchecked Checkbox</span> </label>
																							</fieldset>
																							<fieldset>
																								<label class="custom-control custom-checkbox">
																									<input type="checkbox" value="y" name="styled_checkbox" class="custom-control-input"><span class="custom-control-label">I am unchecked too</span> </label>
																							</fieldset>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-md-6">
																					<div class="form-group">
																						<h5>Select Max 2 Checkbox<span class="text-danger">*</span></h5>
																						<div class="controls">
																							<fieldset>
																								<label class="custom-control custom-checkbox">
																									<input type="checkbox" name="styled_max_checkbox" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Don't be greedy!" required class="custom-control-input"><span class="custom-control-label">I am unchecked Checkbox</span> </label>
																							</fieldset>
																							<fieldset>
																								<label class="custom-control custom-checkbox">
																									<input type="checkbox" name="styled_max_checkbox" class="custom-control-input"><span class="custom-control-label">I am unchecked too</span> </label>
																							</fieldset>
																							<fieldset>
																								<label class="custom-control custom-checkbox">
																									<input type="checkbox" name="styled_max_checkbox" class="custom-control-input"><span class="custom-control-label">You can check me</span> </label>
																							</fieldset>
																						</div> <small>Select any 2 options</small> </div>
																				</div>
																				<div class="col-md-6">
																					<div class="form-group">
																						<h5>Minimum 2 Checkbox selection<span class="text-danger">*</span></h5>
																						<div class="controls">
																							<fieldset>
																								<label class="custom-control custom-checkbox">
																									<input type="checkbox" value="1" data-validation-minchecked-minchecked="2" data-validation-minchecked-message="Choose at least two" name="styled_min_checkbox" required class="custom-control-input"><span class="custom-control-label">I am unchecked Checkbox</span> </label>
																							</fieldset>
																							<fieldset>
																								<label class="custom-control custom-checkbox">
																									<input type="checkbox" value="2" name="styled_min_checkbox" class="custom-control-input"><span class="custom-control-label">I am unchecked too</span> </label>
																							</fieldset>
																							<fieldset>
																								<label class="custom-control custom-checkbox">
																									<input type="checkbox" value="3" name="styled_min_checkbox" class="custom-control-input"><span class="custom-control-label">You can check me</span> </label>
																							</fieldset>
																						</div> <small>Select any 2 options</small> </div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-md-6">
																					<div class="form-group">
																						<h5>Radio Buttons <span class="text-danger">*</span></h5>
																						<fieldset class="controls">
																							<label class="custom-control custom-radio">
																								<input type="radio" value="1" name="styled_radio" required id="styled_radio1" class="custom-control-input"><span class="custom-control-label">Check Me</span> </label>
																						</fieldset>
																						<fieldset>
																							<label class="custom-control custom-radio">
																								<input type="radio" value="2" name="styled_radio" id="styled_radio2" class="custom-control-input"><span class="custom-control-label">Or Me</span> </label>
																						</fieldset>
																					</div>
																				</div>
																				<div class="col-md-6">
																					<div class="form-group">
																						<h5>Inline Radio Buttons <span class="text-danger">*</span></h5>
																						<div class="controls">
																							<fieldset>
																								<label class="custom-control custom-radio">
																									<input type="radio" value="Yes" name="styled_inline_radio" required id="styled_radio_inline1" class="custom-control-input"><span class="custom-control-label">Check Me</span> </label>
																							</fieldset>
																							<fieldset>
																								<label class="custom-control custom-radio">
																									<input type="radio" value="No" name="styled_inline_radio" id="styled_radio_inline2" class="custom-control-input"><span class="custom-control-label">Or Me</span> </label>
																							</fieldset>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="text-xs-right m-b-40">
																				<button type="submit" class="btn btn-info">Submit</button>
																				<button type="reset" class="btn btn-inverse">Cancel</button>
																			</div>
																		</form>
																	<!-- Tab End here  ------>
																</div>
																<div class="tab-pane p-20" id="profile2" role="tabpanel">
																<!-- Tab Start Here -->
																	2
																	<!-- Tab End here  ------>
																</div>
																<div class="tab-pane p-20" id="messages2" role="tabpanel">
																<!-- Tab Start Here -->
																	3
																	<!-- Tab End here  ------>
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
     <!--Custom JavaScript -->
	 <script src="{{ URL::to('admin/assets/js/custom.min.js') }}"></script>
	 <script src="{{ URL::to('admin/assets/js/validation.js') }}"></script> 
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>
@endsection 