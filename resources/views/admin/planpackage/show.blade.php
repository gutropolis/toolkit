@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Plan Packages</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Manage Plan Packages</li>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                          
                            <div class="card-body">
                              
                                    <div class="form-body">
										<h3 class="box-title">Show Detail of Plan : {{$packageInfo->plan->title}}</h3>
                                        <hr class="m-t-0 m-b-40"> 
										
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Plan:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> E104, Dharti-2, Near silverstar mall </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">Stripe(product):</label>
                                                    <div class="col-md-7">
                                                        <p class="form-control-static"> {{$packageInfo->plan->stripe_plan_id}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">Razor(Plan):</label>
                                                    <div class="col-md-7">
                                                        <p class="form-control-static"> {{$packageInfo->plan->razor_plan_id}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
									   <h3 class="box-title">Show Detail of Package :{{$packageInfo->slug}}  </h3>
                                        <hr class="m-t-0 m-b-40"> 
										
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Price :</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> $ {{$packageInfo->price}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Package Type:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> {{$packageInfo->package_type}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
										
										
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Status:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">   @if($packageInfo->status =='1') Yes @else No @endif  </p>
                                                    </div>
                                                </div>
                                            </div>
											 <div class="col-md-6">
                                                 <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Interval:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">{{$packageInfo->interval}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div> 
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                 <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Have Trial:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">   @if($packageInfo->status =='1') Yes @else No @endif  </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                               <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Trial Days:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">{{$packageInfo->trial_days}}  </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                         <!--/row-->
								  {!! Form::open(array('route' => ['admin.planpackage.update.paymentgateway', $packageInfo->id ]  , 'accept-charset'=>'UTF-8', 'method'=>'POST','name'=>'planpackageform' )) !!} 
                                       <h3 class="box-title">Gateway Pakage </h3>
                                        <hr class="m-t-0 m-b-40"> 
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Plan:</label>
                                                    <div class="col-md-9">
													<input id="hdnurl" type="hidden" value="{{ url('/') }}">
                                                         <select name="plan_type" id="plan_type" required="" class="form-control" aria-invalid="false">
																@if (count($planData) > 0)
																	 <option value="">Choose Plan</option>
																   @foreach ($planData as $objplan) 
																		<option value="{{$objplan->id}}" @if ($packageInfo->plan_id==$objplan->id)  selected  @endif  >{{$objplan->title}}-{{$objplan->stripe_plan_id}}-{{$objplan->is_razor_plan}}</option> 
																	@endforeach
																
																@endif
														</select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									    <h3 class="box-title">Stripe Pakage </h3>
                                        <hr class="m-t-0 m-b-40"> 
										<!-- Stripe Plans ------------>
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Stripe Package Name :</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> $ {{$packageInfo->stripe_package_id}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Change Package:</label>
                                                    <div class="col-md-9">
                                                        
														<select name="stripe_package_id" id="stripe_package_id" required="" class="form-control" aria-invalid="false">
															@if (count($stripePkgList) > 0)
																 <option value="">Choose Package</option>
															   @foreach ($stripePkgList as $objplan) 
															   
																	@if ($packageInfo->stripe_package_id==$objplan->id) 
																		
																		<option    selected="selected"   value="{{$objplan->id}}" >{{$objplan->id}}#{{$objplan->interval}}#{{$objplan->billing_scheme}}</option> 
																	@else
																		<option      value="{{$objplan->id}}" >{{$objplan->id}}#{{$objplan->interval}}#{{$objplan->billing_scheme}}</option> 
																	@endif 
																@endforeach
															
															@endif
														</select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div> 
                                        <!--/row-->
									 <h3 class="box-title">Razor Pakage </h3>
                                        <hr class="m-t-0 m-b-40"> 
                                      <!-- Razor Plans ------------>
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Razor Package Name :</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> $ {{$packageInfo->razor_package_id}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Change Package:</label>
                                                    <div class="col-md-9">
                                                        
														<select name="razor_package_id" id="razor_package_id"  class="form-control" aria-invalid="false">
															 <option value="">Choose Package</option>
														</select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div> 
                                        <!--/row-->   
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
	 
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
 
@endsection
@section('footer_js')
<script>
    //Select country first

</script> 
@endsection 