$(document).ready(function() { 
        var table = $('#tenantdata').DataTable({   
            processing: true,
            serverSide: true, 
			ajax: '/admin/tenant/data', 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'db_name', name: 'db_name' },
				{ data: 'db_host', name: 'db_host' },
                { data: 'db_username', name: 'db_username' }, 
				{ data: 'db_driver', name: 'db_driver' },
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
	
	 $('#btn_add').click(function(){
        
        $('#planpackageform').trigger("reset");
        $('#mymodel').modal('show');
    });
	
	 $('#btn-save').click(function(){
        var data=$('#tenantform').serialize();
				var $this = $(this);
				var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
				if ($(this).html() !== loadingText) {
				  $this.data('original-text', $(this).html());
				  $this.html(loadingText);
				}
				setTimeout(function() {
				  $this.html($this.data('original-text'));
				}, 2000);
				
				 $.ajax({
	            url: "/admin/checkvalidation",
	            type:'POST',
	            data:data,
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
						//alert('success');
	                	
	                }else{
	                	printErrorMsg(data.error);
						
	                }
					
	            }
	        });
			
			 function printErrorMsg (msg) {
			$(".print-error-msg").find("ul").html('');
			$(".print-error-msg").css('display','block');
			$.each( msg, function( key, value ) {
				$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
			});
		}
    });
	
	//display modal form for Package EDIT ***************************
    $(document).on('click','.edit-modal',function(){
       
	   //get base URL *********************
		var url = $('#hdnurl').val();

        var informid = $(this).data('info') ;
		var actilnurl =   url + '/update/' + informid; 
		 $('#tenantform').attr('action', actilnurl);
        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: url + '/show/' + informid,
            success: function (data) {
                console.log(data);
                $('#tenantid').val(data.id);
                $('#db_host').val(data.db_host);
                $('#db_username').val(data.db_username);
				$('#db_password').val(data.db_password);
				$('#db_port').val(data.db_port);
				$('#db_driver').val(data.db_driver);
                $('#btn-save').val("Update");
                $('#mymodel').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
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
