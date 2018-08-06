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
													<h4 class="price-lable text-white bg-warning"> Popular</h4>
                                                     
                                                    <h2 class="text-center"><span class="price-sign">$</span>{{ $planpkgData->price_month }}</h2>
                                                    <p class="uppercase">per month</p>
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
									  
											
											<input name="payment_method"   id="radio_{{$paymentmethod->id}}" class="radio-col-light-green" checked="" type="radio">
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
                                                <input   type="checkbox"><span class="lever switch-col-light-green"></span></label>
                                        </div>
                                    </div>
							</div>  
						</div>
					 
				</div>
				<div class="card"> 
						<div class="card-body"> 
							<form class="form-horizontal" method="PATCH" action="payments/paynow/{{ $planpkgData->slug }}" >
								  <input type="hidden" name="amount" id="amount" value="{{ $planpkgData->price_month }}"   />
								  <input type="hidden" name="gateway" id="selected_gateway" value="paypal"   />
								  <input type="hidden" name="slug" id="slug" value="{{ $planpkgData->slug }}" /> 
      
                                <div class="form-group m-b-0">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit" name="confirm_payment" class="btn btn-info waves-effect waves-light m-t-10">Confirm Payment</button>
                                    </div>
                                </div>
                            </form>
						</div> 
				</div>
			</div>
			<!-- Column -->
        </div>
    </div>
</div>
@endsection
