 $(document).ready(function() {
        
     
        var table = $('#plandata').DataTable({   
            processing: true,
            serverSide: true, 
			ajax: '/admin/datatable/getdata', 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'package_type', name: 'package_type' },
                { data: 'price', name: 'price' },
                { data: 'users_allowed', name:'users_allowed',searchable: true},
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