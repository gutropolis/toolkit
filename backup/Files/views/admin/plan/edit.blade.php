@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
			<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"> Edit Plan Package</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"> Edit Plan Package</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                <!-- Row -->
				<div class="card-group">
						<div class="card">
							<div class="card-body">
									<div class="row">
										<div class="col-12">
											<div class="card">
												<div class="card-body">
													<h4 class="card-title"> Edit Plan Package</h4>
													@if (count($errors) > 0)

													  <div class="alert alert-danger">

														<strong>Whoops!</strong> There were some problems with your input.<br><br>

														<ul>

														   @foreach ($errors->all() as $error)

															 <li>{{ $error }}</li>

														   @endforeach

														</ul>

													  </div>

													@endif
													
												   {!! Form::model($plan, ['method' => 'PATCH','route' => ['admin.plan.update', $plan->id]]) !!}

														<div class="form-group">
                                                  <h5>Plan ID <span class="text-danger">*</span></h5>

												   <select name="plan_id" class="form-control">

												   		 <option value="">Select Plan ID</option>


												   		 @if(!empty($planTypeID))

							                             @foreach($planTypeID as $planid)

							                             
                                                         <option value='{{$planid->id}}' {{($plan->plan_id == $planid->id) ? 'selected' : ''}} >{{$planid->title}}</option>
                                                         @endforeach

						                                @endif
                                                   </select>

												</div>

												<div class="form-group">
                                                   <h5>Package Type <span class="text-danger">*</span></h5>

												   <select name="package_type" class="form-control">
												     	<option value="">Select Package Type</option>
                                                         <option value='1' {{($plan->package_type == 1) ? 'selected' : ''}} >A</option>
                                                         <option value='2' {{($plan->package_type == 2) ? 'selected' : ''}}>B</option>
                                                        <option value='3' {{($plan->package_type == 3) ? 'selected' : ''}}>C</option>
                                                        <option value='4' {{($plan->package_type == 4) ? 'selected' : ''}}>D</option>
                                                        <option value='5' {{($plan->package_type == 5) ? 'selected' : ''}}>E</option>
                                                   </select>

												</div>

												<div class="form-group">
													<h5>Price <span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name="price" class="form-control" value="{{$plan->price}}">
													</div>
												</div>

												<div class="form-group">
													<h5>Price Month<span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name="price_month" class="form-control" value="{{$plan->price_month}}"> </div>

												</div>
												<div class="form-group">
													<h5>Price Yearly<span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name="price_yearly" class="form-control" value="{{$plan->price_yearly}}"> </div>

												</div>

												<div class="form-group">
													<h5>Have Trial<span class="text-danger">*</span></h5>
													  <div class="demo-radio-button">
						                                    <input name="have_trial" type="radio" id="Yes" value="1" {{($plan->have_trial == 1) ? 'checked' : ''}} />
						                                    <label for="Yes">Yes</label>
						                                    <input name="have_trial" type="radio" id="No" value="0" {{($plan->have_trial == 0) ? 'checked' : ''}} />
						                                    <label for="No">No</label>
                                  
                               						 </div>

												</div>

												<div class="form-group">
													<h5>User Allowed<span class="text-danger">*</span></h5>
													  <div class="demo-radio-button">
						                                    <input name="users_allowed" type="radio" id="usYes" value="1" {{($plan->users_allowed == 1) ? 'checked' : ''}} />
						                                    <label for="usYes">Yes</label>
						                                    <input name="users_allowed" type="radio" id="usNo" value="0" {{($plan->users_allowed == 0) ? 'checked' : ''}} />
						                                    <label for="usNo">No</label>
                                  
                               						 </div>

												</div>
												<div class="form-group">
													<h5>Support Available<span class="text-danger">*</span></h5>
													  <div class="demo-radio-button">
						                                    <input name="support_available" type="radio" id="saYes" value="1" {{($plan->support_available == 1) ? 'checked' : ''}}/>
						                                    <label for="saYes">Yes</label>
						                                    <input name="support_available" type="radio" id="saNo" value="0" {{($plan->support_available == 0) ? 'checked' : ''}} />
						                                    <label for="saNo">No</label>
                                  
                               						 </div>

												</div>
														
													   
														<div class="text-xs-right">
															<button type="submit" class="btn btn-info">Submit</button> 
															<a class=" btn btn-inverse " href="{{ route('admin.plan.index') }}">Cancel</a>
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
					
				@endsection
@section('footer_js') 
   
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    
@endsection 