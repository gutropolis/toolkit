<?php

namespace Gutropolis\Http\Controllers\Frontend\Payment;
use Illuminate\Support\Facades\Auth;
use Gutropolis\Http\Controllers\Controller;
 
use Gutropolis\Repositories\PlanPackageRepository; 
use Gutropolis\Repositories\PlansRepository;
use Gutropolis\Repositories\SubscribePaymentRepository;
use Gutropolis\Repositories\SubscribeUserRepository;
use Gutropolis\Repositories\StripeRepository;


use Gutropolis\PlanPackage;
use Gutropolis\Plans;
use Gutropolis\PaymentgatewayType;
use Gutropolis\SubscribePayment; 
use Gutropolis\SubscribeUser; 
use Gutropolis\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 

/** All Paypal Details class **/

  
use Redirect;
use Session;
use URL;
use Toastr; 

class StripeController extends Controller
{
	
	
	// space that we can use the repository from
		protected $packagemodel;
		protected $planmodel;
		protected $subpaymentmodel;
		protected $stripemodel;
	  
	 
		protected $subusermodel;
		private $_api_context;
		
		private $_plan_name='';
		private $_plan_desc ='';
		private $_amount =0;
		private $_currency_code ='USD';
		private $_planpackage_name='';
		private $_total_quantity = '1';
		private $_start_date = '';
		private $_end_date = '';
		private $_next_billing_date='';
		private $_plan_id = '';
		private $_transaction_id = '';
		private $_organization_id = '';
		private $_invoice_id = '';
		private $_paymethod = 'paypal';
		
		private $payment_gateway = '';
		private $currency_code = '';
		private $discount_amount = '';
		private $after_discount = '';
		private $paid_amount = '';
		private $payment_status = '';
		private $other_details = '';
		private $transaction_record = '';
		private $notes = '';
		private $recurring_subscription_response = '';
		private $description = ''; 
		
		private $paid_by = '';  
		private $created_by = ''; 
		private $user_id='';
		private $_transactionData=array();

   public function __construct(PlanPackage $package,Plans $plan,SubscribePayment $subPayment,SubscribeUser $subUser )
   { 
				// set the model
				$this->packagemodel = new PlanPackageRepository($package);
				$this->planmodel = new PlansRepository($plan);
				$this->subpaymentmodel = new SubscribePaymentRepository($subPayment);
				$this->subusermodel = new SubscribeUserRepository($subUser);
				$this->stripemodel = new StripeRepository();

				 
		
		 
   }
   public function showInfoById($slug){
	    $paymethod='stripe';
	    $this->user_id =Auth::id();
	   	$this->paid_by =$this->user_id;
		$this->created_by = $this->user_id;  
		 
		if ( ! empty( $slug ) && ! empty( $paymethod ) ) {
				$slug = strtolower($slug);
				$objPkg = $this->packagemodel->getPkgBySlug($slug);  
				
				$this->_plan_name =$objPkg->plan->title;
				$this->_plan_desc =$objPkg->plan->description;
				 
				
				$this->_amount =$objPkg->price;
			 
				$this->_planpackage_name =$objPkg->slug;
				$this->_total_quantity ='1';
			   
				$daysToAdd = '+'.$objPkg->interval.' days'; 
				$start_date =   date('Y-m-d');
				$end_date   =   date('Y-m-d', strtotime($daysToAdd));
				$this->_start_date =$start_date;
				$this->_end_date =$end_date;
				$this->_next_billing_date = $end_date;
				$this->_plan_id =$objPkg->id;
				$this->_paymethod =strtolower($paymethod); 
				
				return $objPkg;
		 
		}
		
	}
     
	
	 /**
     * Make Payment By Paypal
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function makePayment(Request $request  ,$slug)
    { 
			$data =array(); 
			if ( $request->exists('confirm_payment') ) {	
			  if ( ! empty( $slug )   ) {
				  $this->showInfoById($slug); //Load All Data Here regarding to plan and plan method
				  $this->_paymethod=='stripe'; 
				  
				  //Get User Id After Login
				  
					$this->user_id =Auth::id();
					$this->paid_by =$this->user_id;
					$this->created_by = $this->user_id; 
                  
					$user = User::find(Auth::id());					
				 
				//Add Stripe Functionality Here //
				        $stripe_plan = 'Starter' ;
					 	$creditCardToken = $request->stripeToken;
		// print_r($user);exit;
		 if (!$user->subscribed('main')) {
			$a =  $user->newSubscription('main', $stripe_plan)->create($request->stripeToken); 
			 
	    
   			return response()->json(['msg'=>'Successfully subscribed']);
		}else{
			return response()->json(['msg'=>'Alread Successfully subscribed']);
		}
		
		
						 	
					 
			  }
			  
			}
    } 
    public function getStripeStatus(Request $request ,$slug)
    { 

    }
	
	public function creaeStripePlan(){
		
		$this->stripemodel->makePlan(); 
		/*
			\Stripe\Stripe::setApiKey(env('STRIPE_SECRET')); 
			\Stripe\Plan::create(array(
			  "amount" => 5000,
			  "interval" => "year",
			  "product" => array(
				"name" => "Starter"
			  ),
			  "currency" => "eur",
			  "id" => "Starter Year"
			));
			
			
			return response()->json(['msg'=>'Plan created successfully subscribed']);*/
		
	}
	
	  /**
     * Display the specified resource.
     *
     * @param  \Gutropolis\PlanPackage  $planPackage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planpackage = $this->packagemodel->getById($id);	
        return response()->json($planpackage);
    }
	
	
}