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

class PaypalController extends Controller
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
   public function showInfoById($slug){
	    $paymethod='paypal';
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
	    //print_r($_REQUEST);exit;
        $data =array();
		 
	  if ( $request->exists('confirm_payment') ) {	
		if ( ! empty( $slug )   ) {
			  
			$this->showInfoById($slug); //Load All Data Here regarding to plan and plan method
			//$this->_paymethod = $paymethod;
			 
			$paymentTypes =  PaymentgatewayType::where('status', '1')->get();
			  
			 
			if(count($paymentTypes) >0){ 
				foreach($paymentTypes as $payType){
					$paymentTitle = strtolower($payType->title);
					    // echo $paymentTitle."==".$this->_paymethod."<br />";
				      if($this->_paymethod=='paypal' ){ 
						 
						   /* ===========Add Payment Module here ======================*/
									$payer = new Payer(); 
									$payer->setPaymentMethod('paypal'); 
									$item_1 = new Item();

									$item_1->setName($this->_plan_name) /** item name **/
										->setCurrency('USD')
										->setQuantity($this->_total_quantity)
										->setPrice($request->get('amount')); /** unit price **/

									$item_list = new ItemList();
									$item_list->setItems(array($item_1));
								 

									$amount = new Amount();
									$amount->setCurrency('USD')
										->setTotal($request->get('amount'));

									$transaction = new Transaction();
									$transaction->setAmount($amount)
										->setItemList($item_list)
										->setDescription('Transaction for Purchasing the plan '.$this->_plan_name);

									$redirect_urls = new RedirectUrls();
									$redirect_urls->setReturnUrl(URL::to('payment/paypal/status/'.$slug)) /** Specify return URL **/
										->setCancelUrl(URL::to('payment/paypal/status/'.$slug));

									$payment = new Payment();
									$payment->setIntent('Sale')
										->setPayer($payer)
										->setRedirectUrls($redirect_urls)
										->setTransactions(array($transaction));
									/** dd($payment->create($this->_api_context));exit; **/
									try {

										$payment->create($this->_api_context);

									} catch (\PayPal\Exception\PPConnectionException $ex) {

										if (\Config::get('app.debug')) {
                                               
											//\Session::put('error', 'Connection timeout');
											$message= 'Connection timeout';
											Toastr::success($message, 'Paypal Payment', ["positionClass" => "toast-top-right"]); 
											return redirect()->route('plan', $slug);
											//return Redirect::to('/plan/'.$slug);

										} else {
											
											$message= 'Some error occur, sorry for inconvenient';
											Toastr::success($message, 'Paypal Payment', ["positionClass" => "toast-top-right"]); 
											return redirect()->route('plan', $slug);

											//\Session::put('error', 'Some error occur, sorry for inconvenient');
											//return Redirect::to('/plan/'.$slug);

										}

									}

									foreach ($payment->getLinks() as $link) {

										if ($link->getRel() == 'approval_url') {

											$redirect_url = $link->getHref();
											break;

										}

									}

									/** add payment ID to session **/
									Session::put('paypal_payment_id', $payment->getId());

									if (isset($redirect_url)) {

										/** redirect to paypal **/
										return Redirect::away($redirect_url);

									}

									
									$message= 'Unknown error occurred';
									Toastr::success($message, 'Paypal Payment', ["positionClass" => "toast-top-right"]); 
									return redirect()->route('plan', $slug);

									//\Session::put('error', 'Unknown error occurred');
									//return Redirect::to('/plan/'.$slug);
						   
					  }  
				} 	
			} 
		}  
	  }else{
		                            $message= 'Unknown error occurred';
									Toastr::success($message, 'Paypal Payment', ["positionClass" => "toast-top-right"]); 
									return redirect()->route('plan', $slug);
	  }
    } 
    public function getPaypalStatus(Request $request ,$slug)
    {
		 //paymentId=PAY-7R4442295B052291LLNPAXBI&token=EC-7MB38629P8947244L&PayerID=TLEVNP83PGQLE
		/** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            
			$data['status']='0';
			$data['slug']=$slug;
			
			$data['msg'] = 'Payment Failed. Please try again!!';
			return view('front.payment-status.paypal',$data);
			 

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        $transactions = $payment->getTransactions();
        
        /**Execute the payment **/
    
        $result = $payment->execute($execution, $this->_api_context); 
      
        if ($result->getState() == 'approved') {
			  	
			$this->_transactionData = [ 
								'transaction_id'=> $payment_id,
								'pay_id' => $payment->id,
								'payer_status' => $payment->payer->status,
								'transaction_detail' => 	[
																'invoice_number' =>  $payment->transactions[0]->invoice_number,
																'total_amt' =>  $payment->transactions[0]->invoice_number,
																'currency' =>  $payment->transactions[0]->amount->currency,
																'description' =>  $payment->transactions[0]->description,
																'state' =>  $payment->transactions[0]->related_resources[0]->sale->state 
															],
								 'item_detail' => [
													'item_name' =>  $payment->transactions[0]->item_list->items[0]->name,
													'price' =>  $payment->transactions[0]->item_list->items[0]->price,
													'currency' =>  $payment->transactions[0]->item_list->items[0]->currency,
													'quantity' =>  $payment->transactions[0]->item_list->items[0]->quantity,
													'created_at' =>  $payment->create_time,
													'update_at' =>  $payment->update_time 
													
												],
								'payer_info' => [
													'payment_method' =>  $payment->payer->payment_method,
													'first_name' =>  $payment->payer->payer_info->first_name,
													'last_name' =>  $payment->payer->payer_info->last_name,
													'email' =>  $payment->payer->payer_info->email 
													
												],
								'shipping' => [ 
													'customer_name' => $payment->payer->payer_info->shipping_address->recipient_name,
													'address1' => $payment->payer->payer_info->shipping_address->line1,
													'address2' => $payment->payer->payer_info->shipping_address->line2,
													'city' => $payment->payer->payer_info->shipping_address->city,
													'state' => $payment->payer->payer_info->shipping_address->state,
													'postal_code' => $payment->payer->payer_info->shipping_address->postal_code,
													'country' => $payment->payer->payer_info->shipping_address->country_code 
											  ]
							];
							 
					
		 
		 
				$this->payment_gateway ='paypal';
				//$this->amount =$payment->transactions[0]->item_list->items[0]->price;
				$this->currency_code =  $payment->transactions[0]->amount->currency;

				$this->discount_amount ='0';  
				$after_discount_price = $this->_amount - $this->discount_amount;
				$this->after_discount =$after_discount_price; 
				$this->discount_amount =$after_discount_price; 
				$this->paid_amount = $payment->transactions[0]->item_list->items[0]->price;
				$this->payment_status = 'paid'; 

				 
				$this->other_details = json_encode($this->_transactionData); 
				$this->transaction_record = ''; 
				$this->notes = ''; 
				$this->recurring_subscription_response = ''; 
				$this->description = ''; 
                $this->notes = ''; 
				$this->createSubscribeInvoice($slug,'paypal');
					  
			
				$data['status']='1';
				$data['msg'] = 'Payment success transaction id is '.$payment->id;
				$data['transactionData'] = $this->_transactionData;
				return view('front.payment-status.paypal',$data);
             

        }
		
			$data['status']='0';
			$data['slug']=$slug; 
			$data['msg'] = 'Payment Failed. Please try again!!';
			return view('front.payment-status.paypal',$data);
		 

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
	
	
	public function createSubscribeInvoice($slug,$paymethod){
		
		$objPackage = $this->showInfoById($slug,'paypal'); 
		  $transactionData=$this->_transactionData;
	   
	   /* Add Extra Data Information */
			   $data['payment_gateway'] = $this->payment_gateway;
			   $data['paid_by'] = $this->user_id;
			   $data['coupon_code_applied']=''; 
			   $data['coupon_id']='0';
			   $data['actual_cost']='0';
			 
			   $data['amount'] = $this->_amount;
			   $data['currency_code'] = $this->currency_code;
			   $data['discount_amount'] = $this->discount_amount;
			   $data['after_discount'] = $this->after_discount;
			   $data['paid_amount']  = $this->paid_amount;
			   $data['payment_status']  = $this->payment_status;
			   $data['other_details']  = $this->other_details;
			   $data['transaction_record'] = $this->transaction_record;
			   $data['notes'] = $this->notes;
			   
			   $data['recurring_subscription_response'] = $this->recurring_subscription_response;
			   $data['description'] = $this->description;
			   $data['status'] = '1';
			   $data['created_by'] = $this->created_by; 
			   $data['transaction_id'] = $transactionData['transaction_id'];
			   $invoice_id = $this->subpaymentmodel->saveInvoice($objPackage,$data);
			   
			   $data=array(
						  'user_id' => $this->user_id,
						  'organization_id' => '1',
						  'start_date' => $this->_start_date,
						  'end_date' => $this->_end_date,
						  'status' => '1',
						  'item_id' => $objPackage->id,
						  'next_billing_at' => $this->_next_billing_date,
						  'interval' => $objPackage->interval,
						  'billing_address' => $transactionData['shipping']['address1'],
						  'shipping_address' => $transactionData['shipping']['address2'],
						  'invoice_id' => $invoice_id 
						);
						$this->subusermodel->subscribeUser($data);
	   /* End here  */
	}
	
}