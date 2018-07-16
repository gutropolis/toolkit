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
												<h4 class="card-title">Edit Permission</h4> @if (count($errors) > 0)

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

												@endif  
												
												{!! Form::model($permission, ['method' => 'PATCH','route' => ['admin.permission.update', $permission->id]]) !!}
												
												<div class="form-group">
													<h5>Select Module<span class="text-danger">*</span></h5>
													<div class="controls">
														<select name="module"   class="form-control">
														<option >Select...</option>
															
															
														@foreach($module as $modules)
															<option value="{{ $modules->id }}" @if($modules->id == $permission->module) selected='selected' @endif >{{ $modules->title }}</option>
														@endforeach
													
														</select>
														</div>

												</div>
												
												
												
												<div class="form-group">
													<h5>Title<span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name="name" value= "{{ $permission->name }}" class="form-control"> </div>

												</div>
												<div class="form-group">
													<h5>Display Name<span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name="display_name" value=" {{ $permission->display_name }}" class="form-control"> </div>

												</div>
												<div class="form-group">
													<h5>Description <span class="text-danger">*</span></h5>
													<div class="controls">
														<textarea rows="4" cols="50"   name ="description" class="form-control"> {{ $permission->description }} </textarea>
													</div>
												</div>
												<div class="form-group">
													<h5>Order <span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name ="order"   value=" {{ $permission->order }}"   name="order" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<h5>Guard Name <span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name ="guard_name"   value=" {{ $permission->guard_name }}"   name="guard_name" class="form-control">
													</div>
												</div>
												
												

												<div class="text-xs-right">
													<button type="submit" class="btn btn-success">Update</button>
													<a class="btn btn-info" href="{{ route('admin.permission.index') }}">Cancel</a>
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