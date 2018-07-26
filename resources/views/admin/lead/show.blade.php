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
					<div class="card-group">
						<div class="card">
							<div class="card-body">
								<div class="row">
											<div class="col-lg-6">
												<h2 class="card-title">LEAD INFORMATION</h2>
												
												
												<h5>Lead Owner :<small> {{$leadData->lead_owner}}</small></h5>
												<h5>company Name : <small>{{$leadData->company}}</small></h5>
												<h5>Phone  : <small>{{$leadData->phone}}</small></h5>
												<h5>Fax : <small>{{$leadData->fax}}</small></h5>
												<h5>Lead Source : <small>{{$leadData->lead_source}}</small></h5>
											</div>
											<div class="col-lg-6">
												 </br></br>
												
												<h5>Full Name : <small>{{$leadData->first_name}} &nbsp {{$leadData->last_name}}</small></h5>
												<h5>Title:<small>{{$leadData->title_or_position}}</small></h5>
												<h5>Mobile: <small>{{$leadData->mobile}}</small></h5>
												<h5>Email: <small>{{$leadData->email}}</small></h5>
												<h5>Rating: <small>{{$leadData->rating}}</small></h5>
											</div>
                                       </div>
									   <div class="col-12">
                                        <br>
                                        
                                        <hr>
                          
                                        <br>
                                    </div>
									   <div class="row">
											<div class="col-12">
												<h2 class="card-title">ADDRESS INFORMATION</h2>
												
												
												<h5>Address :<small> {{$leadData->address}}</small></h5>
												
											</div>
											
                                       </div>
									   
									   <div class="col-12">
                                        <br>
                                        
                                        <hr>
                                        
                                        <br>
                                    </div>
									
									<div class="row">
											<div class="col-lg-6">
												<h2 class="card-title">ADDITIONAL INFORMATION</h2>
												
												
												<h5>Industry :<small> {{$leadData->Industry}}</small></h5>
												<h5>Annual Revenue : <small>{{$leadData->annual_revenue}}</small></h5>
												<h5>Website  : <small>{{$leadData->website}}</small></h5>
												<h5>Description : <small>{{$leadData->description}}</small></h5>
											</div>
											<div class="col-lg-6">
												 </br></br>
												
												<h5>Lead Source : <small>{{$leadData->lead_source}} </small></h5>
												<h5>Number of Employees: <small>{{$leadData->number_of_employees}}</small></h5>
												
											</div>
                                       </div>
									<div class="col-12">
                                        <br>
                                        
                                        <hr>
                                        
                                        <br>
                                    </div>
									<div class="row">
											<div class="col-lg-6">
												<h2 class="card-title">SYSTEM COLUMNS</h2>
												
												
												<h5>Id : <small> {{$leadData->system_col_id}}</small></h5>
												<h5>Created By: <small>{{$leadData->created_by}}</small></h5>
												<h5>Date Created  : <small>{{$leadData->created_at}}</small></h5>
												
											</div>
											<div class="col-lg-6">
												 </br></br>
												
												<h5>Lead Owner : <small>{{$leadData->lead_owner}} </small></h5>
												<h5>Last Modified By : <small>{{$leadData->last_modified_by}}</small></h5>
												<h5>Date Modified : <small>{{$leadData->updated_at}}</small></h5>
												
											</div>
                                       </div>
									   <div class="col-12">
                                        <br>
                                        
                                        <hr>
                                        
                                        <br>
                                    </div>
            		
												<a class="btn btn-inverse" href="{{route('admin.lead.index')}}">Back</a>						
																		
															
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
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>
@endsection 