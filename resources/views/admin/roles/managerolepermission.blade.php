@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Users</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Manage Users</li>
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
		{!! Form::model($role, ['method' => 'POST','route' => ['admin.role-managment.update', $role->id]]) !!}
            <div class="row page-titles" >
                <div class="col-lg-12 text-center">
					 <strong>Role Name:</strong> {{ $role->name }} <button type="submit"   data-id="{{ $role->name }}" class="btn btn-info" ><i class="fa fa-plus"></i> Update Permission</button>		
					 	 
                </div>
            </div>
          				 
			 <div class="row">	 
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
					<div class="table-responsive">
                                    <table class="table color-table info-table">
                                        <thead>
                                            <tr>
                                                <th>Department</th>
                                                <th>List</th>
                                                <th>Create</th>
                                                <th>Edit</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										@if(!empty($arrmodulePermission))
 
											@foreach($arrmodulePermission as $module)
												<tr>
															<td>
															   <h4 class="card-title">
															       {{ $module['module_title'] }}
															  </h4>
															</td>
														  
															 @foreach( $module['module_permissions'] as $permission)
																													 
																	<td>  
																		  <input  id="md_checkbox_{{ $permission['id'] }}"  value="{{ $permission['id'] }}" class="chk-col-red" {{ $permission['is_assign_role']}} name='permission[]' type="checkbox">
																		  <label for="md_checkbox_{{ $permission['id'] }}"   data-container="body" title="{{$permission['display_name']}}" data-toggle="popover" data-placement="top" data-content="{{ $permission['description'] }}" >{{$permission['name'] }} </label>
																	</td> 
															 @endforeach
												</tr> 

											@endforeach

										@endif  
                                        </tbody>
                                    </table>
                                </div>
					
					</div> 

				</div>

			</div>
		</form>	 
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
    <script src="{{ URL::to('admin/assets/js/module/custom_fx_role.js') }}"></script>
@endsection