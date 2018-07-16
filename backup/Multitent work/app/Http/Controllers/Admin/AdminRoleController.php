<?php

namespace Gutropolis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gutropolis\Http\Controllers\Controller;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Yajra\DataTables\DataTables;

class AdminRoleController extends Controller
{
	 private $roles;
         /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct()

    {

         $this->middleware('permission:role-list');

         $this->middleware('permission:role-create', ['only' => ['create','store']]);

         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
			 
    }


    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {	
		$roles = Role::orderBy('id','DESC')->paginate(5);
		$permission = Permission::get();
		$rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")->get();
		
			
        return view('admin.roles.index',compact('roles','permission','rolePermissions'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }

	
	
	public function data()
	{
		
		$roles = Role::all();
		
		return DataTables::of($roles)
            ->editColumn('created_at',function(Role $roles) {
                return $roles->created_at->diffForHumans();
            })
			->addColumn('actions',function($roles) {
					 
                $actions = '<button type="button" class="btn btn-info" data-toggle="modal" data-target-id="'. $roles->id.' "  data-target="#edit_roles"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
               
                    $actions .= ' <a class="btn btn-danger" href='. route('admin.roles.destroy', $roles->id) .'><i class="fa fa-trash" aria-hidden="true"></i></a>';
               
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

        $permission = Permission::get();

        return view('admin.roles.create',compact('permission'));

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

            'name' => 'required|unique:roles,name',

            'permission' => 'required',

        ]);


        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permission'));


        return redirect()->route('admin.roles.index')

                        ->with('success','Role created successfully');

    }

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $role = Role::find($id);

        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")

            ->where("role_has_permissions.role_id",$id)

            ->get();


        return view('admin.roles.show',compact('role','rolePermissions'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id) 
    { 
        $role = Role::find($id);

        $permission = Permission::get();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)

            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')

            ->all();
		
		$htmlElement = '<div class="modal-header">
							<h4 class="modal-title" id="exampleModalLabel1">New message</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form method="post" id="update_form">
							'. csrf_field() .'
								<div class="form-group">
									<label>Name <span class="help"> e.g. "Admin,Team"</span></label>
									
									<input type="text" class="form-control" name="name" value='.$role->name .' >
								</div> 
								<div class="form-group">
									<strong>Permission:</strong>
									 
										<div class="demo-checkbox">';
						
									foreach($permission as $value){
										$checked='';
										if(in_array($value->id, $rolePermissions))
										{
											$checked='checked';
										}
										
									$htmlElement .= '<input  type="checkbox" id="md_checkboxes_'.$value->id .'" class="chk-col-green"  name="permission[]" value="'.$value->id .'" '.$checked .' /><label for="md_checkboxes_'.$value->id.'">'.$value->name .'</label> ';
									}
				$htmlElement .= '</div>
								</div> 
							  <button type="submit" class="btn btn-primary">Submit</button>
							  <a class=" btn btn-inverse " href="{{ route("admin.roles.index") }}">Cancel</a>
							</form>
						</div>';

        return response()->json(array('data1'=>$role,'data2'=>$rolePermissions,'data3'=>$permission,'data4'=>$htmlElement));
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

            'name' => 'required',

            'permission' => 'required',

        ]);


        $role = Role::find($id);
		

        $role->name = $request->input('name');
		

        $role->save();

		$role->syncPermissions($request->input('permission'));
        

		 return redirect()->route('admin.roles.index')

                        ->with('success','Role updated successfully');

    }

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id) 
    { 
	
        DB::table("roles")->where('id',$id)->delete(); 
       return redirect()->route('admin.roles.index');

    }
	 
}
