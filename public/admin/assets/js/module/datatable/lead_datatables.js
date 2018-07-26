 $(document).ready(function() {
        
     
        var table = $('#leaddata').DataTable({   
            processing: true,
            serverSide: true, 
			ajax: '/admin/lead/data', 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'first_name', name: 'first_name' },
                { data: 'last_name', name: 'last_name' },
                { data: 'lead_owner', name:'lead_owner',searchable: true},
				{ data: 'company', name:'company',searchable: true},
				{ data: 'created_at', name:'created_at',searchable: true},
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
       
        });
        table.on( 'draw', function () {
            $('.livicon').each(function(){
                $(this).updateLivicon();
            });
        } );
		
		
		
		
		
    });
	
        
      $('#btn-save').click(function(){
		  
		  $data=$('#leadform').serialize();
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
	            data:$data,
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
    
    
	
	function showPlan(id)
	{
		var planid=id;
		//alert(planid);
		
		
		 $.ajax({
	        type: "get",
	        url:"/admin/plan/"+planid,
	        data:{},
	    }).done(function(msg) {
			console.log(msg['plan']['plan_id']);
	        $( "#showplanid" ).html(msg['plan']['plan_id']);
			$( "#showprice" ).html(msg['plan']['price']);
			$( "#showpricemonth" ).html(msg['plan']['price_month']);
			$( "#showusallow" ).html(msg['plan']['users_allowed']);
			
			
			$('#showPlan').modal('show');
	       //alert('successfull');
	    });
	}
	
	function editPlan(id)
	{
		var planid=id;
		//alert(planid);
		
		
		 $.ajax({
	        type: "get",
	        url:"/admin/editPlan/"+planid,
	        data:{},
	    }).done(function(msg) {
			//var planing = msg.plan;
			// planing : msg.plan;
			//console.log(planing);
		
			//$( "#price_month" ).val(msg.price_month);
			
			console.log(msg['plan']);
			var planid=msg['plan']['id'];
			
			
			$('#planid').val(msg['plan']['id']);
			
			//$('#planid').html('{{!! Form::model($plan, ['method' => 'PATCH','route' => ['admin.plan.update', $plan->id]]) !!}}');
			$('#plan_id').val(msg['plan']['plan_id']).prop('selected', true);
			$('#package_type').val(msg['plan']['package_type']).prop('selected', true);
			$( "#price" ).val(msg['plan']['price']);
			$( "#price_month" ).val(msg['plan']['price_month']);
			$( "#price_yearly" ).val(msg['plan']['price_yearly']);
			$( "#price_yearly" ).val(msg['plan']['price_yearly']);
			
			var have_trial=msg['plan']['have_trial'];
			if(have_trial==1)
			{
				$( "#EYes").prop('checked', true);
			}
			else{
				$( "#ENo").prop('checked', true);
			}
			
			
			var userallow=msg['plan']['users_allowed'];
			if(userallow==1)
			{
				$( "#EusYes").prop('checked', true);
			}
			else{
				$( "#EusNo").prop('checked', true);
			}
			var support_available=msg['plan']['support_available'];
			if(support_available==1)
			{
				$( "#EsaYes").prop('checked', true);
			}
			else{
				$( "#EsaNo").prop('checked', true);
			}
			
			$('#editPlan').modal('show');
			
			
	      // $( "#editplanpackage" ).html(msg);
	       //alert('successfull');
	    });
	}
	
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