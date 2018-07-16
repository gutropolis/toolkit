$(document).ready(function() {

  $('#planform').validate({ 
       rules: {
       plan_id: {
            required: true
             },
	   package_type: {
         required: true
        },
			
	price: {
      required: true
      },
	   price_month: {
         required: true
        },
		 price_yearly: {
         required: true
        },
		
	 
  },
  messages: {
	   plan_id:
	  {
		  required: "Please select plan id ", 
	  },
	   package_type:
	  {
		  required: "Please Select the Package type", 
	  },
	  price:
	  {
		  required: "Please enter the price", 
	  },
	   price_month:
	  {
		  required: "Please enter the Price Monthly", 
	  },
	   price_yearly:
	  {
		  required: "Please enter the price Yearly", 
	  },
	  
       }
    });

	
	$('#editPlandata').validate({ 
       rules: {
       plan_id: {
            required: true
             },
	   package_type: {
         required: true
        },
			
	price: {
      required: true
      },
	   price_month: {
         required: true
        },
		 price_yearly: {
         required: true
        },
		
	 
  },
  messages: {
	   plan_id:
	  {
		  required: "Please select plan id ", 
	  },
	   package_type:
	  {
		  required: "Please Select the Package type", 
	  },
	  price:
	  {
		  required: "Please enter the price", 
	  },
	   price_month:
	  {
		  required: "Please enter the Price Monthly", 
	  },
	   price_yearly:
	  {
		  required: "Please enter the price Yearly", 
	  },
	  
       }
    });




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