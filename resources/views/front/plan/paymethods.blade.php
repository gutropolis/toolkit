@extends('front.layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-header">Package</div>

                <div class="card-body">
							<!-- Price Start Here ------------------------------------------>
                                <div class="row pricing-plan"> 
                                    <div class="no-padding">
                                        <div class="pricing-box">
                                            <div class="pricing-body b-l">
                                                <div class="pricing-header">
													 
                                                    <h4 class="text-center">{{ $planpkgData->plan->title }}</h4>
                                                    <h2 class="text-center"><span class="price-sign">$</span>{{ $planpkgData->price  }}</h2>
                                                    <p class="uppercase">per {{ $planpkgData->package_type  }}</p>
                                                </div>
                                                <div class="price-table-content">
                                                    <div class="price-row"><i class="icon-user"></i> {{ $planpkgData->users_limit }} Members</div>
                                                    <div class="price-row"><i class="icon-screen-smartphone"></i> @if($planpkgData->support_available=='1') 
														Support Available
													@endif</div>
                                                    <div class="price-row"><i class="icon-drawar"></i> 50GB Storage</div>
                                                    <div class="price-row"><i class="icon-refresh"></i> Monthly Backups</div>
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								 
                                     
                                </div>
							<!-- Price End Here -----------------> 
                </div>
                </div>
            </div>
			<div class="col-lg-8 col-xlg-9 col-md-7">
				<div class="card">
				    <div class="card-header">Payment Method</div> 
						<div class="card-body">
						<div class="demo-radio-button">
						  <!-- Payment Method Start Here ------------->
						   @if (count($paymentmethodData) > 0)
								 @foreach ($paymentmethodData as $paymentmethod)
									  
											
											<input name="payment_method" value="{{$paymentmethod->title}}"  id="radio_{{$paymentmethod->id}}" class="radio-col-light-green" checked="" type="radio">
											<label for="radio_{{$paymentmethod->id}}">{{$paymentmethod->title}}</label>
									  
							     @endforeach	
							 @endif
						</div> 
						  <!-- Payment Method End Here ------------------>
						</div>
					 
				</div>
				<div class="card">
					 
						<div class="card-body">
							<div class="demo-radio-button">
							  <!-- Payment Method Start Here ------------->
									<div class="col-sm-6">
                                        <div class="demo-switch-title">Is Recurred?</div>
                                        <div class="switch">
                                            <label>
                                                <input name="chooseRecurr" class="isrecur"  id="1" type="checkbox" value='1'><span class="lever switch-col-light-green"></span></label>
                                        </div>
                                    </div>
							</div>  
						</div>
					 
				</div>
				
				<div class="card"> 
				       <div class="card-header">Billing and Shipping Address</div> 
						<div class="card-body" id="divPayment"  >
						<!-- Add payment button here -->
						
						<!-- End payment button here --->
						</div> 
				</div>
			</div>
			<!-- Column -->
        </div>
    </div>
</div> 
@endsection
@section('footer_js') 
    
   <!--Custom JavaScript -->
    <script src="{{ URL::to('admin/assets/js/custom.min.js') }}"></script>
	 <script src="{{ URL::to('admin/assets/js/validation.js') }}"></script> 
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); 
    }(window, document, jQuery);
    </script>
    <script type="text/javascript">
            $(document).ready(function () {
				
			 
					 
			 $("input[type='radio']").on('change', function () {
					 
					     var checked_option_radio = $('input:radio[name=payment_method]:checked').val(); 
						  var checkedIds = $(".isrecur:checked").map(function() {
												return this.id;
											  }).toArray();
							if(checkedIds!='1'){
								checkedIds='0';
							}
								
						 
						if(checked_option_radio != undefined  )
						 {
							 $(".lds-ellipsis").show();
							     var paymentid=this.id;
							      paymentid = paymentid.replace("radio_", "");
								 //  alert(paymentid);
								 // $("#gateway_name").val(checked_option_radio.toLowerCase());
								 // $("#gateway_id").val(paymentid);
								
								  	$.ajax({ 
											 
											url:"{{URL::to('/')}}/payment-type/{{ $planpkgData->slug }}/"+paymentid+'/'+checkedIds 
										 
									}).done(function(data){ 
										$('#divPayment').html('');
										$('#divPayment').html(data);
										/*
											$('#amount').val(data.price);
											$('#gateway_name').val(data.payment_method);
											$('#slug').val(data.slug);
											$('#package_type').val(data.package_type) ;
											$('.lds-ellipsis').delay(2000).hide(); 
											var siteurl  = $('#siteurl').val();
											siteurl=siteurl+'/paynow/'+data.payment_method+'/'+data.slug;
											alert(siteurl);
											 $('#checkoutform').attr('action', siteurl);*/
										  
									}); 
								 
									
					
						 } 
					 
                });
            });
        </script>   
	  
      
    
@endsection 
