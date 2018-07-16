@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h3 class="text-themecolor">Manage Opportunity Types</h3>
			</div>
			<div class="col-md-7 align-self-center">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
					<li class="breadcrumb-item active">Manage Opportunity Types</li>
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
							<h4 class="card-title">Opportunity Mangement</h4>
							<h6 class="card-subtitle">Opportunity Management Data </h6>
						</div>
						<div class="col-sm-7 text-right">
							  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModel"><i class="fa fa-plus"></i> Add New Opportunity</button>
						</div>
					</div>
					<div class="response"></div>
					<div class="table-responsive m-t-40">
						<table id="myTable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Opportunity</th>
									<th>Stages</th>
									<th>Probability</th>	 			
									<th>Created At</th>									
								</tr>
							</thead>
							<tbody>
							 
							@if ( !empty ( $opportunities ) ) 
								@foreach ($opportunities as $opportunity)
								<tr>
									<td>{{ ++$i }}</td> 
									<td>{{ $opportunity->opportunity }}</td>
									<td>{{ $opportunity->stages }}</td>
									<td>{{ $opportunity->probability}}</td> 
									<td>{{ $opportunity->created_at}}</td>
									<td> 
									   <button type="button" class="btn btn-info edit_plan" data-toggle="modal" data-target-id="{{ $opportunity->id }}" data-edit_id="{{$opportunity->id}}" data-target="#edit_modal">
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
									   </button>
									   <button  class="btn btn-danger edit delete_plan" data-id="{{ $opportunity->id }}" data-target="#editModel" role="button" aria-pressed="true"> 
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
									{!! Form::open(array('route' => 'admin.opportunity.store','method'=>'POST','class' => 'form-material m-t-40')) !!}
									<div class="form-group">
									   <label>Opportunity</label>
									   {!! Form::text('opportunity', null, array( 'class' => 'form-control form-control-line store_opportunity')) !!}
									   <span class="validation_error" id="store_opportunity_error"></span>
									</div>
									<div class="form-group">
									   <strong>Stages :</strong>
									   <div class="demo-checkbox"> 
										  {!! Form::textarea('stages', null, array('class' => 'form-control form-control-line store_stages')) !!}
										    <span class="validation_error" id="store_stages_error"></span>
									   </div>
									</div>
									<div class="form-group">
									   <label>Probability</label>
									   {!! Form::text('probability', null, array('class' => 'form-control form-control-line store_probability')) !!}
									     <span class="validation_error" id="store_probability_error"></span>
									</div>
									<div class="form-group">
										<label>Lost_reason <span class="help"></span></label> 
										{!! Form::text('lost_reason', null, array('class' => 'form-control form-control-line store_lost_reason')) !!}
										 <span class="validation_error" id="store_lost_reason_error"></span>
									</div> 
								</div>
								 <div class="modal-footer">
									<div class="modal-footer">
									   <button type="submit" class="btn btn-primary store_submit">Submit</button>
									   <a type="button" href="{{ route('admin.opportunity.index') }}" class="btn btn-default" data-dismiss="modal">Cancel</a>
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
										   <button type="button" class="close close_edit_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<div class="modal-body">  
										   
										    {!! Form::model($opportunity, ['method' => 'PATCH','route' => ['admin.opportunity.update', $opportunity->id] , 'id' =>"update_form" ]) !!}
											     
											   {!! csrf_field() !!}
										   <div class="form-group">
											  <label>Opportunity : </label>
											  <input type="text" name="opportunity" class="form-control update_opportunity" id="opportunity"  >
											   <span class="validation_error" id="update_opportunity_error"></span>
										   </div>
										   <div class="form-group">
											  <strong>Stages :</strong>
											  <div class="demo-checkbox">
												 <textarea id="stages" name="stages" rows="4" cols="40" class="update_stages"></textarea> 
											  </div>
											   <span class="validation_error" id="update_stages_error"></span>
										   </div>
											<div class="form-group">
											  <label>Probability :</label>
											  <input type="text" name="probability" class="form-control update_probability" id="probability"  />
											   <span class="validation_error" id="update_probability_error"></span>
										   </div>
										    <div class="form-group">
												<label>Lost Reason<span class="help"></span></label>                                        
												 <input type="text" name="lost_reason" class="form-control update_lost_reason" id="lost_reason"  >
												 <span class="validation_error" id="update_lost_reason_error"></span>
											</div> 
										   <button type="submit update_submit" class="btn btn-primary update_submit">Submit</button>
										   <a class="btn btn-inverse" href="{{ route('admin.opportunity.index') }}">Cancel</a>
											 
											   {{ Form::close() }}
										  
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
					var opportunity = $('.store_opportunity').val();  
					var stages = $('.store_stages').val();  
					var probability = $('.store_probability').val();  
					var lost_reason = $('.store_lost_reason').val();  
					
					if(opportunity == ""){
						$('#store_opportunity_error').html('<h5 style="color:red">Opportunity is required !!</h5>'); 
						 output = false;
					}

					if(stages == ""){
						$('#store_stages_error').html('<h5 style="color:red">Stages is required !!</h5>'); 
						 output = false;
					}
					if(probability == ""){
						$('#store_probability_error').html('<h5 style="color:red">Probabilityis required !!</h5>'); 
						 output = false;
					}
					if(lost_reason == ''){
						$('#store_lost_reason_error').html('<h5 style="color:red">Lost Reason is required !!</h5>'); 
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
					var opportunity = $('.update_opportunity').val();  
					var stages = $('.update_stages').val();  
					var probability = $('.update_probability').val();  
					var lost_reason = $('.update_lost_reason').val();  
					
					if(opportunity == ""){
						$('#update_opportunity_error').html('<h5 style="color:red">Opportunity is required !!</h5>'); 
						 output = false;
					}

					if(stages == ""){
						$('#update_stages_error').html('<h5 style="color:red">Stages is required !!</h5>'); 
						 output = false;
					}
					if(probability == ""){
						$('#update_probability_error').html('<h5 style="color:red">Probability is required !!</h5>'); 
						 output = false;
					}
					if(lost_reason == ''){
						$('#update_lost_reason_error').html('<h5 style="color:red">Lost Reason  is required !!</h5>'); 
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
				 
				$.get( "/admin/opportunity/"+id+"/edit/", function( data ) {
					console.log(data);
					$(".modal-body").html(data.html); 
					$("#opportunity").val(data.opportunities.opportunity);		
					$("#stages").val(data.opportunities.stages);
					$("#probability").val(data.opportunities.probability);
					$("#lost_reason").val(data.opportunities.lost_reason); 
					var url = '<?php echo URL::to('/'); ?>'; 
					$('#update_form').attr('action', url+'/admin/opportunity/'+id);  
					
				});

			});
			
			 $(".delete_plan").click(function(e) {
			   var id = $(this).data("id");
				 
				$.get( "/admin/opportunity/destroy/"+id, function( data ) {
					console.log(data); 
					if(data.status == 'deleted'){
						$('.response').html('<h2>Plan Deleted Successfully !!</h2>');
						window.location.href = "/admin/opportunity";
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