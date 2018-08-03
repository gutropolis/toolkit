<?php

namespace Gutropolis\Http\Controllers\Frontend\Payment;
use Illuminate\Support\Facades\Auth;
use Gutropolis\Http\Controllers\Controller;
 
use Gutropolis\Repositories\PlanPackageRepository; 
use Gutropolis\Repositories\PlansRepository;
use Gutropolis\Repositories\SubscribePaymentRepository;
use Gutropolis\Repositories\SubscribeUserRepository;
 
use Gutropolis\PlanPackage;
use Gutropolis\Plans;
use Gutropolis\PaymentgatewayType;
use Gutropolis\SubscribePayment; 
use Gutropolis\SubscribeUser;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/

 
use PayPal\Api\ItemList;
use PayPal\Api\ShippingAddress;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Toastr; 

class PaymentController extends Controller
{
	
	
	// space that we can use the repository from
		protected $packagemodel;
		protected $planmodel;
		protected $subpaymentmodel;
	 
	 
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

   public function __construct(PlanPackage $package,Plans $plan,SubscribePayment $subPayment,SubscribeUser $subUser  )
   {
       // set the model
        // set the model
        $this->packagemodel = new PlanPackageRepository($package);
		$this->planmodel = new PlansRepository($plan);
		$this->subpaymentmodel = new SubscribePaymentRepository($subPayment);
		$this->subusermodel = new SubscribeUserRepository($subUser);
 
				// Get the currently authenticated user...
				$user = Auth::user();


				// Get the currently authenticated user's ID...
			 
		$this->paid_by =Auth::id();
		$this->created_by =Auth::id();
		
		
	  /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
		 
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
 
   }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$slug = '', $paymethod = '', $recur = '')
    {  
	
		$data=array(); 
		  if ( ! empty( $slug ) && ! empty( $paymethod )    ) {
			
			    //$this->showInfoById($slug,$paymethod); 
				$planpackage =$this->packagemodel->getPkgBySlug($slug);
				$paymentType =  PaymentgatewayType::where('status', '1')->where('id', $paymethod)->first();
				
				$data['recurring'] = $recur;
				$data['plan_id'] = $planpackage->plan_id;
				$data['plan_name'] = $planpackage->plan->title;
				$data['slug'] = $planpackage->slug;
				$data['package_type'] = $planpackage->package_type;
				$data['price'] = $planpackage->price;
				 
				$data['have_trial'] = $planpackage->have_trial;
				$data['trial_days'] = $planpackage->trial_days;
				$data['interval'] = $planpackage->interval;
				$data['users_allowed'] = $planpackage->users_allowed;
				$data['users_limit'] = $planpackage->users_limit;
				$data['support_available'] = $planpackage->support_available;

				$data['payment_method_id'] = $paymentType->id;
				$data['payment_method'] =$payment_method=  strtolower($paymentType->title); 
				$payment_method=strtolower($payment_method);
				if($payment_method == 'paypal'){
					 return view('front.plan.payment.paypal',$data);  
				}else if($payment_method == 'stripe'){
					 return view('front.plan.payment.stripe',$data);  
				}
				
				 
		  }
	 // response()->json($data);
	
      
    }
 
	
}