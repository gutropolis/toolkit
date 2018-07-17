//Add Datatables Listing for showing //
	$(document).ready(function() { 
        var table = $('#plandata').DataTable({   
            processing: true,
            serverSide: true, 
			ajax: '/admin/plans/getdata', 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'description', name: 'description' },
                { data: 'created_at', name:'created_at'},
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
             columnDefs : [
        { targets : [3],
          render : function (data, type, row) {
             return data == 1 ? 'Yes' : 'No'
          }
        }
        ]
        });
        table.on( 'draw', function () {
            $('.livicon').each(function(){
                $(this).updateLivicon();
            });
        } );
    });
        
        
 //On click, showing the popup in edit mode //   
   $(document).on('click', '.edit-modal', function() {
		 var plan = $(this).data('info') 
		  $.ajax({
	        type: "get",
			data:{},
	        url:"/admin/plans/edit/"+plan,
	        
	    }).done(function(data) {
				console.log(data); 
				$("#edithtml").html(data.htmlcontent); 
				$('#myModalPlan').modal('show');; 
	    }); 	
	});
	
// For A Delete Record Popup

$('#confirmDelete').on('show.bs.modal', function (e) {
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);
 
      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });
 $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });