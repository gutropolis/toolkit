<?php

namespace Gutropolis\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gutropolis\Http\Controllers\Controller; 
use Gutropolis\User;
use Gutropolis\Plan_Package;
use Gutropolis\Plans;
use Spatie\Permission\Models\Role; 
use Yajra\DataTables\DataTables;
use DB; 
use Hash;


class AdminPlanPackagesController extends Controller
{
   /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {
         $data = Plan_Package::all();
         $planTypeID = Plans::all();

        return view('admin.plan.index',compact('data','planTypeID'));

            //->with('i', ($request->input('page', 1) - 1) * 5);

       // return view('admin.plan.index');

    }

    public function data()
    {
        
        $plan = Plan_Package::all();
         $planTypeID = Plans::all();

       //$permission = Permisson::all();
  
  return DataTables::of($plan)
            ->editColumn('created_at',function(Plan_Package $plan) {
                return $plan->created_at->diffForHumans();
            })
   ->addColumn('actions',function($plan) {
    
                 $actions ='<button type="button" class="btn btn-pinterest waves-effect waves-light" onclick="showPlan('.$plan->id.')"><i class="ti-eye" aria-hidden="true"></i></button>';


                $actions .= '<button type="button" class="btn btn-info" onclick="editPlan('.$plan->id.')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
               
                    

                    $actions .= '<a class="btn btn-danger" href='. route('admin.plan.destroy', $plan->id) .'><i class="fa fa-trash" aria-hidden="true"></i></a> ';
               
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
        $planTypeID = Plans::all();
        return view('admin.plan.create',compact('planTypeID'));

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

       
        $this->validate($request, [

            'plan_id' => 'required',
            'package_type' => 'required',
            'price' => 'required',
            'price_month' => 'required',
            'price_yearly' => 'required',
            
        ]);



        $input = $request->all();

       


        $plan = Plan_Package::create($input);

        
 
        return redirect()->route('admin.plan.index')

                        ->with('success','Record save successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {
        $planTypeTitle='';
        $plan = Plan_Package::find($id);
        $planTypeID = Plans::all();

return response()->json(array('plan'=>$plan,'planTypeID'=>$planTypeID));
		
	/*	$bodytxt='<div class="card">
        <div class="card-body">
            <h4 class="card-title">Show Detail</h4>
            
            
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">';
        foreach ($planTypeID as  $planid) {
             if($planid['id'] == $plan['plan_id'])
             {
              $planTypeTitle=$planid['title'];  
             }
        }
        
        $bodytxt.='<strong>plan id is </strong>'.$planTypeTitle;
        $bodytxt.='</div></div>';
        $bodytxt.='<div class="col-xs-12 col-sm-12 col-md-12"> <div class="form-group">';
        $bodytxt.='<strong> plan type is </strong>'.$plan['package_type'];
         $bodytxt.='</div></div>';
         $bodytxt.='<div class="col-xs-12 col-sm-12 col-md-12"><div class="form-group">';
        $bodytxt.='<strong> plan Price  is </strong>'.$plan['price'];
         $bodytxt.='</div></div>';
          $bodytxt.='<div class="col-xs-12 col-sm-12 col-md-12"><div class="form-group">';
        $bodytxt.='<strong> plan price_month  is </strong>'.$plan['price_month'];
         $bodytxt.='</div></div>';
         $bodytxt.='<div class="col-xs-12 col-sm-12 col-md-12"><div class="form-group">';
        $bodytxt.='<strong> plan price_yearly  is </strong>'.$plan['price_yearly'];
         $bodytxt.='</div></div>';
         $bodytxt.='<div class="col-xs-12 col-sm-12 col-md-12"><div class="form-group">';
        $bodytxt.='<strong> Have Trail:  </strong>';
        if($plan['have_trial']==1)
            {
               $bodytxt.= '<strong>Yes</strong>';
            }
            else {
               $bodytxt.= '<strong>No</strong>';

            } 
         $bodytxt.='</div></div>';
         $bodytxt.='<div class="col-xs-12 col-sm-12 col-md-12"><div class="form-group">';
        $bodytxt.='<strong> User Allowed:  </strong>';
        if($plan['users_allowed']==1)
            {
               $bodytxt.= '<strong>Yes</strong>';
            }
            else {
               $bodytxt.= '<strong>No</strong>';

            } 
         $bodytxt.='</div></div>';
         $bodytxt.='<div class="col-xs-12 col-sm-12 col-md-12"><div class="form-group">';
        $bodytxt.='<strong> support_available:  </strong>';
        if($plan['support_available']==1)
            {
               $bodytxt.= '<strong>Yes</strong>';
            }
            else {
               $bodytxt.= '<strong>No</strong>';

            } 
         $bodytxt.='</div></div>';
         $bodytxt.='</div></div> ';

         $bodytxt.='<div class="modal-footer">
         <a class=" btn btn-inverse " data-dismiss="modal">Cancel</a>
                                                </div>';
         $bodytxt.='</div></div>';
		
		
        return $bodytxt;
        */

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
        $planTypeTitle='';
         $planTypeID = Plans::all();

        $plan = Plan_Package::find($id);


        
       // return compact('plan','planTypeID');

 return response()->json(array('plan'=>$plan,'planTypeID'=>$planTypeID));
        //return $jsonData;
   // return view('admin.plan.edit',compact('plan','planTypeID'));


       

    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request) 
    {
       
        $id=$request->get('planid');
        $this->validate($request, [

            
            'plan_id' => 'required',
            'package_type' => 'required',
            'price' => 'required',
            'price_month' => 'required',
            'price_yearly' => 'required',
           

        ]);


        $input = $request->all();

       


        $user = Plan_Package::find($id);

        $user->update($input);

        
        return redirect()->route('admin.plan.index') 
                        ->with('success','User updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id) 
    {

        Plan_Package::find($id)->delete();


         
        return redirect()->route('admin.plan.index')

                        ->with('success','Plan Package deleted successfully');

    }
}
