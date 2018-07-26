<?php

namespace Gutropolis\Http\Controllers\Admin;

use Gutropolis\Tenant;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Gutropolis\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use DB;  
use URL;
use Toastr; 
use Gutropolis\Repositories\Contracts\TenantRepositoryInterface; 
use Gutropolis\Repositories\TenantRepository;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
class AdminTenantController extends Controller
{
    protected $tenantmodel;
   

   public function __construct(Tenant $tenant)
   {
       // set the model
        $this->tenantmodel = new TenantRepository($tenant);
        
 
   }
    public function index()
    {
       return view('admin.tenant.index');
    }

    public function getdata()
    {
         
         $tenantdata =$this->tenantmodel->getAll();
          // print_r($planpackagedata);exit;
         //$plan = Plans::all();  
          return DataTables::of($tenantdata)
                            ->editColumn('db_name',function( $tenantdata) {
                                
                                         $db_name= $tenantdata->db_name; 
                                
                                return  $db_name;
                            })
                            ->editColumn('db_host',function( $tenantdata) {
                                 
                                $db_host= $tenantdata->db_host;
                                return  $db_host;                       
                            })
                            ->editColumn('db_username',function( $tenantdata) {
                                $db_username=$tenantdata->db_username; 
                                return $db_username;
                            })
                            ->editColumn('db_driver',function( $tenantdata) {
                                 
                                return  $tenantdata->db_driver;
                                 
                            })
                            ->editColumn('created_at',function( $tenantdata) {
                                return $tenantdata->created_at->diffForHumans();
                            })
                            ->addColumn('actions',function($tenantdata) {
                    
                             $actions = '';
                                $actions .= '&nbsp;<button type="button" class="btn btn-info edit-modal"   data-info="'.$tenantdata->id.'"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
                                $actions .= '<form method="POST" action="'.URL::to("/").'/admin/tenant/destroy/'.$tenantdata->id.'" accept-charset="UTF-8" style="display:inline">
                                                    '. csrf_field() .'  
                                                    <button class="btn btn-danger delete" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Tenant" data-message="Are you sure you want to delete this Tenant ?">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>'; 
                                return $actions;
                            })
                            ->rawColumns(['actions'])
                            ->make(true);
    }

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [       'db_host' => $request->input('db_host'),
                        'db_name' => $request->input('db_name'),
                        'db_username' => $request->input('db_username'),
                        'db_password' => $request->input('db_password'),
                        'db_port' => $request->input('db_port'),
                        'db_driver' => $request->input('db_driver'),
                        'user_id' => $request->input('user_id'),
                        'role_id' => $request->input('role_id') 
                ];

        // create record and pass in only fields that are fillable
        
        $this->tenantmodel->create($data); 



           if (DB::statement('create database ' . $data['db_name']) == true) {
             DB::purge($data['db_name']);
            Config::set("database.connections.other", [
    
                "database" =>$data['db_name'],
  
                  ]);

           DB::reconnect($data['db_name']);
            $table_name = 'testing';
 
        // set your dynamic fields (you can fetch this data from database this is just an example)
        $fields = [
            ['name' => 'first_name', 'type' => 'string'],
            ['name' => 'last_name', 'type' => 'text'],
            ['name' => 'pin_code', 'type' => 'integer'],
            ['name' => 'address', 'type' => 'longText']
        ];
        $dbname='other';
 
         $this->createTable($dbname['db_name'],$table_name, $fields);
          
          Toastr::success('Database created successfully!!', 'Tenants ', ["positionClass" => "toast-top-right"]); 
         } 
       else
           {
       Toastr::success('Database Database Already Exitst!!', 'Tenants ', ["positionClass" => "toast-top-right"]);
              }









        Toastr::success('Tenant have created successfully!!', 'Tenants ', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.tenant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Gutropolis\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tenantData = $this->tenantmodel->getById($id); 
        return response()->json($tenantData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Gutropolis\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Gutropolis\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editdata = [   'db_host' => $request->input('db_host'),
                        'db_username' => $request->input('db_username'),
                        'db_password' => $request->input('db_password'),
                        'db_port' => $request->input('db_port'),
                        'db_driver' => $request->input('db_driver'),
                        'user_id' => $request->input('user_id'),
                        'role_id' => $request->input('role_id') 
                ];

        // create record and pass in only fields that are fillable
        
        $this->tenantmodel->update($editdata, $id); 
        Toastr::success('Tenant have updated successfully!!', 'Tenants ', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.tenant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Gutropolis\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tenantmodel->delete($id);  

            Toastr::success('Tenant have deleted successfully!!', 'Tenant', ["positionClass" => "toast-top-right"]);      
            return redirect()->route('admin.tenant.index');
    }

     public function checkValidation(Request $request )
    {
        
        $validator = \Validator::make($request->all(),[
                        'db_host' => 'required',
                        'db_username' => 'required',
                        'db_password'=> 'required',
                        'db_port'=> 'required',
                        'db_driver'=> 'required',
                        'user_id'=> 'required',
                        'role_id'=> 'required',
                         
                    ]);
        
        if ($validator->fails())
        {
          return response()->json(['error'=>$validator->errors()->all()]); 
        }
    
    }


     public function createTable($db_name,$table_name, $fields = [])
    {
        // check if table is not already exists
        if (!Schema::hasTable($table_name)) {
            Schema::connection($db_name)->create($table_name, function (Blueprint $table) use ($fields, $table_name) {
                $table->increments('id');
                if (count($fields) > 0) {
                    foreach ($fields as $field) {
                        $table->{$field['type']}($field['name']);
                    }
                }
                $table->timestamps();
            });
 
            return response()->json(['message' => 'Given table has been successfully created!'], 200);
        }
 
        return response()->json(['message' => 'Given table is already existis.'], 400);
    }
}
