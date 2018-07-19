<?php

namespace Gutropolis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gutropolis\Http\Controllers\Controller;
use Gutropolis\Plans;
use Yajra\DataTables\DataTables;
use DB;  
use URL;
use Toastr; 
use Gutropolis\Repositories\Contracts\PlanRepositoryInterface;
use Gutropolis\Repositories\PlansRepository;
use Illuminate\Database\Eloquent\Model;

class AdminPlanController extends Controller
{
    //
  // space that we can use the repository from
   protected $model;

   public function __construct(Plans $plan)
   {
       // set the model
       $this->model = new PlansRepository($plan);
   }

    public function index(Request $request) 
    {  
	   
        return view('admin.plans.index'); 
		
    }
    public function data()
    {
         $plan =$this->model->getAll();
		 
         //$plan = Plans::all();  
		  return DataTables::of($plan)
							->editColumn('created_at',function(Plans $plan) {
								return $plan->created_at->diffForHumans();
							})
							->addColumn('actions',function($plan) {
					
								 $actions ='<button type="button" class="btn btn-pinterest waves-effect waves-light" onclick="showPlan('.$plan->id.')"><i class="ti-eye" aria-hidden="true"></i></button>';


								$actions .= '&nbsp;<button type="button" class="btn btn-info edit-modal"   data-info="'.$plan->id.'"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
							    $actions .= '<form method="POST" action="'.URL::to("/").'/admin/plans/destroy/'.$plan->id.'" accept-charset="UTF-8" style="display:inline">
								                    '. csrf_field() .'  
													<button class="btn btn-danger delete" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete plan" data-message="Are you sure you want to delete this plan ?">
														<i class="fa fa-trash" aria-hidden="true"></i>
													</button>
												</form>'; 
								return $actions;
							})
							->rawColumns(['actions'])
							->make(true);
    }

	public function create() 
    {
		// create record and pass in only fields that are fillable
       //return $this->model->create($request->only($this->model->getModel()->fillable));
        return view('admin.plans.create'); 
    }

    public function store(Request $request) 
    { 
       
		
		$data = [
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ];

		// create record and pass in only fields that are fillable
        
		$this->model->create($data); 
        Toastr::success('Plan have created successfully!!', 'Plans', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.plans.index');
		//return response()->json('Successful added', 200); 

    }

     public function show($id) 
    { 
		//$plans = Plans::find($id);  
		$plans = $this->model->show($id);
        return view('admin.plans.show',compact('plans')); 
    }

     public function edit($id) 
    { 
        //$plan = Plans::find($id);
		$plan = $this->model->getById($id);		
		$htmlElement = ' <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Edit Plan</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form method="post" action="plans/update/'.$id.'"    > 
                                            <div class="modal-body"> 
												'. csrf_field() .'     

                                                     <div class="form-group">
                                                        <label for="title" class="control-label">Title:</label>
														<input name="title" value='.$plan->title .' class="form-control" required="" data-validation-required-message="Title is required" aria-invalid="false" type="text">
                                                         
                                                    </div>
                                                     <div class="form-group">
														<h5>Textarea <span class="text-danger">*</span></h5>
														<div class="controls">
															<textarea name="description"  id="description" class="form-control" required="" placeholder="Put Description" aria-invalid="false">'.$plan->description .'</textarea>
														<div class="help-block"></div></div>
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


    public function update(Request $request, $id) 
    {  

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ];	
		 
		$this->model->update($data, $id); 
		Toastr::success('Plan have updated successfully!!', 'Plans', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.plans.index'); 
    }

    public function destroy($id) 
    {  
			//Plans::find($id)->delete();	
			$this->model->delete($id); 			
			Toastr::success('Plan have deleted successfully!!', 'Plans', ["positionClass" => "toast-top-right"]); 		
			return redirect()->route('admin.plans.index');
    }
}
