@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
			<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Manage Roles</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Role</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <div>
					<div class="pull-left">
						<h2>Edit Role</h2>
					</div>
					<div class="pull-right">
						<a class="btn btn-primary" href="{{ route('admin.plans.index') }}"> Back</a>
					</div>
                     
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
				<!--Role Start Here -->
				<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Manage Roles</h4>
                                 
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
								{!! Form::model($package_feature, ['method' => 'PATCH','route' => ['admin.package-feature.update', $package_feature->id]]) !!}

                               
                                    <div class="form-group">
                                        <label>Title <span class="help"></span></label>                                        
										{!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control form-control-line')) !!}
									</div> 
									
									<div class="form-group">
										<strong>Permission:</strong>										 
										{!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control form-control-line')) !!}
									</div>
                                    <div class="form-group">
                                        <label>Order By <span class="help"></span></label>                                        
                                        {!! Form::text('order_by', null, array('placeholder' => 'Order By','class' => 'form-control form-control-line')) !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Package Id <span class="help"></span></label>                                        
                                        <select name="package_id"> 
                                            @foreach($plan_packages as $plan_package)
                                            <option value='{{$plan_package->id}}' {{($package_feature->package_id == $plan_package->id) ? 'selected' : ''}} >{{$plan_package->id}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                 
                                  <button type="submit" class="btn btn-primary">Submit</button><a class=" btn btn-inverse " href="{{ route('admin.package-feature.index') }}">Cancel</a>
                                {!! Form::close() !!}
                            </div>
                        </div>
				<!-- Role End here ------>
						 
					</div>
			 </div>
					
				@endsection
@section('footer_js') 
	<script src="{{ URL::to('admin/assets/js/jasny-bootstrap.js') }}"></script>
 
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    
@endsection 