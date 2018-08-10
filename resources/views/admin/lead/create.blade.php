
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
                        <li class="breadcrumb-item active">Create Lead</li>
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
			{!! Form::open(array('route' => 'admin.lead.store','method'=>'POST','name'=>'leadform','id'=>'leadform','class'=>'m-t-40', 'novalidate')) !!}
			 <div class="row">
                    <div class="col-lg-9 col-xlg-10 col-md-8">
                        <div class="card">
                            <div class="card-body">
                               
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First Name</label> 
                                                    <input type="text" name="first_name"  class="form-control" required data-validation-required-message="First Name is required" />  
                                                     
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label >Last Name<span class="text-danger">*</span></label> 
                                                    <input type="text" name="last_name"   class="form-control" required data-validation-required-message="Last name is required" /> 
                                                   
                                                </div>
                                            </div>
                                        </div> 
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Title/Position</label> 
                                                     <input type="text" name="phone"   class="form-control" required data-validation-required-message="phone is required" /> 
                                                     
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Account Name<span class="text-danger">*</span></label> 
                                                        <input type="text" name="account_name"   class="form-control" required data-validation-required-message="Account Name is required" /> 
                                                    
                                                </div>
                                            </div>
                                        </div> 
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Email</label> 
                                                    <input type="text" name="email"  placeholder="Primary" class="form-control" required data-validation-required-message="Primary is required" />  
													<div class="m-t-0 m-b-5"></div>
													 <input type="text" name="alternate_email"  placeholder="alternate" class="form-control"  />  
													 <div class="m-t-0 m-b-5"></div>
													 <select name="optin_status" id="optin_status" required="" class="form-control" aria-invalid="false">
														  <option value="">Not Opt Out</option>
														  <option value="1">Optin In</option>
														  <option value="0">Opt Out</option> 
													 </select>
													  <input type="text" name="alternate_email"  placeholder="alternate" class="form-control"  />  
													   <div class="m-t-0 m-b-5"></div> 
														<div class="checkbox checkbox-success">
															<input id="checkbox35" type="checkbox">
															<label for="checkbox35">Email is not Valid</label>
														</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone<span class="text-danger">*</span></label> 
                                                    <input type="text" name="work" placeholder="Work"   class="form-control"   />  
                                                    <div class="m-t-0 m-b-5"></div>
													   <input type="text" name="home" placeholder="Home"     class="form-control"   />  
                                                    <div class="m-t-0 m-b-5"></div>
													  <input type="text" name="mobile"  placeholder="Mobile"   class="form-control"   />   
                                                    <div class="m-t-0 m-b-5"></div>
													 <input type="text" name="other"   placeholder="Other"    class="form-control"   />  
                                                    <div class="m-t-0 m-b-5"></div>
													<div class="checkbox checkbox-success">
															<input id="checkbox36" type="checkbox">
															<label for="checkbox36"> Not to Call</label>
													 </div>
                                                </div>
                                            </div>
                                        </div> 
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Website</label> 
                                                     <input type="text" name="website"   class="form-control" required data-validation-required-message="Website is required">  
                                                     
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Skype<span class="text-danger">*</span></label> 
                                                        <input type="text" name="skype"   class="form-control" required data-validation-required-message="Account Name is required" /> 
                                                    
                                                </div>
                                            </div>
                                        </div>	
										
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xlg-2 col-md-4">
						<div class="card">
                            <div class="card-body">
                                  
                                    <div class="form-group">
                                        <label for="exampleInputuname">Assign To</label>
                                        <div class="input-group">
                                             
                                             <select name="assign_to" id="assign_to" required="" class="form-control" aria-invalid="false">
														  <option value="">Admin</option>
														  <option value="1">Optin In</option>
														  <option value="0">Opt Out</option> 
											 </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Team</label>
                                        <div class="input-group">
												<select class="form-control" multiple="">
                                                    <optgroup label="NFC EAST">
                                                        <option>Dallas Cowboys</option>
                                                        <option>New York Giants</option>
                                                        <option>Philadelphia Eagles</option>
                                                        <option>Washington Redskins</option>
                                                    </optgroup>
                                                    <optgroup label="NFC NORTH">
                                                        <option>Chicago Bears</option>
                                                        <option>Detroit Lions</option>
                                                        <option>Green Bay Packers</option>
                                                        <option>Minnesota Vikings</option>
                                                    </optgroup>
                                                    <optgroup label="NFC SOUTH">
                                                        <option>Atlanta Falcons</option>
                                                        <option>Carolina Panthers</option>
                                                        <option>New Orleans Saints</option>
                                                        <option>Tampa Bay Buccaneers</option>
                                                    </optgroup>
                                                    <optgroup label="NFC WEST">
                                                        <option>Arizona Cardinals</option>
                                                        <option>St. Louis Rams</option>
                                                        <option>San Francisco 49ers</option>
                                                        <option>Seattle Seahawks</option>
                                                    </optgroup>
                                                    <optgroup label="AFC EAST">
                                                        <option>Buffalo Bills</option>
                                                        <option>Miami Dolphins</option>
                                                        <option>New England Patriots</option>
                                                        <option>New York Jets</option>
                                                    </optgroup>
                                                    <optgroup label="AFC NORTH">
                                                        <option>Baltimore Ravens</option>
                                                        <option>Cincinnati Bengals</option>
                                                        <option>Cleveland Browns</option>
                                                        <option>Pittsburgh Steelers</option>
                                                    </optgroup>
                                                    <optgroup label="AFC SOUTH">
                                                        <option>Houston Texans</option>
                                                        <option>Indianapolis Colts</option>
                                                        <option>Jacksonville Jaguars</option>
                                                        <option>Tennessee Titans</option>
                                                    </optgroup>
                                                    <optgroup label="AFC WEST">
                                                        <option>Denver Broncos</option>
                                                        <option>Kansas City Chiefs</option>
                                                        <option>Oakland Raiders</option>
                                                        <option>San Diego Chargers</option>
                                                    </optgroup>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd1">Via Partner</label>
                                        <div class="input-group">
												<select class="form-control custom-select">
                                                        <option>--Choose Partner--</option>
                                                        <option>India</option>
                                                        <option>Sri Lanka</option>
                                                        <option>USA</option>
                                               </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd2">Lead Category</label>
                                        <div class="input-group">
                                             <select class="form-control custom-select">
                                                        <option>--Lead Categories--</option>
                                                        <option>India</option>
                                                        <option>Sri Lanka</option>
                                                        <option>USA</option>
                                               </select>
                                        </div>
                                    </div>
                                  
                            </div>
                        </div>
                    </div>
                </div>	 
			    <!-- Department Section Start Here ----------------->
				<div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                          
                            <div class="card-body">
                                <form action="#" class="form-horizontal">
                                    <div class="form-body"> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Department</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control"  name="department" id="department" type="text">  
													</div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Temprature</label>
                                                     <div class="col-md-9">
                                                        <select name="temprature" class="form-control custom-select">
                                                            <option value="">Cold</option>
                                                            <option value="">Hot</option>
                                                        </select>
                                                        
													</div> 
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Status</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control custom-select">
                                                            <option value="">New</option>
                                                            <option value="0">dead</option>
															<option value="1">Assigned</option>
                                                        </select> 
													</div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Lead Source</label>
                                                    <div class="col-md-9">
                                                         <select class="form-control custom-select">
                                                            <option value="">New</option>
                                                            <option value="0">dead</option>
															<option value="1">Assigned</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Description</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Lead Source Description</label>
                                                    <div class="col-md-9">
                                                         <textarea class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div> 
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Fax Number</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" name="fax_number" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Referred By</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text" name="referred_by">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                             
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
				
				  <!-- Department Section Start Here ----------------->
				  
				<div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Primary Address</h4>
                               
                                <form class="form ">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                             <textarea class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
									<div class="form-group">
											<div class="form-group row">
												 
														<div class="col-md-6">
															<div class="form-group">
																<label>City</label> 
																<input type="text" name="city"  class="form-control" required data-validation-required-message="First Name is required" />  
																 
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group ">
																<label >State<span class="text-danger">*</span></label> 
																<input type="text" name="state"   class="form-control" required data-validation-required-message="Last name is required" /> 
															   
															</div>
														</div> 
											</div> 
                                    </div>
									<div class="form-group">
											<div class="form-group row"> 
														<div class="col-md-6">
															<div class="form-group">
																<label>Country</label> 
																<input type="text" name="city"  class="form-control" required data-validation-required-message="First Name is required" />   
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group ">
																<label >Postal Code<span class="text-danger">*</span></label> 
																<input type="text" name="state"   class="form-control" required data-validation-required-message="Last name is required" />  
															</div>
														</div> 
											</div>
                                    </div>
								</form>
							</div>
						</div>
                    </div> 
					<div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Other Address</h4> 
                                <form class="form">
                                    <div class="form-group"> 
                                        <div class="input-group">
                                             <textarea class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
									<div class="form-group">
											<div class="form-group row"> 
														<div class="col-md-6">
															<div class="form-group">
																<label>City</label> 
																<input type="text" name="city"  class="form-control" required data-validation-required-message="First Name is required" />   
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group ">
																<label >State<span class="text-danger">*</span></label> 
																<input type="text" name="state"   class="form-control" required data-validation-required-message="Last name is required" /> 
															   
															</div>
														</div> 
											</div>
                                    </div>
									<div class="form-group">
											<div class="form-group row">
												 
														<div class="col-md-6">
															<div class="form-group">
																<label>Country</label> 
																<input type="text" name="city"  class="form-control" required data-validation-required-message="First Name is required" />  
																 
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group ">
																<label >Postal Code<span class="text-danger">*</span></label> 
																<input type="text" name="state"   class="form-control" required data-validation-required-message="Last name is required" /> 
															   
															</div>
														</div> 
											</div>
                                    </div>
								</form>
							</div>
						</div>
                    </div> 					
                </div>   
			    <!-- Department Section Start Here ----------------->
				<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Description Details</h4>
                                   
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                        <div class="col-md-10">
                                            <textarea id="mymce" name="area"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-md-2 col-form-label">Profile Picture</label>
                                        <div class="col-md-10">
                                             <input type="file" id="input-file-now" class="dropify" />
                                        </div>
                                    </div>
                                  
                            </div>
                        </div>
                    </div>
                </div>
				<!-- End Here --------------------------------------> 
                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                    
                                        


                       <div class="alert alert-danger print-error-msg" style="display:none">
                              <ul></ul>
                          </div>
                                            
                                            
                                            

                    {!! Form::open(array('route' => 'admin.lead.store','method'=>'POST','name'=>'leadform','id'=>'leadform','class'=>'m-t-40', 'novalidate')) !!}
                                                                        
                                                                                        
                                                                            
                                                                            
                                                                                        

                                        <div class="form-group">
                                            <h5>First Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="first_name" placeholder="First Name" class="form-control" required data-validation-required-message="First Name is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                            <h5>Last Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="last_name"  placeholder="Last Name" class="form-control" required data-validation-required-message="Last name is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                            <h5>Lead Owner<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="lead_owner"  placeholder="Lead Owner" class="form-control" required data-validation-required-message="Lead Owner is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                            <h5>Company<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="company"  placeholder="Company" class="form-control" required data-validation-required-message="Company is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                            <h5>Title / Position<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="title_or_position"  placeholder="Title/Position" class="form-control" required data-validation-required-message="Title.Position  is required"> </div>
                                                                                
                                                </div><div class="form-group">
                                            <h5>Phone<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="phone"  placeholder="Application Name" class="form-control" required data-validation-required-message="phone is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                            <h5>Mobile<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="mobile"placeholder="Mobile" class="form-control" required data-validation-required-message=" Mobile is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                            <h5>Fax<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="fax"  placeholder="Fax" class="form-control" required data-validation-required-message="Fax is required"> </div>
                                                                                
                                                </div>
                                                
                                            <div class="form-group">
                                              <h5>Email<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="email" name="email"  placeholder="Email" class="form-control" required data-validation-required-message="Email is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Lead Status<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="lead_status"  placeholder="Lead Status" class="form-control" required data-validation-required-message="Lead Status is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Rating<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="rating"  placeholder="Rating" class="form-control" required data-validation-required-message="Rating is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Address<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="address"  placeholder="Address" class="form-control" required data-validation-required-message="Address is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Industry<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="Industry"  placeholder="Industry" class="form-control" required data-validation-required-message="Industry is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Lead Source<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="lead_source"  placeholder="Lead Source" class="form-control" required data-validation-required-message="Lead Source is required"> </div>
                                                                                
                                                </div>
                                                
                                                <div class="form-group">
                                              <h5>Annual Revenue<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="annual_revenue"  placeholder="Anual Revenue" class="form-control" required data-validation-required-message="Annual Revenue is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Number of Employees<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="number_of_employees"  placeholder="Number of employees" class="form-control" required data-validation-required-message="Number of Employees is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>Website<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="website"  placeholder="Website" class="form-control" required data-validation-required-message="Website is required"> </div>
                                                                                
                                                </div>
                                                <div class="form-group">
                                              <h5>System ID<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="system_col_id"  placeholder="System  id" class="form-control" required data-validation-required-message="System id is required"> </div>
                                                                                
                                                </div>
                                               
                                                
                                                                            
                                                                            
                                            <div class="text-xs-right m-b-40">
                                            <button type="submit" id="btn-save" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-inverse" href="{{route('admin.lead.index')}}">Cancel</a>
                                            
                                            </div>
                                            {!! Form::close() !!}
                                                                        
                                                                        </div>
                                                                   </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    

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
	<script src="{{ URL::to('admin/plugins/tinymce/tinymce.min.js') }}"></script> 
	<script src="{{ URL::to('admin/plugins/dropify/dist/js/dropify.min.js') }}"></script>  
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
	
	 <script src="../assets/plugins/dropify/dist/js/dropify.min.js"></script>
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
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

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
 

