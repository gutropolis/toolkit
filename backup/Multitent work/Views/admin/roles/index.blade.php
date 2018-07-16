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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Manage Roles</li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">  
								<div class="row">
										<div class="col-sm-5">
												<h4 class="card-title">Roles Management</h4>
												<h6 class="card-subtitle">Roles Management Data </h6>
										</div>
										<div class="col-sm-7 text-right">
											  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModel"><i class="fa fa-plus"></i> Create New Role</button>		
										</div>
								</div>
								<div class="response"></div>
                                <div class="table-responsive m-t-40">
                                    <table id="RoleTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
											<th>Id</th>
											<th>Role Name</th>
											<th>Guard Name</th>
											<th>Created On</th>
											<th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        
							
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
                                            	{!! Form::open(array('route' => 'admin.roles.store','method'=>'POST','class' => 'form-material m-t-40')) !!}
                                                     <div class="form-group">
												<label>Name <span class="help"> e.g. "Admin,Team"</span></label>
                                        
												{!! Form::text('name', null, array('placeholder' => 'Name','id'=>'name','class' => 'form-control form-control-line store_title')) !!}
												<span class="validation_error" id="title_error"></span>
												</div>
                                                  <div class="form-group">
										<strong>Permission:</strong>
										 
											<div class="demo-checkbox">
												@foreach($permission as $value)
													<input  type="checkbox" id="md_checkbox_{{$value->id}}" class="chk-col-green"  name="permission[]" value='{{$value->id}}'    />
													<label for="md_checkbox_{{$value->id}}">{{$value->name}}</label> 
												@endforeach  
											</div>
									</div>
                                                
                                            </div>
                                            <div class="modal-footer">
											 
											
                                                <div class="modal-footer">
												  <button type="submit" class="btn btn-primary store_submit">Submit</button>
                                                <a type="button" href="{{ route('admin.roles.index') }}" class="btn btn-default" data-dismiss="modal">Cancel</a>
                                               
                                            </div>
                                            </div>
											{!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
								
								<!-- End Model Here ------------>
								<!-- Edit Model Here ------------>
							
								<div class="modal fade" id="edit_roles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									 
									<div class="modal-dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content" id="edithtml">
											   <!-- Server Side Code Here -->
										     
											   
											   <!--End here --->
											</div>
										</div>
									</div>
								
								
								<!-- Edit Model Here ---------->
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
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
    
    <!-- end - This is for export functionality only -->
  
<script>

		 $(function() {
        var table = $('#RoleTable').DataTable({			
            processing: true,
            serverSide: true,
            
			ajax: '{!! route('admin.roles.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'guard_name', name: 'guard_name' },
                { data: 'created_at', name:'created_at'},
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
        table.on( 'draw', function () {
            $('.livicon').each(function(){
                $(this).updateLivicon();
            });
        } );
    });

	$("#edit_roles").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id');
			
            $.get( "/admin/roles/edit/"+id, function( data ) {
				console.log(data);
                $(".modal-body").html(data.html);
				$("#roles_select").val(data.data1.name);
				$("#edithtml").html(data.data4);
				
				var url = '<?php echo URL::to('/'); ?>'; 
					$('#update_form').attr('action', url+'/admin/roles/update/'+id);
				
            });

     
		 $(".deleted").click(function(e) {
           var id = $(this).data("id");
		$.get( "/admin/roles/destroy/"+id, function( data ) {
				console.log(data);
              if(data.status == 'deleted'){
				  $('.response').html('<h2>Role Deleted Successfully !!</h2>');
				  window.location.href = "/admin/roles";
				 } 
				 else
				 {
				  $('.response').html('<h2>Permission Not Deleted !!</h2>');
				 }
				
            });

        });
    });
</script>
@endsection 