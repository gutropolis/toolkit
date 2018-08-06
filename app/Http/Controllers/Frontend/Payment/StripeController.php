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
		private $_transaction_cost=0;
		private $_currency_code ='usd';
		private $_planpackage_name='';
		private $_total_quantity = '1';
		private $_start_date = '';
		private $_end_date = '';
		private $_next_billing_date='';
		private $_plan_id = '';
		private $_transaction_id = '';
		private $_organization_id = '';
		private $_invoice_id = '';
		private $_paymethod = 'stripe';
		
		 
	 
		private $_discount_amount = '';
		private $_after_discount = '';
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
		
		private $_payment_mode='direct';
		private $_stripe_plan='';

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
				$this->_after_discount = '0';
				$this->_stripe_plan=$objPkg->stripe_package_id;
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
					  $this->_paymethod='stripe'; 
					  
					  //Get User Id After Login
					  
						$this->user_id =Auth::id();
						$this->paid_by =$this->user_id;
						$this->created_by = $this->user_id; 
                  
						$user = User::find(Auth::id());					
				 
						//Add Stripe Functionality Here //
				        $stripe_plan = $this->_stripe_plan;
						 
					 	$creditCardToken = $request->stripeToken;
  
								if ( $request->recurring == '1'  ) {	//If user on monthly basis
								
									   if (!$user->subscribed('main')) {
										 
											$user->newSubscription('main', $stripe_plan)->create($request->stripeToken);  
											$this->_payment_mode='subscription';
											$this->checkOutSubscription($slug);
											
											$data['status']='1';
											$data['transactionData'] = $this->_transactionData; 
											$data['msg'] = 'You have subscribed successfully!! Your subscription is '.$this->_transactionData->id;
											
											
										}else{
											//return response()->json(['msg'=>'Already Successfully subscribed']);
											/*For testing */
											 $this->_payment_mode='subscription';
											 $this->checkOutSubscription($slug);
											
											$data['status']='0';
											$data['transactionData'] = $this->_transactionData; 
											$data['msg'] = 'Already Successfully subscribed';
											/*For End Testing */
											
										}
								 
								
								}else{   //User want to pay directly //
								
								  
									  $this->stripemodel->amount = $this->_amount*100;
									  $this->stripemodel->currency = $this->_currency_code;
									  $this->stripemodel->stripe_source = $request->stripeToken;
									  $this->stripemodel->payment_description = 'Payment for '.$this->_plan_name;				 
									  $this->stripemodel->directCharging();   //Need to do direct payment 
										 //$this->stripemodel->result             //for getting result
										 // $this->stripemodel->status='1';         //Need to remove
										  if($this->stripemodel->status == '1'){
											   $this->stripemodel->charge_id  = $this->stripemodel->result->id;
											  // $this->stripemodel->charge_id = 'ch_1Cv8R8LzcsJoHrscryPFGFnD'; //This is for testing
												$this->_payment_mode='direct';
											  $this->checkOutPayment($slug);
											
											  $data['status']='1';
											  $data['msg'] = 'Thank you for making payment';
											  
										  }else{
											  
											   $data['status']='0';
											   $data['msg'] = 'Something is wrong in payment!!';
										  } 	  
								} 
								 	 
			  }
			  
			}else{
				$data['status']='0';
			    $data['msg'] = 'Sorry!! Something is wrong in payment!!';  
			}
			$data['slug']=$slug; 
 	
			 return Redirect::route('payment.status')->with( ['data' => $data] );			
		    //return view('front.payment-status.stripe',$data);  
    } 
     
	
	public function testing(){
		
		 // $stripe_plan_id =   $user->subscription()->planId();
	  print_r($subsusciList->plan);
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
	
	public function checkOutSubscription($slug){
	   $user = User::find(Auth::id());			
		 $userSubscriptionDetail =  $user->subscription('main') ;//print_r($userSubscriptionDetail);
		 
		$this->stripemodel->subscription_id = $userSubscriptionDetail->stripe_id;
		$this->stripemodel->getSubscriptionDetail();
		$subsusciList = $this->stripemodel->result;
		// print_r($subsusciList);exit;
		 $this->_transaction_cost =$subsusciList->plan->amount;
		 $this->_transaction_cost=$this->_transaction_cost/100;
		 $this->_currency_code  =$subsusciList->plan->currency;
		 
		$this->_discount_amount ='0';  
		$after_discount_price = $this->_transaction_cost - $this->_discount_amount;
		$this->_after_discount =$after_discount_price; 
		$this->_discount_amount =$after_discount_price; 
		$this->paid_amount = $this->_transaction_cost;
		$this->payment_status = 'paid'; 

		 
		$this->other_details = json_encode($subsusciList->plan); 
		$this->transaction_record = $userSubscriptionDetail->stripe_id; 
		
		$this->_start_date = date('Y-m-d h:i:s',$subsusciList->current_period_start); 
		$this->_end_date =   date('Y-m-d h:i:s',$subsusciList->current_period_end);  
		$this->_next_billing_date = date('Y-m-d h:i:s',$subsusciList->current_period_start);  
		
		$this->notes = ''; 
		$this->recurring_subscription_response = ''; 
		$this->description = '';  
		$this->subpaymentmodel->_start_date  =$this->_start_date ;
		$this->subpaymentmodel->_end_date  =$this->_end_date ;
		$this->_transactionData= $subsusciList;   
		$this->createSubscribeInvoice($slug,'stripe');
		
	}
	public function checkOutPayment($slug){
	    $user = User::find(Auth::id());			
		  $this->stripemodel->getChargeDetail();//print_r($userSubscriptionDetail); 
		$subsusciList = $this->stripemodel->result;
		 
		 $this->_transaction_cost =$subsusciList->amount;
		 $this->_transaction_cost=$this->_transaction_cost/100;
		 $this->_currency_code  =$subsusciList->currency;
		 
		$this->_discount_amount ='0';  
		$after_discount_price = $this->_transaction_cost - $this->_discount_amount;
		$this->_after_discount =$after_discount_price; 
		//$this->_discount_amount =$after_discount_price; 
		$this->paid_amount = $this->_after_discount;
		$this->payment_status = 'paid'; 

		 
		$this->other_details = json_encode($subsusciList); 
		$this->transaction_record = $subsusciList->id; 
		  
		$this->notes = ''; 
		$this->recurring_subscription_response = ''; 
		$this->description = '';  
		$this->_transactionData= $subsusciList;  
		$this->createSubscribeInvoice($slug,'stripe');
		
		
	}
	public function createSubscribeInvoice($slug,$paymethod){
		
		  $objPackage = $this->showInfoById($slug,'stripe'); 
		  $transactionData=$this->_transactionData;
	   
	   
	    
	   /* Add Extra Data Information */
			   $data['payment_gateway'] = $this->_paymethod;
			   $data['paid_by'] = $this->user_id;
			   $data['coupon_code_applied']=''; 
			   $data['coupon_id']='0';
			   $data['actual_cost']='0';
			 
			   $data['amount'] = $this->_transaction_cost;
			   $data['currency_code'] = $this->_currency_code;
			   $data['discount_amount'] = $this->_discount_amount;
			   $data['after_discount'] = $this->_after_discount;
			   $data['paid_amount']  = $this->paid_amount;
			   $data['payment_status']  = $this->payment_status;
			   $data['other_details']  = $this->other_details;
			   $data['transaction_record'] = $this->transaction_record;
			   $data['notes'] = $this->notes;
			   
			   $data['recurring_subscription_response'] = $this->recurring_subscription_response;
			   $data['description'] = $this->description;
			   $data['status'] = '1';
			   $data['created_by'] = $this->created_by; 
			   $data['transaction_id'] = $transactionData->id;
			   $data['payment_mode']= $this->_payment_mode;
			   $invoice_id = $this->subpaymentmodel->saveInvoice($objPackage,$data);
			   
			   //Check Payment is not subscribed //
			  
			   $data=array(
						  'user_id' => $this->user_id,
						  'organization_id' => '1',
						 
						  'status' => '1',
						  'item_id' => $objPackage->id,
						  'next_billing_at' => $this->_next_billing_date,
						  'interval' => $objPackage->interval,
						  'billing_address' => '',
						  'shipping_address' => '',
						  'invoice_id' => $invoice_id 
						);
						 
						 if($this->_payment_mode == 'subscription'){
							
							$this->_start_date = date('Y-m-d h:i:s',$transactionData->current_period_start); 
							$this->_end_date =   date('Y-m-d h:i:s',$transactionData->current_period_end);  
							 
							$data['start_date'] = $this->_start_date;
							$data['end_date'] = $this->_end_date;
							$data['next_billing_at'] = $this->_end_date;
							
						}else{
							$data['start_date'] =$this->_start_date;
							$data['end_date'] =$this->_end_date;
						}
				 
						$this->subusermodel->subscribeUser($data);
	   /* End here  */
	}
	
	
}