 $(document).ready(function(){
	  $(function() {
        var table = $('#myTable').DataTable({			
            processing: true,
            serverSide: true,
            ajax: '/admin/permissionmodule/data',   
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