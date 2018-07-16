@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
			<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"> Edit User</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"> Edit User</a></li>
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
													<h4 class="card-title"> Edit User</h4>
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
													
												   {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.update', $user->id]]) !!}

														<div class="form-group">
															<h5>Full Name <span class="text-danger">*</span></h5>
															<div class="controls">
																<input type="text" name="name" class="form-control" value="{{ $user->name }}"> </div>
															
														</div>
														<div class="form-group">
															<h5>Email <span class="text-danger">*</span></h5>
															<div class="controls">
																<input type="email" name="email" value="{{ $user->email }}" class="form-control"></div>
														</div>
														<div class="form-group">
															<h5>Password <span class="text-danger">*</span></h5>
															<div class="controls">
																<input type="password" name="password" class="form-control"></div>
														</div>
														<div class="form-group">
															<h5>Confirm Password <span class="text-danger">*</span></h5>
															<div class="controls">
																<input type="password" name="confirm-password" class="form-control" > </div>
														</div>
														 <div class="form-group">

															<h5>Role <span class="text-danger">*</span></h5>

													 {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}

															</div>
													   
														<div class="text-xs-right">
															<button type="submit" class="btn btn-info">Submit</button> 
															<a class=" btn btn-inverse " href="{{ route('admin.users.index') }}">Cancel</a>
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