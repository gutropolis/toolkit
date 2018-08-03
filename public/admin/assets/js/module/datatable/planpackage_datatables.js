//Add Datatables Listing for showing //
$(document).ready(function() { 
        var table = $('#planpackagdata').DataTable({   
            processing: true,
            serverSide: true, 
			ajax: '/admin/planpackage/data', 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'plan_name', name: 'plan_name' },
				{ data: 'price', name: 'price' },  
				{ data: 'package_type', name: 'package_type' },
				{ data: 'users_limit', name: 'users_limit' },
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
        
        $('#planpackageform').trigger("reset");
        $('#mymodel').modal('show');
    });
	
	  
	 $('#btn-save').click(function(){
        
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

 //display modal form for Package EDIT ***************************
    $(document).on('click','.edit-modal',function(){
       
	   //get base URL *********************
		var url = $('#hdnurl').val();

        var informid = $(this).data('info') ;
		var actilnurl =   url + '/update/' + informid; 
		 $('#planpackageform').attr('action', actilnurl);
        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: url + '/fetchpkg/' + informid,
            success: function (data) {
                console.log(data);
                $('#hdnpkgid').val(data.id);
                $('#plan_type').val(data.plan_id);
                $('#price').val(data.price);
				$('#package_type').val(data.package_type);
				$('#trial_days').val(data.trial_days);
				$('#users_allowed').val(data.users_allowed);
				$('#users_limit').val(data.users_limit); 
				if(data.have_trial == '1'){ $('#have_trial').prop('checked', true); } 
				if(data.support_available =='1'){ $('#support_available').prop('checked', true); } 
                $('#btn-save').val("Update");
                $('#mymodel').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

  //display modal form for creating new product *********************
     
	
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
  
//Change plan package on change plan
$('select[name="plan_type"]').on('change', function() {
    var plan_id = $(this).val();
	 var hdnurl = $('#hdnurl').val();
     
    $.ajax({
        type: "get",
		dataType: "json",
        url: hdnurl+"/admin/planpackage/gatewaypkg/"+plan_id, 
        success: function (data) {
			 $('select[name="plan_type"]').prop("disabled", false);
                   //remove disabled from province and change the options
                   // $('select[name="province"]').prop("disabled", false);
                    //$('select[name="province"]').html(data.response);
					 $('#stripe_package_id').html('');
					 var div_data="";
					$.each(data.stripePkg,function(i,obj) {
						
						 console.log(obj.id+":"+obj.interval);
						 console.log("<option value='"+obj.id+"'>"+obj.id+"#"+obj.interval+"#"+obj.billing_scheme+"</option>");
						div_data =  div_data+"<option value='"+obj.id+"'>"+obj.id+"#"+obj.interval+"#"+obj.billing_scheme+"</option>";
						console.log(div_data);
						 
					});  
					$('#stripe_package_id').html(div_data); 
                 
        }
    });
});