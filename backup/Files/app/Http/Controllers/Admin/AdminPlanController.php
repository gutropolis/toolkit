<?php

namespace Gutropolis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gutropolis\Http\Controllers\Controller;
use Gutropolis\Plans;

use DB;

class AdminPlanController extends Controller
{
    //

     public function index(Request $request)

    {

       $plans = Plans::orderBy('id','DESC')->paginate(5);
    	 

        return view('admin.plans.index',compact('plans'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


	public function create()

    {
        return view('admin.plans.create');

    }

    public function store(Request $request)

    {

        $this->validate($request, [

            'title' => 'required|unique:plan_types,title',

            'description' => 'required',

        ]);


        $plans = Plans::create(['title' => $request->input('title'), 'description' => $request->input('description')]);

       // $plans->syncPermissions($request->input('description'));


        return redirect()->route('admin.plans.index')

                        ->with('success','Plan Type created successfully');

    }

     public function show($id)

    {

        $plans = Plans::find($id); 

        return view('admin.plans.show',compact('plans'));

    }

     public function edit($id) 
    { 
        $plans = Plans::find($id);   
        return view('admin.plans.edit',compact('plans')); 
    }


    public function update(Request $request, $id) 
    {

        $this->validate($request, [

            'title' => 'required',

            'description' => 'required',

        ]);


        $plan = Plans::find($id);

        $plan->title = $request->input('title');
        $plan->description = $request->input('description');

        $plan->save();
  
        return redirect()->route('admin.plans.index')

                        ->with('success','Plan Type updated successfully');

    }

     public function destroy($id) 
    { 
        DB::table("plan_types")->where('id',$id)->delete(); 
        return redirect()->route('admin.plans.index') 
                        ->with('success','Plan Type deleted successfully');

    }
}
