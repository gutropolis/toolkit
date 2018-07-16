@extends('admin.layouts.app')
@section('header-style') 

@endsection
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Permission Module</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Permission Modules</li>
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
												<h4 class="card-title">Permission Module Management</h4>
												<h6 class="card-subtitle">Modules Management Data </h6>
										</div>
										<div class="col-sm-7 text-right">
											  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModule"><i class="fa fa-plus"></i> Create New Module</button>		
										</div>
								</div>
								<div class="response"></div>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
											<th>Id</th>
											<th>Title</th>
											<th>Description</th>
											<th>Created On</th>
											<th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                       
                                    </table>
									
                                </div>
								
								
								<!-- Add Model Start here ------->
								<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="addModel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Create Permission Module</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            	{!! Form::open(array('route' => 'admin.permissionmodule.store','method'=>'POST')) !!}
                                               <div class="form-group">
													<h5>Title<span class="text-danger">*</span></h5>
												<div class="form-group">
													<input type="text" name="title" class="form-control">
													</div>
												
												</div>
                                                <div class="form-group">
													<h5>Description <span class="text-danger">*</span></h5>
													<div class="controls">
														<textarea  name ="description" rows="4" cols="50"   class="form-control"></textarea>
													</div>
												</div>
                                                
                                            </div>
                                            <div class="modal-footer">
											 
											
                                                <div class="modal-footer">
												 <button type="submit" class="btn btn-primary"  >Submit</button>
                                                <a type="button" href="{{ route('admin.permissionmodule.index') }}" class="btn btn-default" data-dismiss="modal">Cancel</a>
                                               
                                            </div>
                                            </div>
											{!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
								
								<!-- End Model Here ------------>
								<!-- Edit Model Here ------------>
								<div class="modal fade" id="edit_permission_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									 
									<div class="modal-dialog">
										 <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Edit Permission Module</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
											@if ( !empty ( $permissionmodule ) ) 
										   {!! Form::model($permissionmodule, ['method' => 'PATCH', 'id' => 'update_form' ] ) !!} 
                                            	 
                                               <div class="form-group">
													<h5>Title<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" class="form-control" id="title" name="title"  >

												</div>
                                                <div class="form-group">
													<h5>Description <span class="text-danger">*</span></h5>
													<div class="controls">
														<textarea  name ="description" rows="4" cols="50"  id="description" class="form-control"></textarea>
													</div>
												</div>
                                                
                                            </div>
                                            <div class="modal-footer">
											 
											
                                                <div class="modal-footer">
												 <button type="submit" class="btn btn-primary"  >Submit</button>
                                                <a type="button" href="{{ route('admin.permissionmodule.index') }}" class="btn btn-default" data-dismiss="modal">Cancel</a>
                                               
                                            </div>
                                            </div>
											 {!! Form::close() !!}
										  @endif
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
	
    
 
	
    <!-- end - This is for export functionality only -->
	<script>
    $(function() {
        var table = $('#myTable').DataTable({			
            processing: true,
            serverSide: true,
            
			ajax: '{!! route('admin.permissionmodule.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'description', name: 'description' },
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

</script>
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content"></div>
   </div>
</div>
<script>
    $(document).ready(function(){
        $("#edit_permission_modal").on("show.bs.modal", function(e) {
			
            var id = $(e.relatedTarget).data('target-id');
			
            $.get( "/admin/permissionmodule/edit/"+id, function( data ) {
				console.log(data);
                $(".modal-body").html(data.html);
				$("#title").val(data.title);
				$("#description").val(data.description);
				var url = '<?php echo URL::to('/'); ?>'; 
					$('#update_form').attr('action', url+'/admin/permissionmodule/'+id);
            });

        });
		 $(".deleted").click(function(e) {
           var id = $(this).data("id");
		$.get( "/admin/permissionmodule/destroy/"+id, function( data ) {
				console.log(data);
              if(data.status == 'deleted'){
				  $('.response').html('<h2>Plan Deleted Successfully !!</h2>');
				  window.location.href = "/admin/permissionmodule";
				 } 
				 else
				 {
				  $('.response').html('<h2>Plan Not Deleted !!</h2>');
				 }
				
            });
				
            

        });
    });
</script>
	
@endsection 