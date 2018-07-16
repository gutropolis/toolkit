@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create New User</h4>
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
                                
                               {!! Form::open(array('route' => 'admin.users.store','method'=>'POST')) !!}
                                    <div class="form-group">
                                        <h5>Full Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control"> </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <h5>Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control"></div>
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

										<strong>Role:</strong>

								{!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}

										</div>
                                   
                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <button type="reset" class="btn btn-inverse">Cancel</button>
                                    </div>
                                {!! Form::close() !!}
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