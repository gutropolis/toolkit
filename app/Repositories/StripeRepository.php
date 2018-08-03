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
		public $currency='month';
		public $_year='month';
		
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



    /*===========End Customer Here ==================================================*/	 
		 
	  /*==============Add Subscription Here =========================================*/



      /* =============Delete Subscription  Here ========================================*/

      /*============Migrate Subscriber fron one plan to another plan ======================*/

      /*=========Resume subscription =======================================================*/	  
		 
	   
	    
}
?>