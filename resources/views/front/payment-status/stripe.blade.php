{!! Form::open(array('route' => ['plan.paynow.stripe', $planpkgData->slug ]  ,'method'=>'POST','class' => 'form-horizontal')) !!}
     {{ csrf_field() }} 
	   <script
			src="https://checkout.stripe.com/checkout.js"
			class="stripe-button"
			data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
			data-image="/square-image.png"
			data-name="Demo Site"
			data-description="2 widgets ($20.00)"
			data-amount="2000">
		  </script> 
</form>