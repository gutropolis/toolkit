 $(function() {
        var table = $('#PermissionTable').DataTable({			
            processing: true,
            serverSide: true,
            ajax: '/admin/permission/data',  
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
				{ data: 'display_name', name: 'display_name' },
				{ data: 'guard_name' , name: 'guard_name'},
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
	
 $(document).ready(function(){
        $("#edit_permission").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id');
			
            $.get( "/admin/permission/"+id+"/edit/", function( data ) {
				console.log(data);
                $(".modal-body").html(data.html);
				$("#edit_html").html(data);
				$("#name").val(data.name);
				$("#description").val(data.description);
				$("#display_name").val(data.display_name);
				$("#guard_name").val(data.guard_name);
				$("#order").val(data.order);
            });

        });
		 $("#deleted").click(function(e) {
           var id = $(this).data("id");
		   alert(id);
		$.get( "/admin/permission/destroy/"+id, function( data ) {
				console.log(data);
              if(data.status == 'deleted'){
				  $('.response').html('<h2>Permission Deleted Successfully !!</h2>');
				  window.location.href = "/admin/permission";
				 } 
				 else
				 {
				  $('.response').html('<h2>Permission Not Deleted !!</h2>');
				 }
				
            });

        });
    });