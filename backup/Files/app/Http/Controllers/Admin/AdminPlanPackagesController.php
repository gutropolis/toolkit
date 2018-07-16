<?php

namespace Gutropolis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gutropolis\Http\Controllers\Controller; 
use Gutropolis\User;
use Gutropolis\Plan_Package;
use Gutropolis\Plans;
use Spatie\Permission\Models\Role; 

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

        $data = Plan_Package::orderBy('id','DESC')->paginate(5);

        return view('admin.plan.index',compact('data'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

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

                        ->with('success','Plan Package created successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $plan = Plan_Package::find($id);
        $planTypeID = Plans::all();
        return view('admin.plan.show',compact('plan','planTypeID'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
         $planTypeID = Plans::all();

        $plan = Plan_Package::find($id);



        return view('admin.plan.edit',compact('plan','planTypeID'));

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
