<?php
// app/Repositories/PostRepository.php
namespace Gutropolis\Repositories;

use Gutropolis\Repositories\Contracts;
use Gutropolis\Repositories\Contracts\RazorRepositoryInterface;
use Razorpay\Api\Api;
use Razor\Customer;
use Razor\Charge; 
use Razor\Plan;
use Razor\Product;

class RazorRepository  implements RazorRepositoryInterface
{
        public $objRazor ;
		//Add Plan Field //
		
		public $plan_name;  
		public $plan_type='service' ;
		public $plan_description ='';
		public $plan_attribute = array("service");
		
		
		//Add Razor Package Here //
		
		// public $plan_id='';
		public $plan_amount='';
		public $plan_interval='month';
		public $plan_interval_count='12';
		public $plan_currency='usd'; 
		
		 
		public $plan_id = '0'; 
		public $msgArray; 
		
		
		public $amount = 600;
		public $plan='month';
		public $currency = 'INR';
		public $_year='month';
		
		public $api;
		public $api_key = env('RAZOR_API_KEY'); 
		public $api_secret = env('RAZOR_API_SECRET'); 
		
        public function __construct()
        {
            // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
			$this->api = new Api($this->api_key, $this->api_secret);
				 
        }
        
		//===============Stripe Product =================================//
		
		public  function makeRazorPlan(){
			     
				try {
					 			
						$data = array (
									'period' => 'weekly',
									'interval' => 1,
									'item' => array(
										'name' => $this->plan_name,
										'description' => $this->plan_description,
										'amount' => $this->amount,
										'currency' => $this->currency,),
									);
									
						$plan = $this->api->plan->create($data);
						$this->plan_id = $plan->id;	 
					  
					} catch (Exception $e) {
					    // Something else happened, completely unrelated to Stripe
					    $this->plan_id=0;
						$this->msgArray[]='Getting issue in making in Razor Plan.';
					}     
	    }
		public  function getRazorPlan(){
			    
			// $result =	Stripe\Product::all(array("limit" => 3)); 
			$result    = $this->api->plan->all();
			return $result;
	    }
		   
	  
	   
	   public  function updatePlan(array $data){
		   
		        // $product =  Stripe\Product::retrieve($this->product_id);
				// $plan = $this->api->plan->fetch('plan_7wAosPWtrkhqZw');
				
				$plan = $this->api->plan->fetch($this->plan_id);
				// print_r( $plan ); exit;
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
	   public  function makeRazorPackage(){
			    
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
		public  function deleteRazorPackage() { 
				$plan =  Stripe\Plan::retrieve($this->package_id);
				$plan->delete();
				return $result->deleted;
		} 
		 
		 public function getAllRazorPackages() { 
			 $result = Stripe\Plan::all(array("limit" => 3));
			 return $result; 
		 } 
	    
}
?>