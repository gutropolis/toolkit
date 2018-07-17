 $(function() {
        var table = $('#RoleTable').DataTable({			
            processing: true,
            serverSide: true,
            
			 ajax: '/admin/roles/data', 
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
