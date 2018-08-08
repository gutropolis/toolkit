<?php

namespace Gutropolis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gutropolis\Http\Controllers\Controller; 
use Gutropolis\PermissonModule;
use Yajra\DataTables\DataTables;
 use DB;




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

	public function data()
	{
				//echo "hello";exit;
				$permissionmodule = PermissonModule::get(['id','title', 'description', 'created_at']);
				//return $permissionmodule;
		

			return DataTables::of($permissionmodule)
            ->editColumn('created_at',function(PermissonModule $permissionmodule) {
                return $permissionmodule->created_at->diffForHumans();
            })
			->addColumn('actions',function($permissionmodule) {
					 
                $actions = '<button type="button" class="btn btn-info" data-toggle="modal" data-target-id="'. $permissionmodule->id.' "  data-target="#edit_permission_modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
               
                    $actions .= '&nbsp;<a class="btn btn-danger" href='. route('admin.permissionmodule.destroy', $permissionmodule->id) .'><i class="fa fa-trash" aria-hidden="true"></i></a> ';
               
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

            'description' => 'required'
			 

        ]);


        PermissonModule::create($request->all());

		
        return redirect()->route('admin.permissionmodule.index')

                        ->with('success','Permission Module created successfully.');

    }


    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function show(PermissonModule $permissionmodule)

    {

        return view('products.show',compact('product'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

     public function edit($id) 
    { 
        $permissionmodule = PermissonModule::find($id);

        return response()->json($permissionmodule);

    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

         request()->validate([

            'title' => 'required',

            'description' => 'required',

        ]);


     $permissionmodule = PermissonModule::find($id);

        $permissionmodule->title = $request->input('title');
        $permissionmodule->description = $request->input('description');

        $permissionmodule->save();

        return redirect()->route('admin.permissionmodule.index')

                        ->with('success','Product updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

   public function destroy($id) 
    { 
        DB::table("permission_module")->where('id',$id)->delete(); 
     
			return response()->json(array('status'=> 'deleted'));

    }
}
