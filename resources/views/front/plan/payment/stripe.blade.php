{!! Form::open(array('route' => ['plan.paynow.stripe', $slug ]  , 'accept-charset'=>'UTF-8', 'method'=>'POST','class' => 'm-t-40', 'novalidate' => 'novalidate')) !!}
     {{ csrf_field() }}  										  
	<div class="row">
		 <div class="form-horizontal">
			          
			 <div class="form-group m-b-0">
				<div class="offset-sm-3 col-sm-9">
				   <input type="hidden" name="confirm_payment" value='1' />
				   <input type="hidden" name="recurring" value='{{$recurring}}' />
				   <input type="hidden" name="stripe_plan" value='{{$plan_id}}#{{$plan_name}}#{{$package_type}}' />
				   
				    @php $price = $price*100; @endphp
					 <script
											src="https://checkout.stripe.com/checkout.js"
											class="stripe-button"
											data-key="{{ env('STRIPE_KEY') }}"
											data-image="/square-image.png"
											data-name="{{$plan_name}} Plan per {{$package_type}} "
											data-description="Subscription for {{$plan_name}} plan {{$package_type}}  "
											data-amount="{{$price}}">
										  </script> 
				</div>
			</div>
		</div> 
	</div> 
</form>