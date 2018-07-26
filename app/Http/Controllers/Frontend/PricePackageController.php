<?php

namespace Gutropolis\Http\Controllers\Frontend;

 
use Gutropolis\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Gutropolis\Repositories\PlanPackageRepository; 
use Gutropolis\Repositories\PlansRepository;
use Gutropolis\Repositories\SubscribePaymentRepository;
use Gutropolis\Repositories\SubscribeUserRepository;
use DB;  
use URL;
use Toastr; 
use Gutropolis\PlanPackage;
use Gutropolis\Plans;
use Gutropolis\PaymentgatewayType;
use Gutropolis\SubscribePayment; 
use Gutropolis\SubscribeUser;

class PricePackageController extends Controller
{
	
	
	// space that we can use the repository from
		protected $packagemodel;
		protected $planmodel;
		protected $subpaymentmodel;
		protected $subusermodel;

   public function __construct(PlanPackage $package,Plans $plan ,SubscribePayment $subPayment,SubscribeUser $subUser)
   {
       // set the model
        $this->packagemodel = new PlanPackageRepository($package);
		$this->planmodel = new PlansRepository($plan);
		$this->subpaymentmodel = new SubscribePaymentRepository($subPayment);
		$this->subusermodel = new SubscribeUserRepository($subUser);
 
   }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $slug = '')
    {
		 
         $planpkgData =$this->packagemodel->getAll();  
 	 
		  return view('front.price-package.index',compact('planpkgData')); 
		
    }
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showpricepkg( $slug = '')
    {
		$data =array();
		if ( ! empty( $slug ) ) {
			
			$planpkgData = $this->packagemodel->getPkgBySlug($slug);;
			$data['planpkgData'] = $this->packagemodel->getPkgBySlug($slug);
			$data['paymentmethodData'] =  PaymentgatewayType::where('status', '1')->get();
			 
		} 
		 ;
		return view('front.price-package.paymethods',$data);  
		
    }
    public function makePayment( Request $request,$slug = '')
    {    
	     $this->subusermodel->user_id='1';
		 $this->subusermodel->checkUserSubscription(); 
		  if ( $request->exists('confirm_payment') ) {
			
				$slug = $request->slug;
				$amount = $request->amount;
				$payment_gateway = $request->payment_gateway;
				
				$package =    $this->packagemodel->getPkgBySlug($slug);	
			 
				if ( ! empty( $package ) ) {
				
						$amount = $package->price_month; 
						$token = $this->subpaymentmodel->preserveBeforeSave( $package, $payment_gateway,'1' );
						$payment_record = $this->subpaymentmodel->getSubPaymentBySlug($token);
						 
						$payment_record_d =  $payment_record->id;
						//$this->subpaymentmodel->update(array $data, $payment_record_d);
						
						
						$invoice_no = makeNumber( $payment_record->id, '9' );
						$payment_record->description = "Order for #$invoice_no";
						//echo $payment_record->description;
						
						
						//Make payment here //
							 
							$payment_record->paid_amount = $amount / 100;
							// As of now we are not yet implemented coupons.
							$payment_record->after_discount = $amount / 100;					 
							$payment_record->payment_status = '1';
							$daysToAdd = '+'.$package->interval.'days';
							 
							$start_date = $payment_record->start_date = date('Y-m-d');
							$end_date   = $payment_record->end_date = date('Y-m-d', strtotime($daysToAdd));
							$payment_record->save();
							$data=array(
							  'user_id' => '1',
							  'organization_id' => '1',
							  'start_date' => $start_date,
							  'end_date' => $end_date,
							  'status' => '1',
							  'invoice_id' => $payment_record_d,
							);
							$this->subusermodel->subscribeUser($data);
							
							
						 
						//End Payment Id;
						
				}else{
						$message = "No package Exist!!";
						Toastr::success($message, 'Plan Package', ["positionClass" => "toast-top-right"]); 
						return redirect()->route('price-package', $slug);
				}
					 
				 
			  //return view('front.price-package.paynow',$data);  
			  
		  }else {
				$message = "Please select payment gateway.";
                Toastr::success($message, 'Payment Method', ["positionClass" => "toast-top-right"]); 
					return redirect()->route('price-package', $slug);
				 
				 
		  }
		 
		
    }
	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
