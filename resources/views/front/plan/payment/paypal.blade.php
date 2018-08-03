{!! Form::open(array('route' => ['plan.paynow.paypal', $slug ]  , 'accept-charset'=>'UTF-8', 'method'=>'POST','class' => 'm-t-40', 'novalidate' => 'novalidate')) !!}
     {{ csrf_field() }}  										  
	<div class="row">
		 <div class="form-horizontal">
			
					<input type="hidden" name="amount" id="amount" value="{{$price*100}}"   />
					<input type="hidden" name="gateway" id="gateway_name" value="{{$payment_method}}"   /> 
					<input type="hidden" name="package_slug" id="slug" value="{{$slug}}" /> 
					<input type="hidden" name="package_type" id="package_type" value="{{$package_type}}" />
					<input type="hidden" name="is_recurring" id="is_recurring" value="{{$recurring}}" /> 
					<input type="hidden" name="siteurl" id="siteurl" value="{{ url('/') }}"   /> 
	 
			 <div class="form-group m-b-0">
				<div class="offset-sm-3 col-sm-9">
					<button type="submit" name="confirm_payment" class="btn btn-info waves-effect waves-light m-t-10">CheckOut</button> 
				</div>
			</div>
		</div>
		
	</div>
	 
</form> 