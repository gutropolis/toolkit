<?php

namespace Gutropolis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gutropolis\Http\Controllers\Controller; 
use Gutropolis\Permisson;
use Gutropolis\PermissonModule;
 




class AdminPermissionController extends Controller
{
   /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

  

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {
		$data=Permisson::where('module',$request->module)->get();
        $permissions = Permisson::latest()->paginate(5);
		$module = PermissonModule::all();

        return view('admin.permission.index',compact('permissions','module','data'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }
	
	public function showdata(Request $request)
	{
			$data=Permisson::where('module',$request->module)->get();
			return view('admin.permission.index',compact('data'));
			
	}


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {
		$module=PermissonModule::all();
		
        return view('admin.permission.create',compact('module'));

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {
		

        request()->validate([
			'module'=>'required',
            'name' => 'required',
			 'display_name' => 'required',
			'order' => 'required',
			'guard_name' => 'required',
            'description' => 'required',

        ]);


        Permisson::create($request->all());

		
        return redirect()->route('admin.permission.index')

                        ->with('success','Permission created successfully.');

    }


    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function show(Product $product)

    {

        return view('admin.permission.show',compact('product'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit(Permisson $permission)

    {
		$module=PermissonModule::all();

        return view('admin.permission.edit',compact('permission','module'));

    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Permisson $permission)

    {

         request()->validate([

            'name' => 'required',
			 'display_name' => 'required',
			'order' => 'required',
			'guard_name' => 'required',
            'description' => 'required',

        ]);


        $permission->update($request->all());


        return redirect()->route('admin.permission.index')

                        ->with('success','Permission updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function destroy(Product $product)

    {

        $product->delete();


        return redirect()->route('products.index')

                        ->with('success','Product deleted successfully');

    }
}
