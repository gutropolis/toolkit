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
                        <li class="breadcrumb-item active">Edit Lead</li>
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
										<div class="col-md-12 col-lg-12 col-xlg-4">
                                       
											<div class="alert alert-danger print-error-msg" style="display:none">
                                           <ul></ul>
                                           </div>
                                  </div>
								  </div>
								  

            		{!! Form::open(array('route' => ['admin.lead.update', $leadData->id],'method'=>'POST','name'=>'leadform','id'=>'leadform','class'=>'m-t-40', 'novalidate')) !!}
																		
									    												
						<div class="row">
										<div class="col-md-12 col-lg-12 col-xlg-1">
                                        <div class="card card-body">
											<h1>LEAD INFORMATION</h1>
                                  </div>
								</div>
					</div>													
																			
																						

				<div class="row">
                    <!-- .col -->
                    <div class="col-md-6 col-lg-6 col-xlg-4">
                        <div class="card card-body">
                            <div class="row">
                               
                                <div class="col-md-8 col-lg-9">
								<div class="form-group">
                                    <h3 class="box-title m-b-0">Lead Owner<span class="text-danger">*</span></h3> <small>
									<div class="controls">
									<input type="text" name="lead_owner" value="{{$leadData->lead_owner or ''}}"  placeholder="Lead Owner" class="form-control" required data-validation-required-message="Lead Owner is required"></small>
									</div>
									</div>
									<div class="form-group">
									 <h3 class="box-title m-b-0">Company<span class="text-danger">*</span></h3> <small>
									 <div class="controls">
									 <input type="text" name="company"  value="{{$leadData->company or ''}}" placeholder="Company" class="form-control" required data-validation-required-message="Company is required"></small>
									 </div>
									 </div>
									 <div class="form-group">
									  <h3 class="box-title m-b-0">Phone<span class="text-danger">*</span></h3> <small>
									  <div class="controls">
									  <input type="text" name="phone"   value="{{$leadData->phone or ''}}" placeholder="Application Name" class="form-control" required data-validation-required-message="phone is required"></small>
									  </div>
									  </div>
									  <div class="form-group">
									  
									   <h3 class="box-title m-b-0">Fax<span class="text-danger">*</span></h3> <small>
									    <div class="controls">
									   <input type="text" name="fax"  value="{{$leadData->fax or ''}}" placeholder="Fax" class="form-control" required data-validation-required-message="Fax is required"></small>
									   </div>
									   </div>
									   <div class="form-group">
									   <h3 class="box-title m-b-0">Lead Status<span class="text-danger">*</span></h3> <small>
									   <div class="controls">
									   <input type="text" name="lead_status"  value="{{$leadData->lead_status or ''}}" placeholder="Lead Status" class="form-control" required data-validation-required-message="Lead Status is required"></small>
									   </div>
									   </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- .col -->
                    <div class="col-md-6 col-lg-6 col-xlg-4">
                        <div class="card card-body">
                            <div class="row">
                              
                                <div class="col-md-8 col-lg-9">
								<div class="form-group">
                                    <h3 class="box-title m-b-0">Full Name<span class="text-danger">*</span></h3> 
									<div class="controls row">
									<div class="col-md-6">
									<input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{$leadData->first_name or ''}}" required data-validation-required-message="First Name is required"> 
									</div>
									<div class="col-md-6">
									<input type="text" name="last_name" value="{{$leadData->last_name or ''}}" placeholder="Last Name" class="form-control" required data-validation-required-message="Last name is required"> 
									</div>
									
									</div>
									</div>
									<div class="form-group">
									 <h3 class="box-title m-b-0">Title / Position<span class="text-danger">*</span></h3> <small>
									 <div class="controls">
									 <input type="text" name="title_or_position"  value="{{$leadData->title_or_position or '' }}" placeholder="Title/Position" class="form-control" required data-validation-required-message="Title/Position  is required"></small>
									 </div>
									 </div>
									 
									 <div class="form-group">
									 									 
									  <h3 class="box-title m-b-0">Mobile<span class="text-danger">*</span></h3> <small>
									  <div class="controls">
									  <input type="text" name="mobile"  value="{{$leadData->mobile or ''}}" placeholder="Mobile" class="form-control" required data-validation-required-message=" Mobile is required"> </small>
									  </div>
									  </div>
									  <div class="form-group">
									   <h3 class="box-title m-b-0">Email<span class="text-danger">*</span></h3> <small>
									   <div class="controls">
									   <input type="email" name="email"  value="{{$leadData->email or ''}}" placeholder="Email" class="form-control" required data-validation-required-message="Email is required"></small>
									   </div>
									   </div>
									   
									   <div class="form-group">
									   <h3 class="box-title m-b-0">Rating<span class="text-danger">*</span></h3> <small>
									   <div class="controls">
									   <input type="text" name="rating"  value="{{$leadData->rating or ''}}" placeholder="Rating" class="form-control" required data-validation-required-message="Rating is required"></small>
									    </div>
									   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
				</div>				
					<!-- /.col -->															
						<div class="row">
										<div class="col-md-12 col-lg-12 col-xlg-1">
                                        <div class="card card-body">
											<h1>ADDRESS INFORMATION</h1>
                                  </div>
								</div>
					</div>				
										
                     <div class="row">
                    <!-- .col -->
                    <div class="col-md-12 col-lg-12col-xlg-4">
                        <div class="card card-body">
                            <div class="row">
                               
                                <div class="col-md-12 col-lg-12">
								<div class="form-group">
                                    <h3 class="box-title m-b-0">Address<span class="text-danger">*</span></h3> <small> 
									
									 <div class="controls">
								<textarea rows="5" name="address" class="form-control"  required data-validation-required-message="Address is required">{{$leadData->address or ''}}</textarea> </small>
									</div>
								</div>
									
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    
                    
				</div>				
					<!-- /.col -->		
                              <div class="row">
										<div class="col-md-12 col-lg-12 col-xlg-1">
                                        <div class="card card-body">
											<h1>ADDITIONAL INFORMATION</h1>
                                  </div>
								</div>
					</div>													
																			
																						

				<div class="row">
                    <!-- .col -->
                    <div class="col-md-6 col-lg-6 col-xlg-4">
                        <div class="card card-body">
                            <div class="row">
                               
                                <div class="col-md-8 col-lg-9">
								<div class="form-group">
                                    <h3 class="box-title m-b-0">Industry<span class="text-danger">*</span></h3> <small>
									<div class="controls">
									<input type="text" name="Industry"  value="{{$leadData->Industry or ''}}"  placeholder="Industry" class="form-control" required data-validation-required-message="Industry is required"></small>
									 </div>
								</div>
								
								<div class="form-group">
								
									 <h3 class="box-title m-b-0">Annual Revenue<span class="text-danger">*</span></h3> <small>
									 <div class="controls">
									 <input type="text" name="annual_revenue"  value="{{$leadData->annual_revenue or ''}}"  placeholder="Anual Revenue" class="form-control" required data-validation-required-message="Annual Revenue is required"></small>
									 </div>
								</div>
									 <div class="form-group">
									  <h3 class="box-title m-b-0">Website<span class="text-danger">*</span></h3> <small>
									   <div class="controls">
									  <input type="text" name="website"  value="{{$leadData->website or ''}}" placeholder="Website" class="form-control" required data-validation-required-message="Website is required"> </small>
									  </div>
								</div>
								
									  <div class="form-group">
									   <h3 class="box-title m-b-0">Description <span class="text-danger">*</span></h3> <small>
									    <div class="controls">
									   <input type="text" name=""  value="" placeholder="Description" class="form-control" ></small>
									    </div>
								</div>
									   
									  
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- .col -->
                    <div class="col-md-6 col-lg-6 col-xlg-4">
                        <div class="card card-body">
                            <div class="row">
                              
                                <div class="col-md-8 col-lg-9">
                                    <div class="form-group">
									 <h3 class="box-title m-b-0">Lead Source<span class="text-danger">*</span></h3> <small>
									 <div class="controls">
									 <input type="text" name="lead_source"  value="{{$leadData->lead_source or ''}}" placeholder="Lead Source" class="form-control" required data-validation-required-message="Lead Source is required"></small>
									 </div>
                                    </div>
									 <div class="form-group">
									  <h3 class="box-title m-b-0">Number of Employees<span class="text-danger">*</span></h3> <small>
									  <div class="controls">
									  <input type="text" name="number_of_employees"   value="{{$leadData->number_of_employees or ''}}" placeholder="Number of employees" class="form-control" required data-validation-required-message="Number of Employees is required"> </small>
									  </div>
                                    </div>
									  
									   
                                </div>
                            </div>
                        </div>
                    </div>
                    
				</div>		


 <div class="row">
										<div class="col-md-12 col-lg-12 col-xlg-1">
                                        <div class="card card-body">
											<h1>SYSTEM COLUMNS</h1>
                                  </div>
								</div>
					</div>													
																			
																						

				<div class="row">
                    <!-- .col -->
                    <div class="col-md-6 col-lg-6 col-xlg-4">
                        <div class="card card-body">
                            <div class="row">
                               
                                <div class="col-md-8 col-lg-9">
								<div class="form-group">
                                    <h3 class="box-title m-b-0">Id<span class="text-danger">*</span></h3> <small>
									<div class="controls">
									<input type="text" name="system_col_id"  value="{{$leadData->system_col_id or ''}}" placeholder="System  id" class="form-control" required data-validation-required-message="System id is required"></small>
									</div>
								</div>
								<div class="form-group">
									 <h3 class="box-title m-b-0">Created By<span class="text-danger">*</span></h3> <small>
									 <div class="controls">
									 <input type="text" name="created_by"  value="{{$leadData->created_by or ''}}"  placeholder="Created By" class="form-control" ></small>
									 </div>
								</div>
								<div class="form-group">
									  <h3 class="box-title m-b-0">Date Created<span class="text-danger">*</span></h3> <small>
									  <div class="controls">
									  <input type="text" name="created_at"  value="{{$leadData->created_at or ''}}" placeholder="Date Created" class="form-control" > </small>
									  </div>
								</div>
									  
									   
									   
									  
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- .col -->
                    <div class="col-md-6 col-lg-6 col-xlg-4">
                        <div class="card card-body">
                            <div class="row">
                              
                                <div class="col-md-8 col-lg-9">
                                   <div class="form-group">
									 <h3 class="box-title m-b-0">Lead Owner<span class="text-danger">*</span></h3> <small>
									 <div class="controls">
									 <input type="text" name="lead_owner" value="{{$leadData->lead_owner or ''}}"  placeholder="Lead Owner" class="form-control" required data-validation-required-message="Lead Owner is required"></small>
									 </div>
                                   </div>
								   <div class="form-group">
									  <h3 class="box-title m-b-0">Last Modified By<span class="text-danger">*</span></h3> <small>
									   <div class="controls">
									  <input type="text" name="last_modified_by"   value="{{$leadData->last_modified_by or ''}}" placeholder="Last Modified By" class="form-control" > </small>
									  </div>
                                   </div>
								   
								   <div class="form-group">
									  <h3 class="box-title m-b-0">Date Modified <span class="text-danger">*</span></h3> <small>
									   <div class="controls">
									  <input type="text" name="updated_at"   value="{{$leadData->updated_at or ''}}" placeholder="Updated at" class="form-control" > </small>
									  </div>
                                   </div>
									   
                                </div>
                            </div>
                        </div>
                    </div>
                    
				</div>				
												
																			
																			
											<div class="text-xs-right m-b-40">
											<button type="submit" id="btn-save" class="btn btn-primary">Submit</button>
											
											<a class="btn btn-inverse" href="{{route('admin.lead.index')}}">Cancel</a>
											</div>
											{!! Form::close() !!}
																		
																		
					 </div>
																 
				@endsection
@section('footer_js') 
   
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
     <script src="{{ URL::to('admin/assets/js/custom.min.js') }}"></script>
	 <script src="{{ URL::to('admin/assets/js/validation.js') }}"></script> 
	  <script src="{{ URL::to('admin/assets/js/module/datatable/leadData.js') }}"></script>
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>
@endsection 