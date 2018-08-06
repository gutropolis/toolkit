<?php
// app/Repositories/PostRepository.php
namespace Gutropolis\Repositories;

use Gutropolis\Repositories\Contracts;
use Gutropolis\Repositories\Contracts\StripeRepositoryInterface;
use Stripe;
use Stripe\Customer;
use Stripe\Charge; 
use  Stripe\Plan;
use Stripe\Product;
use Stripe\Subscription; 

class StripeRepository  implements StripeRepositoryInterface
{
        public $objStripe ;
		//Add Plan Field //
		
		public $product_name;  
		public $product_type='service' ;
		public $product_description ='';
		public $product_attribute = array("service");
		
		
		//Add Stripe Package Here //
		
		public $package_id='';
		public $package_amount='';
		public $package_interval='month';
		public $package_interval_count='12';
		public $package_currency='usd'; 
		
		 
		public $product_id = '0'; 
		public $msgArray; 
		
		
		public $amount ;
		public $product='month';
		public $currency='usd';
		public $_year='month';
		
		
		public $stripe_source='';
		public $payment_description='';
		public $customer_description='';
		
		public $result;
		public $status;
		public $customer_id= false;
		
		public $subscription_id='';
		public $charge_id='';
		
        public function __construct()
        {
                  Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
				 
        }
        
		//===============Stripe Product =================================//
		
		public  function makeStripePlan(){
			     
				try {
					
						$data =		 array(
										  "name" => $this->product_name,
										  "type" => $this->product_type, 
										  "attributes" => $this->product_attribute
									   );
                      if($this->product_type == 'good'){
                         $data['description'] =$this->product_description;
					  }					  
					  // Use Stripe's bindings...
						 $result = Stripe\Product::create($data);
						$this->product_id = $result->id;
					  
					} catch (Exception $e) {
					    // Something else happened, completely unrelated to Stripe
					    $this->product_id=0;
						$this->msgArray[]='Getting issue in making in Stripe Product.';
					}     
	    }
		public  function getStripePlan(){
			    
			$result =	Stripe\Product::all(array("limit" => 3));
			return $result;
	    }
		  
		  
	  
	   
	   public  function updatePlan(array $data){
		   
		        $product =  Stripe\Product::retrieve($this->product_id);
				foreach($data as $k=>$v){
					$product->metadata[$k] = $v;
				} 
				$product->save();
	   }
	   
	   public  function deletePlan(){
		   
		        $product =  Stripe\Product::retrieve($this->product_id); 
				$result = $product->delete();
				return $result->deleted;
	   }
	   
	  //===============Stripe Plans/Packages =================================//
	   public  function makeStripePackage(){
			    
				try {
					  // Use Stripe's bindings...
					  $result =  Stripe\Plan::create( array(
									"amount"         => $this->package_amount,
									"interval"       => $this->package_interval,
									"interval_count" => $this->package_interval_count,
									"currency"       => $this->package_currency,
									"id"             => $this->package_id,
									'product'        => $this->product_id
								) );
				 
						 
						$this->package_id = $result->id;
					  
					} catch (Exception $e) {
					    // Something else happened, completely unrelated to Stripe
					    $this->plan_id=0;
						$this->msgArray[]='Getting issue in making in Stripe plan.';
					}     
	    }
		 public  function deleteStripePackage(){ 
				$plan =  Stripe\Plan::retrieve($this->package_id);
				$plan->delete();
				return $result->deleted;
		 }
		 
		  public function getStripePackagesByPlan($planid){
             $stripePackages=array();			  
			 $stripePackageList = Stripe\Plan::all(array("limit" => 100));
			  
			 if(count($stripePackageList->data) > 0){
					foreach ($stripePackageList->data as $pkg) {
						if ($pkg->product == $planid) {
							$pkginfo=array();
							$stripePackages[] = $pkg; 
							
						}
					}
			 }
			 return $stripePackages; 
		 }
		 
		 public function getAllStripePackages(){ 
			 $result = Stripe\Plan::all(array("limit" => 3));
			 return $result; 
		 }
		 
		 
	 /*============Add customer Here ================================================*/
       public function createCustomer(){
		   try {
						
							$data =			array( 
												  "source" => $this->stripe_source, // obtained with Stripe.js
												  "description" => $this->customer_description //Customer for jenny.rosen@example.com
												);
						  			  
						  // Use Stripe's bindings...
							$this->result = Stripe\Customer::create($data); 
							  			    
							if(isset($this->result->id)){
									$this->status='1';
									$this->msgArray[]='Customer Have Created Successfully!!';
							}else{
								$this->status='0'; 
								$this->msgArray[]='Getting issue in making in Stripe Product.';
							}
						  
						} catch (Exception $e) {
							// Something else happened, completely unrelated to Stripe
							$this->status='0'; 
							$this->msgArray[]='Getting issue in making in Stripe Product.';
						}   
		   
	   }
    

    /*===========End Customer Here ==================================================*/	 
		 
      public function getSubscriptionDetail(){ 
			try {  
				  // Use Stripe's bindings...
					$this->result = Stripe\Subscription::retrieve($this->subscription_id);  	 
			  
			} catch (Exception $e) { }    
	  }
	  
	   public function getChargeDetail(){ 
			try {  
			 
				  // Use Stripe's bindings...
					$this->result = Stripe\Charge::retrieve($this->charge_id);  	 
			  
			} catch (Exception $e) { }    
	  }
		 
		 
	  /*==============Add Subscription Here =========================================*/



      /* =============Delete Subscription  Here ========================================*/

      /*============Migrate Subscriber fron one plan to another plan ======================*/

      /*=========Resume subscription =======================================================*/	  
		 
	   
	  /* Make payment without storing customer information */
		  public  function directCharging(){
					 
					try {
						
							$data =			array(
												  "amount" => $this->amount,
												  "currency" => $this->currency,
												  "source" => $this->stripe_source, // obtained with Stripe.js
												  "description" => $this->payment_description
												);
						  			  
						  // Use Stripe's bindings...
							$this->result = Stripe\Charge::create($data); 
							if(isset($this->result->id)  && $this->result->paid==true ){
									$this->status='1';
									$this->msgArray[]='Payment have done successfully!!';
							}else{
								$this->status='0'; 
								$this->msgArray[]='Getting issue in making in Stripe Product.';
							}
						  
						} catch (Exception $e) {
							// Something else happened, completely unrelated to Stripe
							$this->status='0'; 
							$this->msgArray[]='Getting issue in making in Stripe Product.';
						}     
			}
			 	  
}
?>