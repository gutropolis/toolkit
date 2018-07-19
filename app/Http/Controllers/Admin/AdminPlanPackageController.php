<?php

namespace Gutropolis\Http\Controllers\Admin; 
use Illuminate\Database\Eloquent\Model;
use Gutropolis\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;  
use URL;
use Toastr; 
use Gutropolis\Repositories\Contracts\PlanPackageRepositoryInterface;
use Gutropolis\Repositories\PlanPackageRepository; 
use Gutropolis\Repositories\PlansRepository;

use Gutropolis\PlanPackage;
use Gutropolis\Plans;


class AdminPlanPackageController extends Controller
{
	
	// space that we can use the repository from
   protected $packagemodel;
	protected $planmodel;

   public function __construct(PlanPackage $package,Plans $plan)
   {
       // set the model
        $this->packagemodel = new PlanPackageRepository($package);
		$this->planmodel = new PlansRepository($plan);
 
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
							->editColumn('price_month',function( $planpackagedata) {
								 
								$price_month= '$'.$planpackagedata->price_month;
								return  $price_month;						
							})
							->editColumn('price_yearly',function( $planpackagedata) {
								$price_yearly= '$'.$planpackagedata->price_yearly; 
								return $price_yearly;
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
		$data = [   	'plan_id' => $request->input('plan_type'),
						'have_trial' => $request->input('have_trial'),
						'trial_days' => intval($request->input('trial_days')),
						'price_month' => $request->input('price_month'),
						'price_yearly' => $request->input('price_yearly'),
						'users_limit' => $request->input('users_limit'),
						'support_available' => intval($request->input('support_available')) 
				];

		// create record and pass in only fields that are fillable
        
		$this->packagemodel->create($data); 
        Toastr::success('Plan Package have created successfully!!', 'Plan Package', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.planpackage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Gutropolis\PlanPackage  $planPackage
     * @return \Illuminate\Http\Response
     */
    public function show(PlanPackage $planPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Gutropolis\PlanPackage  $planPackage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //$plan = Plans::find($id);
		$planpackage = $this->packagemodel->getById($id);	
		$planData =$this->planmodel->getAll();		
		$htmlElement = ' <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Edit Package</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form method="post" action="planpackage/update/'.$id.'"    > 
                                            <div class="modal-body"> 
												'. csrf_field() .'     

                                                    <div class="form-group">
																				<h5>Select Plan <span class="text-danger">*</span></h5>
																				<div class="controls"> 
																						<select name="plan_type" id="select" required="" class="form-control" aria-invalid="false">';
                                                                                         if(count($planData) > 0){
																							   $htmlElement .= '  <option value="">Choose Plan</option>';
																								foreach ($planData as $objplan) {
																									if($planpackage->plan_id==$objplan->id){
																										 $htmlElement .= '	<option selected="selected" value="'.$objplan->id.'">'.$objplan->title.'</option> ';
																									}else{
																										$htmlElement .= '	<option value="'.$objplan->id.'">'.$objplan->title.'</option> ';
																									}
																								
																								}
																						
																							}
													$htmlElement .= '		         	</select>
																						<div class="help-block"></div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Has Trial <span class="text-danger">*</span></h5>
																							<div class="controls">
																									<div class="switch">
																										<label>OFF';
																										$checked='';
																										if($planpackage->have_trial== '1'){
																											$checked='checked="checked"';
																										}
																										$htmlElement .= '	<input '.$checked.' name="have_trial" value="1" type="checkbox"><span class="lever"></span>ON</label>
																									</div>
																							</div>
																						</div>
																				</div>
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Trial Interval <span class="text-danger">*</span></h5>
																							<div class="controls">
																								<input value="'.$planpackage->trial_days.'" name="trial_days" class="form-control" required="" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="No Characters Allowed, Only Numbers" aria-invalid="false" type="text"> 
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																			</div> 
                                                                            <div class="row">
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Monthly Price <span class="text-danger">*</span></h5>
																							<div class="controls">
																								<input name="price_month" value="'.$planpackage->price_month.'"  class="form-control" required="" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="No Characters Allowed, Only Numbers" aria-invalid="false" type="text"> 
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Yearly Price <span class="text-danger">*</span></h5>
																							<div class="controls">
																								<input name="price_yearly" value="'.$planpackage->price_yearly.'" class="form-control" required="" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="No Characters Allowed, Only Numbers" aria-invalid="false" type="text"> 
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>User Limit <span class="text-danger">*</span></h5>
																							<div class="controls">
																								<input name="users_limit"  value="'.$planpackage->users_limit.'"  class="form-control" required="" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="No Characters Allowed, Only Numbers" aria-invalid="false" type="text"> 
																								<div class="help-block"></div>
																							</div>
																						</div>
																				</div>
																				<div class="col-xs-12 col-sm-6 col-md-6">
																						<div class="form-group">
																							<h5>Is Support Available <span class="text-danger">*</span></h5>
																							<div class="controls">
																								 <div class="switch">
																										<label>OFF';
																										$checked='';
																										if($planpackage->have_trial== '1'){
																											$checked='checked="checked"';
																										}
																										$htmlElement .= ' <input '.$checked.'   value="1" name ="support_available" type="checkbox"><span class="lever"></span>ON</label>
																								 </div>
																							</div>
																						</div>
																				</div>
																			</div> 
																		 
                                                    
                                                 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                 
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                          </form> 
                                        </div>';
 
		return response()->json(array('htmlcontent'=> $htmlElement));
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
		
			$editdata = ['plan_id' => $request->input('plan_type'),
						'have_trial' => $request->input('have_trial'),
						'trial_days' => intval($request->input('trial_days')),
						'price_month' => $request->input('price_month'),
						'price_yearly' => $request->input('price_yearly'),
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
}
