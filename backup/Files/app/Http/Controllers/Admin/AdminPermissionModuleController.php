<?php

namespace Gutropolis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gutropolis\Http\Controllers\Controller; 
use Gutropolis\PermissonModule;
 




class AdminPermissionModuleController extends Controller
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

    public function index()

    {

        $permissionmodule = PermissonModule::latest()->paginate(5);

        return view('admin.permissionmodule.index',compact('permissionmodule'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

	
    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('admin.permissionmodule.create');

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

            'title' => 'required',

            'description' => 'required',

        ]);


        PermissonModule::create($request->all());

		
        return redirect()->route('admin.permissionmodule.index')

                        ->with('success','Product created successfully.');

    }


    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function show(Product $product)

    {

        return view('products.show',compact('product'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit(PermissonModule $permissionmodule)

    {

        return view('admin.permissionmodule.edit',compact('permissionmodule'));

    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, PermissonModule $permissionmodule)

    {

         request()->validate([

            'title' => 'required',

            'description' => 'required',

        ]);


        $permissionmodule->update($request->all());


        return redirect()->route('admin.permissionmodule.index')

                        ->with('success','Product updated successfully');

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
