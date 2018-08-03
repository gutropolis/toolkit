<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;



class Plans extends BaseModel
{ //
	
	
	public function createStripePlan(){
		
		
		
	}
	 Stripe::setApiKey(env('STRIPE_SECRET')); 
			\Stripe\Plan::create(array(
			  "amount" => 5000,
			  "interval" => "year",
			  "product" => array(
				"name" => "Starter"
			  ),
			  "currency" => "eur",
			  "id" => "Starter Year"
			));
			
			
			return response()->json(['msg'=>'Plan created successfully subscribed']);
}
