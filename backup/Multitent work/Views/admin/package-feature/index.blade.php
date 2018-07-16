@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h3 class="text-themecolor">Manage Package Features Types</h3>
			</div>
			<div class="col-md-7 align-self-center">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
					<li class="breadcrumb-item active">Manage Package Features Types</li>
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
					<div class="row"> 
							<div class="col-sm-5">
								<h4 class="card-title">Package Features Mangement</h4>
								<h6 class="card-subtitle">Package Features Management Data </h6> 
							</div>
							<div class="col-sm-7 text-right">
								 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModel"><i class="fa fa-plus"></i> Add New Package Feature</button>
								 <div class="response"></div>
							</div>
						</div>
					<div class="table-responsive m-t-40">
						<table id="myTable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Title</th>
									<th>Description</th>
									<th>Order By</th>	
									<th>Package Id</th>									
									<th>Created At</th>									
								</tr>
							</thead>
							<tbody>
							@if ( !empty ( $package_features ) ) 
								@foreach ($package_features as $package_feature)
								<tr>
									<td>{{ ++$i }}</td>
									<td>{{ $package_feature->title }}</td>
									<td>{{ $package_feature->description }}</td>
									<td>{{ $package_feature->order_by}}</td>
									<td>{{ $package_feature->package_id}}</td>
									<td>{{ $package_feature->created_at}}</td>
									<td>
									   
									   <button type="button" class="btn btn-info" data-toggle="modal" data-target-id="{{ $package_feature->id }}"  data-target="#edit_modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
									    <button  class="btn btn-danger edit delete_plan" data-id="{{ $package_feature->id }}" data-target="#editModel" role="button" aria-pressed="true"> 
									   <i class="fa fa-trash" aria-hidden="true"></i>
									   </button>  
									</td>
								</tr>
								@endforeach
							@endif
							</tbody>
						</table>
						 
					</div>
					
					<!-- Add Model Start here ------->
						<div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="addModel">
						   <div class="modal-dialog" role="document">
							  <div class="modal-content">
								 <div class="modal-header">
									<h4 class="modal-title" id="exampleModalLabel1">New message</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								 </div>
								 <div class="modal-body">
									{!! Form::open(array('route' => 'admin.package-feature.store','method'=>'POST','class' => 'form-material m-t-40')) !!}
									<div class="form-group">
									   <label>Package Feature Title</label>
									   {!! Form::text('title', null, array('placeholder' => '','class' => 'form-control form-control-line store_title')) !!}
									   <span class="validation_error" id="store_title_error"></span>
									</div>
									<div class="form-group">
									   <strong>Package Feature Description:</strong>
									   <div class="demo-checkbox"> 
										  {!! Form::textarea('description', null, array('placeholder' => '', 'class' => 'form-control form-control-line store_description')) !!}
										    <span class="validation_error" id="store_description_error"></span>
									   </div>
									</div>
									<div class="form-group">
									   <label>Order By</label>
									   {!! Form::text('order_by', null, array('placeholder' => '','class' => 'form-control form-control-line store_order_by')) !!}
									     <span class="validation_error" id="store_order_by_error"></span>
									</div>
									<div class="form-group">
										<label>Plan Package Id <span class="help"></span></label>                                        
										<select name="package_id" class="store_plan_package"> 
											<option value="0" selected>Select Plan Package</option>
											@foreach($plan_packages as $plan_package)
											<option value="{{$plan_package->id}}">{{$plan_package->id}}</option>
											@endforeach
										</select>
										  <span class="validation_error" id="plan_package_error"></span>
									</div>
								</div>
								 <div class="modal-footer">
									<div class="modal-footer">
									   <button type="submit" class="btn btn-primary store_submit">Submit</button>
									   <a type="button" href="{{ route('admin.package-feature.index') }}" class="btn btn-default" data-dismiss="modal">Cancel</a>
									</div>
								 </div>
								 {!! Form::close() !!}
							  </div>
						   </div>
						</div>
						<!-- End Model Here ------------>
						
						<!-- STARTS Edit Model Here ------------>
						<!-- Edit Model Here ------------>
							<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							   <div class="modal-dialog">
								  <div class="modal-dialog" role="document">
									 <div class="modal-content">
										<div class="modal-header"> 
										   <h4 class="modal-title" id="exampleModalLabel1">New message</h4>
										   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<div class="modal-body">
										@if ( !empty ( $package_features ) ) 
										   {!! Form::model($package_features, ['method' => 'PATCH','route' => ['admin.package-feature.update', $package_feature->id] ,  'id' =>"update_form"] ) !!}
											  
										   <div class="form-group">
											  <label>Package Feature Title :<span class="help"> e.g. "Admin,Teamss"</span></label>
											  <input type="text" name="title" class="form-control update_title" id="roles_select"  >
											   <span class="validation_error" id="update_title_error"></span>
										   </div>
										   <div class="form-group">
											  <strong>Package Feature Description :</strong>
											  <div class="demo-checkbox">
												 <textarea id="description" name="description" rows="4" cols="40" class="update_description"></textarea> 
											  </div>
											   <span class="validation_error" id="update_description_error"></span>
										   </div>
											<div class="form-group">
											  <label>Order By: </label>
											  <input type="text" name="order_by" class="form-control update_order_by" id="order_by"  />
											   <span class="validation_error" id="update_order_by_error"></span>
										   </div>
										    <div class="form-group">
												<label>Plan Package Id <span class="help"></span></label>                                        
												<select name="package_id"  class="update_plan_package">
													<option value="0" selected>Select Plan Package</option>
													@foreach($plan_packages as $plan_package)
													<option value='{{$plan_package->id}}' {{($package_feature->package_id == $plan_package->id) ? 'selected' : ''}} >{{$plan_package->id}}</option>
													@endforeach
												</select>
												 <span class="validation_error" id="update_plan_package_error"></span>
											</div> 
										   <button type="submit" class="btn btn-primary update_submit">Submit</button>
										   <a class="btn btn-inverse" href="{{ route('admin.package-feature.index') }}">Cancel</a>
										   {!! Form::close() !!}
										  @endif
										</div>
									 </div>
								  </div>
							   </div>
							 </div>   
						<!--ENDS Edit Model Here ----------> 
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
	
     <!-- This is data table -->
    <script src="{{ URL::to('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
   <script>
   $(document).ready(function() {
       $('#myTable').DataTable();
   });
</script>
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content"></div>
   </div>
</div>
   	<script>
	
	/*<!---------------Validation for storing data-------STARTS HERE-------------------------------------------------------------------->*/   
			function validate_store() {
				
					var output = true; 
					$('.validation_error').html('');	
					var title = $('.store_title').val();  
					var description = $('.store_description').val();  
					var order_by = $('.store_order_by').val();  
					var plan_package = $('.store_plan_package').val();  
					
					if(title == ""){
						$('#store_title_error').html('<h5 style="color:red">Plan Title is required !!</h5>'); 
						 output = false;
					}

					if(description == ""){
						$('#store_description_error').html('<h5 style="color:red">Plan description is required !!</h5>'); 
						 output = false;
					}
					if(order_by == ""){
						$('#store_order_by_error').html('<h5 style="color:red">Plan Order is required !!</h5>'); 
						 output = false;
					}
					if(plan_package == '0'){
						$('#plan_package_error').html('<h5 style="color:red">Plan Package is required !!</h5>'); 
						 output = false;
					}
					return output;
			}
		 
			  
			 $('.store_submit').click(function(){
				 var get_return_val = validate_store(); 
				 if(get_return_val == false){ 
					 return false;
				 } 
			 });
			 
	/*<!---------------Validation for storing data-------ENDS HERE-------------------------------------------------------------------->*/ 
	
	/*<!---------------Validation for Update data-------Starts HERE-------------------------------------------------------------------->*/ 
			
			function validate_update() {
				
					var output = true; 
					$('.validation_error').html('');	
					var title = $('.update_title').val();  
					var description = $('.update_description').val();  
					var order_by = $('.update_order_by').val();  
					var plan_package = $('.update_plan_package').val();  
					
					if(title == ""){
						$('#update_title_error').html('<h5 style="color:red">Package Feature Title is required !!</h5>'); 
						 output = false;
					}

					if(description == ""){
						$('#update_description_error').html('<h5 style="color:red">Package Feature description is required !!</h5>'); 
						 output = false;
					}
					if(order_by == ""){
						$('#update_order_by_error').html('<h5 style="color:red">Package Feature Order is required !!</h5>'); 
						 output = false;
					}
					if(plan_package == '0'){
						$('#update_plan_package_error').html('<h5 style="color:red">Plan Package is required !!</h5>'); 
						 output = false;
					}
					return output;
			}
			
			$('.update_submit').click(function(){
				 var get_return_val = validate_update();
				 if(get_return_val == false){ 
					 return false;
				 } 
			 });
			 
	/*<!---------------Validation for Update data-------ends HERE-------------------------------------------------------------------->*/ 
	
   		  $(document).ready(function(){
			$("#edit_modal").on("show.bs.modal", function(e) {
				var id = $(e.relatedTarget).data('target-id');
				 
				$.get( "/admin/package-feature/"+id+"/edit/", function( data ) {
					console.log(data);
					$(".modal-body").html(data.html);  
					$("#roles_select").val(data.package_feature.title);
					$("#description").val(data.package_feature.description);
					$("#package_id").val(data.package_feature.package_id);
					$("#order_by").val(data.package_feature.order_by);
					var url = '<?php echo URL::to('/'); ?>'; 
					$('#update_form').attr('action', url+'/admin/package-feature/'+id);
				});

			});
			
			 $(".delete_plan").click(function(e) {
			   var id = $(this).data("id");
				 
				$.get( "/admin/package-feature/destroy/"+id, function( data ) {
					console.log(data); 
					if(data.status == 'deleted'){
						$('.response').html('<h2>Plan Deleted Successfully !!</h2>');
						window.location.href = "/admin/package-feature";
					}	
					else
					{
						$('.response').html('<h2>Plan Not Deleted !!</h2>');
					}
				});

			});
		});

   	</script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    
    
@endsection 