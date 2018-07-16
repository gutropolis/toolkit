<?php

namespace Gutropolis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gutropolis\Http\Controllers\Controller;
use Gutropolis\PermissonModule;

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
				
				
				  
                   $actions  = '<button type="button" class="btn btn-info" data-toggle="modal" data-target-id="'. $roles->id.' "  data-target="#edit_roles"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
               
                    $actions .= '&nbsp; <a class="btn btn-danger" href='. route('admin.roles.destroy', $roles->id) .'><i class="fa fa-trash" aria-hidden="true"></i></a>';
                    $actions  .= '&nbsp;<div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="'. route('admin.role-managment.index', $roles->id) .'">Role Module</a>
                                     
                                    </div>
                                </div>';	 
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

            'name' => 'required|unique:roles,name' 

        ]);


        $role = Role::create(['name' => $request->input('name')]);
 

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
							  <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary store_submit">Update Role</button>
                             </div>
							   
							</form>
						</div>';

        return response()->json(array('data1'=>$role ,'data4'=>$htmlElement));
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
        $this->validate($request, [  'name' => 'required'  ]); 
        $role = Role::find($id); 
        $role->name = $request->input('name'); 
        $role->save(); 
	    return redirect()->route('admin.roles.index') ->with('success','Role updated successfully'); 
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
	
	
	public function updatePermissionbyRole(Request $request, $id) 
    {
		
         


        $role = Role::find($id);
		
 

		$role->syncPermissions($request->input('permission'));
        

		 return $this->manageRole($id);

    }

	public function manageRole($roleid){
		
		$moduleArrData=array();
		$arrmodulePermission =array();
		$assignedRolePermissionList=array();
		 $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$roleid) 
								->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id') 
								->all();
						  
		if(count( $rolePermissions	) > 0 ){
				foreach ($rolePermissions as $assignP){
					$assignedRolePermissionList[] = $assignP;
				} 
		}		
		 
	    $role = Role::find($roleid);
      
       
		
		$modules = PermissonModule::get();
		
		foreach ($modules as $module){
			$mdouleArr =array();
			$moduleArrData['module_id'] = $module->id;
			$module_id = $module->id;
			$moduleArrData['module_title'] = $module->title;
		    $modulePermissionArr = Permission::where("module",$module_id)->get();
			
			
			if(count($modulePermissionArr)>0){
			    $moduleP=array();
				foreach ($modulePermissionArr as $perm){
           
					$permissionArr=array();
					$permissionID = $perm->id;
				    $permissionArr['is_assign_role'] = '';
					if (in_array($permissionID, $assignedRolePermissionList)){
							$permissionArr['is_assign_role'] = 'checked';
					}
					$permissionArr['id'] = $permissionID;
					$permissionArr['name'] = $perm->name;
					$permissionArr['display_name'] = $perm->display_name;
					$permissionArr['description'] = $perm->description;
					$permissionArr['order'] = $perm->order;
					$permissionArr['guard_name'] = $perm->guard_name; 
					$moduleP[] =$permissionArr;
					
				}
				$moduleArrData['module_permissions']= $moduleP;
				
			}
		
			$arrmodulePermission[]  =$moduleArrData;
		}
		 
       return view('admin.roles.managerolepermission',compact('role','rolePermissions','arrmodulePermission'));
		
	}
	 
}
