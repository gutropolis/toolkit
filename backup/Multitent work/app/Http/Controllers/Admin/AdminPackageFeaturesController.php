<?php

namespace Gutropolis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gutropolis\Http\Controllers\Controller;
use Gutropolis\PackageFeature;
use Gutropolis\PlanPackages;
use DB;

class AdminPackageFeaturesController extends Controller
{
    public function index(Request $request)

    {

       // $package_features = PackageFeature::orderBy('id','DESC')->paginate(5);
       $package_features = PackageFeature::orderBy('id','DESC')->get();
	   $plan_packages = PlanPackages::all();
	   
       return view('admin.package-feature.index',compact('package_features','plan_packages'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


	public function create()

    {
    	$plan_packages = PlanPackages::All(['id']);
    	 
        return view('admin.package-feature.create', compact('plan_packages'));

    }

    public function store(Request $request)

    {

        $this->validate($request, [

            'title' => 'required|unique:package_feature,title',
            'description' => 'required',
            'order_by' => 'required',
            'package_id' => 'required'
        ]);


        $plans = PackageFeature::create(['title' => $request->input('title'), 
        								'description' => $request->input('description'),
        								'order_by' => $request->input('order_by'),
        								'package_id' => $request->input('package_id'),
        							]);

       // $plans->syncPermissions($request->input('description'));


        return redirect()->route('admin.package-feature.index')

                        ->with('success','Package Feature created successfully');

    }

     public function show($id)

    {

        $package_feature = PackageFeature::find($id); 

        return view('admin.package-feature.show',compact('package_feature'));

    }

     public function edit($id) 
    { 
        $package_feature = PackageFeature::find($id);   
        $plan_packages = PlanPackages::all();  
		return response()->json(array('package_feature'=> $package_feature, 'plan_packages' => $plan_packages));
       // return view('admin.package-feature.edit',compact('package_feature', 'plan_packages')); 
    }


    public function update(Request $request, $id) 
    { 
        $this->validate($request, [ 
           'title' => 'required',
            'description' => 'required'
        ]);  
		
        $package_feature = PackageFeature::find($id);
        $package_feature->title = $request->input('title');
        $package_feature->description = $request->input('description');
        $package_feature->order_by = $request->input('order_by');
        $package_feature->package_id = $request->input('package_id');
        $package_feature->save();
  
        return redirect()->route('admin.package-feature.index')
                        ->with('success','Package Feature updated successfully');

    }

     public function destroy($id) 
    { 
        DB::table("package_feature")->where('id',$id)->delete(); 
        // return redirect()->route('admin.package-feature.index') 
                        // ->with('success','Package Feature deleted successfully');
		return response()->json(array('status'=> 'deleted'));

    }
}
