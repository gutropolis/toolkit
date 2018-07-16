<?php

namespace Gutropolis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gutropolis\Http\Controllers\Controller; 
use Gutropolis\Permisson;
use Gutropolis\PermissonModule;
use Yajra\DataTables\DataTables;
use Redirect;
 
use DB;



class AdminPermissionController extends Controller
{
   

    public function index(Request $request)
	{
		//	$module_id= '3';
		$module_id = $request->input('mod');
		if(intval($module_id) > 0 ){
		$permission =	Permisson::where('module','=',$module_id)->get();
		}else{
			$permission =	Permisson::all();
		}
     
		$module = PermissonModule::get();
		

        return view('admin.permission.index',compact('permission','module'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
		}

    
	public function data()
	{
		
		$permission =	Permisson::all();
		
		return DataTables::of($permission)
            ->editColumn('created_at',function(Permisson $permission) {
                return $permission->created_at->diffForHumans();
            })
			->addColumn('actions',function($permission) {
					 
                $actions = '<button type="button" class="btn btn-info" data-toggle="modal" data-target-id="'. $permission->id.' "  data-target="#edit_permission"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
               
                    $actions .= ' <a class="btn btn-danger" href='. route('admin.permission.destroy', $permission->id) .'><i class="fa fa-trash" aria-hidden="true"></i></a>';
               
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
		
		
		
	}
	
	
	
	public function show(Request $request,$id )

    {
		return $id;
		$data=Permisson::where('module',$id)->get();
		$module = PermissonModule::all();
		 return view('admin.permission.index',compact('data','module'))
		   ->with('i', (request()->input('page', 1) - 1) * 5);  
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

		$notification = array(
			'message' => 'I am a successful message!', 
			'alert-type' => 'success'
			);
			
		return Redirect::to('/admin/permission')->with($notification);

       

    }


    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    


    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
		 $permission = Permisson::find($id);
		$module = PermissonModule::get();
							$htmlElement = '<div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Edit Permission </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
											 
										 <form method="post" action="/admin/permission/update/'.$permission->id.'">
												'. csrf_field() .'
													<div class="form-group">
													<h5>Select Module<span class="text-danger">*</span></h5>
													<div class="controls">
														<select name="module"   class="form-control">
														<option>Select...</option>';
															foreach($module as $modules){
																$selected='';
																	if($modules->id == $permission->module)
																	{
																		$selected='selected';
																	}
																
																
																
															$htmlElement .= ' <option value="'.$modules->id .'"'.$selected.'>'.$modules->title .'</option>';
															}
															$htmlElement .= '
														</select>
														</div>

												</div>
												
												
												
												
                                             <div class="form-group">
													<h5>Title<span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name="name" value='.$permission->name .' class="form-control"> </div>

												</div>
												<div class="form-group">
													<h5>Display Name<span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name="display_name"  value="'.$permission->display_name .'"  class="form-control"> </div>

												</div>
												<div class="form-group">
													<h5>Description <span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name="description"  value="'.$permission->description .'"  class="form-control"> </div>
													
												</div>
												<div class="form-group">
													<h5>Order <span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name ="order"  value='.$permission->order .'    name="order" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<h5>Guard Name <span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name ="guard_name"  value='.$permission->guard_name .'    name="guard_name" class="form-control">
													</div>
												</div>
												
                                            <div class="modal-footer">
											 
											
                                                <div class="modal-footer">
												 <button type="submit" class="btn btn-primary"  >Submit</button>
                                                <a type="button" href="/admin/permission" class="btn btn-default" data-dismiss="modal">Cancel</a>
                                               
                                            </div>
                                            </div>
											</form>
										 
                                        </div>';
								
         return response()->json($htmlElement);

    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request ,$id)

    {
	
	
         
   $permission = Permisson::find($id);
  
		$permission->module= $request->input('module');
       $permission->name = $request->input('name');
		$permission->display_name = $request->input('display_name');
		$permission->description = $request->input('description');
		$permission->order = $request->input('order');
		$permission->guard_name = $request->input('guard_name');
		$permission->save();
		
        return redirect()->route('admin.permission.index')

                        ->with('success','Permission updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

      public function destroy($id) 
    { 
        DB::table("permissions")->where('id',$id)->delete(); 
     
			 return redirect()->route('admin.permission.index');

    }
}
