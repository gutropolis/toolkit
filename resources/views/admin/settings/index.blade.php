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
																<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home2" role="tab" aria-selected="true"><span><i class="fa fa-spin fa-cog"></i></span> <span class="hidden-xs-down">Display Settings</span></a> </li>
																<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab" aria-selected="false"><span ><i class="mdi mdi-account-settings-variant"></i></span> <span class="hidden-xs-down">Company Settings</span></a> </li>
																<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages2" role="tab" aria-selected="false"><span ><i class="mdi mdi-email-secure"></i></span> <span class="hidden-xs-down">Outgoing Server</span></a> </li>
															</ul>
															<!-- Tab panes -->
															<div class="tab-content">
																<div class="tab-pane active show" id="home2" role="tabpanel">
																	<!-- Tab Start Here -->
																	
																		 {!! Form::open(array('route' => 'admin.settings.store','method'=>'POST','name'=>'gsettingform','id'=>'gsettingform','class'=>'m-t-40','files'=>true, 'novalidate')) !!}
																		
									    										<div class="form-group">
													                        <div class="card">
													                            <div class="card-body">
													                                <h4 class="card-title">File Upload1</h4>
													                                <label for="input-file-now">Your so fresh input file — Default version</label>
													                                <input type="file" id="input-file-now" name="logo"  class="dropify" data-default-file="/admin/images/upload/{{$mydata['logo'] or ''}}" />

													                               <input type="hidden" value="{{$mydata['logo'] or ''}}" name="img"/>
													                            </div>
													                        </div>
													                    </div>		
																			
																			<div class="form-group">
																							<h5>Show Logo in home page <span class="text-danger">*</span></h5>
																							<div class="controls">
																								 <div class="switch">
																										<label>OFF
																											<input   id="show_logo_home"   value="1" name ="show_logo_home" type="checkbox" {{(!empty($mydata['show_logo_home']) == 1) ? 'checked' : '' }}><span class="lever"></span>ON</label>
																								 </div>
																							</div>
																						</div>
																						<div class="form-group">
																							<h5>Show Logo in application <span class="text-danger">*</span></h5>
																							<div class="controls">
																								 <div class="switch">
																										<label>OFF
																											<input   id="show_logo_application"   value="1" name ="show_logo_application" type="checkbox" {{(!empty($mydata['show_logo_application']) == 1) ? 'checked' : ''}}><span class="lever"></span>ON</label>
																								 </div>
																							</div>
																						</div>
																						<div class="form-group">
																							<h5>Show Logo in pdf <span class="text-danger">*</span></h5>
																							<div class="controls">
																								 <div class="switch">
																										<label>OFF
																											<input   id="show_logo_pdf"   value="1" name ="show_logo_pdf" type="checkbox" {{(!empty($mydata['show_logo_pdf'])== 1) ? 'checked' : ''}} ><span class="lever"></span>ON</label>
																								 </div>
																							</div>
																						</div>

																			<div class="form-group">
																				<h5>Application Name<span class="text-danger">*</span></h5>
																				<div class="controls">
																					

																					<input type="text" name="application_name" value="{{ $mydata['application_name']  or ''}}" placeholder="Application Name" class="form-control" required data-validation-required-message="Application name is required"> </div>
																				
																			</div>
																			<div class="form-group">
																				<h5>Login Background image<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<select name="login_background_image" class="form-control" required data-validation-required-message="This field is required">
																						<option value="">Choose Value </option>
																					
																						<option value="abc" {{(!empty($mydata['login_background_image']) =='abc') ? 'selected' : ''}}>abc.jpg</option>
																						<option value="cdf" {{(!empty($mydata['login_background_image'])=='cdf') ? 'selected' : ''}}>cdf.jpg</option>
																						<option value="zys" {{(!empty($mydata['login_background_image'] )=='zys') ? 'selected' : ''}}>zys.jpg</option>
																					</select>
																					 </div>
																			</div>
																			<div class="form-group">
																				<h5>Sidebar Background image<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<select name="side_bar_background_image" class="form-control" required data-validation-required-message="This field is required">
																						<option value="">Choose Value </option>
																						<option value="xyz"  {{(!empty($mydata['side_bar_background_image']) =='xyz') ? 'selected' : ''}}>xyz.jpg</option>
																						<option value="znd"  {{(!empty($mydata['side_bar_background_image']) =='znd') ? 'selected' : ''}}>znd.jpg</option>
																						<option value="trv"  {{(!empty($mydata['side_bar_background_image']) =='trv') ? 'selected' : ''}}>trv.jpg</option>
																					</select>
																					 </div>
																			</div>
																			<input type="hidden" name="group" value="1"/>
																			<div class="text-xs-right m-b-40">
																				<button type="submit" id="btn-save" class="btn btn-primary">Submit</button>
																				<button type="reset" class="btn btn-inverse">Cancel</button>
																			</div>
																		{!! Form::close() !!}
																	<!-- Tab End here  ------>
																</div>
																<div class="tab-pane p-20" id="profile2" role="tabpanel">
																<!-- Tab Start Here -->
																	 {!! Form::open(array('route' => 'admin.settings.csettingstore','method'=>'POST','name'=>'csettingform','id'=>'csettingform','class'=>'m-t-40', 'novalidate')) !!}
																			
																			<div class="form-group">
																				<h5>Company Name<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="company_name" value="{{ $mydata['company_name'] or '' }}" placeholder="Company Name" class="form-control" required data-validation-required-message="Company name is required"> </div>
																				
																			</div>
																			
																			
																			<div class="form-group">
																				<h5>Address<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<textarea name="caddress" rows="5"  placeholder="Enter the address" class="form-control" required data-validation-required-message="Address is required">{{ $mydata['caddress'] or '' }}</textarea> </div>
																				
																			</div>
																			<div class="form-group">
																				<h5>City<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="city" value="{{ $mydata['city']  or '' }}" placeholder="City" class="form-control" required data-validation-required-message="City is required"> </div>
																				
																			</div>
																			<div class="form-group">
																				<h5>State<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="state" placeholder="state" value="{{ $mydata['state'] or '' }}" class="form-control" required data-validation-required-message="state is required"> </div>
																				
																			</div>
																			<div class="form-group">
																				<h5>Postal Code<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="postal_code" value="{{ $mydata['postal_code'] or '' }}" placeholder="Postal Code" class="form-control" required data-validation-required-message="Postal code is required"> </div>
																				
																			</div>
																			<div class="form-group">
																				<h5>Country<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="country" value="{{ $mydata['country']  or '' }}" placeholder="Country" class="form-control" required data-validation-required-message="Country is required"> </div>
																				
																			</div>
																			<div class="form-group">
																				<h5>Phone<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="phone" value="{{ $mydata['phone']  or '' }}"  placeholder="Phone" class="form-control" required data-validation-required-message="Phone is required"> </div>
																				
																			</div>
																			<div class="form-group">
																				<h5>Fax<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="fax" value="{{ $mydata['fax']  or ''}}" placeholder="Fax" class="form-control" required data-validation-required-message="Fax is required"> </div>
																				
																			</div>
																			<div class="form-group">
																				<h5>Website<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="website" value="{{ $mydata['website'] or '' }}" placeholder="Website" class="form-control" required data-validation-required-message="Website is required"> </div>
																				
																			</div>
																			<div class="form-group">
																				<h5>Vat ID<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="vatid" value="{{ $mydata['vatid']  or ''}}" placeholder="Vat ID" class="form-control" required data-validation-required-message="Vat is required"> </div>
																				
																			</div>
																				<input type="hidden" name="group" value="2"/>

																			<div class="text-xs-right m-b-40">
																				<button type="submit" id="btn-save" class="btn btn-primary">Submit</button>
																				<button type="reset" class="btn btn-inverse">Cancel</button>
																			</div>
																		{!! Form::close() !!}
																	<!-- Tab End here  ------>
																</div>
																<div class="tab-pane p-20" id="messages2" role="tabpanel">
																<!-- Tab Start Here -->
																	 {!! Form::open(array('route' => 'admin.settings.outserverstore','method'=>'POST','name'=>'csettingform','id'=>'csettingform','class'=>'m-t-40', 'novalidate')) !!}
																			
																			<div class="form-group">
																				<h5>Mail Driver<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="mail_driver" value="{{ $mydata['mail_driver']  or ''}}"  placeholder="Mail Driver" class="form-control" required data-validation-required-message="Mail Driver is required"> </div>
																				
																			</div>
																			
																			
																			
																			<div class="form-group">
																				<h5>Mail Host<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="mail_host" value="{{ $mydata['mail_host']  or ''}}" placeholder="Mail Host" class="form-control" required data-validation-required-message="Mail host  is required"> </div>
																				
																			</div>
																			<div class="form-group">
																				<h5>Mail Port<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="mail_port" value="{{ $mydata['mail_port']  or ''}}" placeholder="Mail Port" class="form-control" required data-validation-required-message="Mail port is required"> </div>
																				
																			</div>
																			<div class="form-group">
																				<h5>Mail UserName<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="mail_username" value="{{ $mydata['mail_username']  or ''}}" placeholder="Mail UserName" class="form-control" required data-validation-required-message="Mail UserName is required"> </div>
																				
																			</div>
																			<div class="form-group">
																				<h5>Mail Password<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="mail_password" value="{{ $mydata['mail_password']  or ''}}" placeholder="Mail Password" class="form-control" required data-validation-required-message="Mail Password is required"> </div>
																				
																			</div>
																			<div class="form-group">
																				<h5>Mail Encryption<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="text" name="mail_encryption" value="{{ $mydata['mail_encryption']  or ''}}" placeholder="Mail Encryption" class="form-control" required data-validation-required-message="Mail Encryption is required"> </div>
																				
																			</div>
																			
																			<input type="hidden" name="group" value="3"/>

																			<div class="text-xs-right m-b-40">
																				<button type="submit" id="btn-save" class="btn btn-primary">Submit</button>
																				<button type="reset" class="btn btn-inverse">Cancel</button>
																			</div>
																		</form>
																		<h2>SEND TEST E-MAIL</h2>
																		<form class="m-t-40" novalidate>
																			
																			<div class="form-group">
																				<h5>E-mail<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<input type="email" name="email" placeholder="E-mail" class="form-control" required data-validation-required-message="E-mail is required"> </div>
																				
																			</div>
																			
																			
																			
																			<div class="form-group">
																				<h5>E-mail Message<span class="text-danger">*</span></h5>
																				<div class="controls">
																					<textarea rows="10" name="email_message" placeholder="E-mail Message" class="form-control" required data-validation-required-message="Email Message  is required"></textarea>
																				
																			</div>
																			
																			


																			<div class="text-xs-right m-b-40">
																				<button type="submit" id="btn-save" class="btn btn-primary">Sent Test E-mail</button>
																				<button type="reset" class="btn btn-inverse">Cancel</button>
																			</div>
																		{!! Form::close() !!}
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
	 <script src="{{ URL::to('admin/plugins/dropify/src/js/dropify.js') }}"></script>
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>

 <script>
    	function displayinf()
    	{
    		var mydata = $('#gsettingform').serialize();
        // alert(mydata);
	    $.ajax({
        type: "POST",
        url: '/admin/settings/store',
        data:mydata ,
        success: function( data ) {
        	console.log(data.id);
        	return false;
    	}
    });
	}
</script>
 <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
       
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
@endsection 