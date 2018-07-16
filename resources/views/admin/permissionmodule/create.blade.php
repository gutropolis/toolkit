@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
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
												<h4 class="card-title">Create Permission Module</h4> @if (count($errors) > 0)

												<div class="alert alert-danger">

													<strong>Whoops!</strong> There were some problems with your input.
													<br>
													<br>

													<ul>

														@foreach ($errors->all() as $error)

														<li>{{ $error }}</li>

														@endforeach

													</ul>

												</div>

												@endif {!! Form::open(array('route' => 'admin.permissionmodule.store','method'=>'POST')) !!}
												<div class="form-group">
													<h5>Title<span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name="title" class="form-control"> </div>

												</div>
												<div class="form-group">
													<h5>Description <span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="textarea" name ="description" rows="4" cols="50"  name="email" class="form-control">
													</div>
												</div>
												
												

												<div class="text-xs-right">
													<button type="submit" class="btn btn-success">Submit</button>
													<a class="btn btn-info" href="{{ route('admin.permissionmodule.index') }}">Cancel</a>
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