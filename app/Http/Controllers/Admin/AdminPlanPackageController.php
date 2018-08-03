<?php

namespace Gutropolis\Http\Controllers\Admin; 
use Illuminate\Database\Eloquent\Model;
use Gutropolis\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;  
use URL;
use Toastr;  
use Gutropolis\Repositories\PlanPackageRepository; 
use Gutropolis\Repositories\PlansRepository;

use Gutropolis\PlanPackage;
use Gutropolis\Plans;
use Gutropolis\Repositories\StripeRepository;

class AdminPlanPackageController extends Controller
{
	
	// space that we can use the repository from
   protected $packagemodel;
	protected $planmodel;
	protected $stripemodel;

   public function __construct(PlanPackage $package,Plans $plan)
   {
       // set the model
        $this->packagemodel = new PlanPackageRepository($package);
		$this->planmodel = new PlansRepository($plan);
		$this->stripemodel = new StripeRepository();
 
   }

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $planData =$this->planmodel->getAll();
        return view('admin.planpackage.index',compact('planData'));
		 
    }
	
	
	public function getdata()
    {
		 
         $planpackagedata =$this->packagemodel->getAll();
		   //print_r($planpackagedata);exit;
         //$plan = Plans::all();  
		  return DataTables::of($planpackagedata)
							->editColumn('plan_name',function( $planpackagedata) {
                                $plantitle='';
								if(isset($planpackagedata->plan->title)){
										 $plantitle= $planpackagedata->plan->title; 
								} 
								return  $plantitle;
							})
							->editColumn('price',function( $planpackagedata) {
								 
								$price= '$'.$planpackagedata->price;
								return  $price;						
							}) 
							->editColumn('package_type',function( $planpackagedata) {
								 
								$package_type=  $planpackagedata->package_type;
								return  $package_type;						
							}) 
							->editColumn('users_allowed',function( $planpackagedata) {
                                 
								return  $planpackagedata->users_limit;
								 
							})
							->editColumn('created_at',function( $planpackagedata) {
								return $planpackagedata->created_at->diffForHumans();
							})
							->addColumn('actions',function($planpackagedata) {
					
							 $actions = '';
								$actions .= '&nbsp;<button type="button" class="btn btn-info edit-modal"   data-info="'.$planpackagedata->id.'"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
							    $actions .= '<form method="POST" action="'.URL::to("/").'/admin/planpackage/destroy/'.$planpackagedata->id.'" accept-charset="UTF-8" style="display:inline">
								                    '. csrf_field() .'  
													<button class="btn btn-danger delete" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Package" data-message="Are you sure you want to delete this Plan Package ?">
														<i class="fa fa-trash" aria-hidden="true"></i>
													</button>
												</form>'; 
								return $actions;
							})
							->rawColumns(['actions'])
							->make(true);
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
		$is_stripe_plan  = $request->input('is_stripe_plan'); 
		$plan_id = $request->input('plan_type');
		$data = [   	'plan_id' => $request->input('plan_type'), 
						'have_trial' => $request->input('have_trial'),
						'package_type' => $request->input('package_type'),
						'trial_days' => intval($request->input('trial_days')),
						'price' => $request->input('price'), 
						'users_limit' => $request->input('users_limit'),
						'support_available' => intval($request->input('support_available')) 
				];
				
			
			$planDetail = $this->planmodel->getById($plan_id);

		// create record and pass in only fields that are fillable
        
		$result =$this->packagemodel->create($data); 
		if($is_stripe_plan=='1' &&  intval($result->id) > 0 ){ 
				$price = $request->input('price');
				$this->stripemodel->package_amount = $price*100;
				$this->stripemodel->package_interval = $request->input('package_type');
				$this->stripemodel->package_interval_count = '1';
				$this->stripemodel->package_currency = 'usd';
				$this->stripemodel->package_id  = $result->slug;
				$this->stripemodel->product_id = $planDetail->stripe_plan_id;
				$this->stripemodel->makeStripePackage();
				$this->stripemodel->package_id;
				if($this->stripemodel->package_id !=''){
					
						$data['stripe_package_id'] = $this->stripemodel->package_id;
						$this->packagemodel->update(  $data, $result->id);
				 }	
		 
		
		}
        Toastr::success('Plan Package have created successfully!!', 'Plan Package', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.planpackage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Gutropolis\PlanPackage  $planPackage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
		 $data['planData']=$this->planmodel->getAll();
		 $pkgdetail = $this->packagemodel->getById($id);
	     $data['packageInfo']=$pkgdetail ;
		 
		 if($pkgdetail->stripe_package_id!=''){
         $data['stripePkgList'] = $this->stripemodel->getStripePackagesByPlan($pkgdetail->plan->stripe_plan_id) ;
		 }else{
			  $data['stripePkgList'] =array();
		 }
	 
         return view('admin.planpackage.show',$data);
       
    }
	
	public function getPkgInfoJson($id){
		 $planpackage = $this->packagemodel->getById($id);	
         return response()->json($planpackage);exit;
		
	}
	public function getGatewayPkgJson($plan_id){
		
		$plan = $this->planmodel->getById($plan_id);	
		$plan_stripe_id =$plan->stripe_plan_id;
		$plan_razor_id =$plan->razor_plan_id;
		$stripePlanPkg = $this->stripemodel->getStripePackagesByPlan($plan_stripe_id); //Stripe Model
		$razorPlanPkg =  array(); 	////Razor Model
		
		$data['stripePkg'] =$stripePlanPkg ;
		$data['razorPkg'] =$razorPlanPkg ;
         return response()->json($data);exit;
		
	}

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Gutropolis\PlanPackage  $planPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		
			$editdata = [
			            'plan_id' => $request->input('plan_type'),
						'have_trial' => $request->input('have_trial'),
						'package_type' => $request->input('package_type'),
						'trial_days' => intval($request->input('trial_days')),
						'price' => $request->input('price'), 
						'users_limit' => $request->input('users_limit'),
						'support_available' => intval($request->input('support_available')) 
					];
         
		// create record and pass in only fields that are fillable
        $this->packagemodel->update($editdata, $id); 
		  
        Toastr::success('Package have updated successfully!!', 'Package', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.planpackage.index');
		//return response()->json('Successful added', 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Gutropolis\PlanPackage  $planPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
			$this->packagemodel->delete($id); 			
			Toastr::success('Package have deleted successfully!!', 'Package', ["positionClass" => "toast-top-right"]); 		
			return redirect()->route('admin.planpackage.index');
    }
	
	public function checkValidation(Request $request ){
		
		$validator = \Validator::make($request->all(),[
		                'plan_id' => 'required',
						'have_trial' => 'required',
						'trial_days' => 'required|numeric', 
						'price' => 'required|numeric',  
						'users_limit' => 'required'    
						 
					]);
        
        if ($validator->fails())
        {
            return response()->json([ 'status'=>'0',   'errors'=>$validator->errors()->all()]);
        }else{
			 return response()->json([ 'status'=>'1'] );
		}
	}
	
	
	  /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Gutropolis\PlanPackage  $planPackage
     * @return \Illuminate\Http\Response
     */
    public function updateGatewayPkg(Request $request, $id)
    {
        // 
			$editdata = [
								'plan_id' =>  $request->input('plan_type'),
								'stripe_package_id' => $request->input('stripe_package_id'),
								'razor_package_id' => $request->input('razor_package_id') 
						];
         
		// create record and pass in only fields that are fillable
        $this->packagemodel->update($editdata, $id); 
		
		 
        Toastr::success('Payment Gateway Interation have updated successfully!!', 'Package', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.planpackage.show',['id' => $id]);
		//return response()->json('Successful added', 200); 
    }
}