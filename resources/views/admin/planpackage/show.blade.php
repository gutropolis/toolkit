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
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Show Detail</h4>
            
            <a class=" btn btn-info btn-md pull-right " href="{{ route('admin.plan.index') }}"><i class="fa fa-user"></i> Back</a>
            <div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">


                        <strong>Plan ID:</strong>
                        @if(!empty($planTypeID))

                     @foreach($planTypeID as $planid)
                        @if($planid->id == $plan->plan_id)

                        {{ $planid->title }}

                        @endif

                     @endforeach

                 @endif

                    </div>
                 </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">

						<strong>Package Type:</strong>

						{{ $plan->package_type }}

					</div>

				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">

					<div class="form-group">

						<strong>Price:</strong>

						{{ $plan->price }}

					</div>

				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Price Month:</strong>

                        {{ $plan->price_month }}

                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Price Yearly:</strong>

                        {{ $plan->price_yearly }}

                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">
                        <strong>Have Trail:</strong>
                         @if($plan->have_trial == 1)
                         <strong>Yes</strong>

                         @else

                          <strong>No</strong>

                         @endif

                        

                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">
                        <strong>User Allowed:</strong>

                         @if($plan->users_allowed == 1)
                         <strong>Yes</strong>

                         @else

                          <strong>No</strong>

                         @endif
                        
                       

                    </div>

                </div>

				<div class="col-xs-12 col-sm-12 col-md-12">

					<div class="form-group">
                        <strong>Support Available:</strong>
						@if($plan->support_available == 1)
                         <strong>Yes</strong>

                         @else

                          <strong>No</strong>

                         @endif
                       

					</div>

				</div>

			</div>
        </div>
    </div>
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
    
@endsection 