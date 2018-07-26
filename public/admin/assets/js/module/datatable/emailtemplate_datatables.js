//Add Datatables Listing for showing //
$(document).ready(function() { 
        var table = $('#emailtemplate_data').DataTable({   
            processing: true,
            serverSide: true, 
			ajax: '/admin/emailtemplate/data', 
            columns: [
                 { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
				{ data: 'type', name: 'type' }, 
                { data: 'subject', name:'subject'},
                { data: 'from_name', name:'from_name'},
                { data: 'created_at', name:'created_at'},
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
           
        });
        table.on( 'draw', function () {
            $('.livicon').each(function(){
                $(this).updateLivicon();
            });
        } );
    });
        
 

 //display modal form for creating new product *********************
    $('#btn_add').click(function(){
       
        $('#emailtemplate_form').trigger("reset");
        $('#emailtemplate_add').modal('show');
    }); 
	  
	$('#btn-save, #btn-update').click(function() {
       
		var $this = $(this);
		var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
		if ($(this).html() !== loadingText) {
		  $this.data('original-text', $(this).html());
		  $this.html(loadingText);
		}
		setTimeout(function() {
		  $this.html($this.data('original-text'));
		}, 2000);
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