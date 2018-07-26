<?php

namespace Gutropolis\Http\Controllers\Admin; 
use Illuminate\Database\Eloquent\Model;
use Gutropolis\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;  
use URL;
use Toastr; 
use Gutropolis\Repositories\Contracts\LeadRepositoryInterface;
use Gutropolis\Repositories\LeadRepository; 

use Gutropolis\Lead;



class AdminLeadController extends Controller
{
    
  
   protected $leadmodel;
  

   public function __construct(Lead $lead)
   {
      
        $this->leadmodel = new LeadRepository($lead);
       
 
   }

   
   
   
    public function index()
    {
       
        
        return view('admin.lead.index');
         
    }
    
    
    public function getdata()
    {

         $leadData =$this->leadmodel->getAll();
          
          return DataTables::of($leadData)
                            ->editColumn('first_name',function( $leadData) {
                                
                                return  $leadData->first_name;
                            })
                            ->editColumn('last_name',function( $leadData) {
                                 
                                
                                return  $leadData->last_name;                       
                            })
                            ->editColumn('lead_owner',function( $leadData) {
                                
                                return $leadData->lead_owner;
                            })
                            ->editColumn('company',function( $leadData) {
                                 
                                return  $leadData->company;
                                 
                            })
                            ->editColumn('created_at',function( $leadData) {
                                return $leadData->created_at->diffForHumans();
                            })
                            ->addColumn('actions',function($leadData) {
                    
                             $actions = '';
                             $actions.='<a class="btn btn-pinterest waves-effect waves-light" href="/admin/lead/show/'.$leadData->id.'"><i class="ti-eye" aria-hidden="true"></i></a>';
                             $actions.='<a class="btn btn-info" href="/admin/lead/edit/'.$leadData->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                                
                                $actions .= '<form method="POST" action="'.URL::to("/").'/admin/lead/destroy/'.$leadData->id.'" accept-charset="UTF-8" style="display:inline">
                                                    '. csrf_field() .'  
                                                    <button class="btn btn-danger delete" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Package" data-message="Are you sure you want to delete this Lead ?">
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
        
        return view('admin.lead.create');

    }

    
    public function store(Request $request)
    {

       
         $data = ['first_name' => $request->input('first_name'),
                        'last_name' => $request->input('last_name'),
                        'company' => $request->input('company'),
                        'lead_owner' => $request->input('lead_owner'),
                        'title_or_position' => $request->input('title_or_position'),
                        'phone' => $request->input('phone'),
                        'mobile' => $request->input('mobile'),
                        'fax' => $request->input('fax'),
                        'email' => $request->input('email'),
                        'lead_status' => $request->input('lead_status'),
                        'rating' => $request->input('rating'),
                        'address' => $request->input('address'),
                        'Industry' => $request->input('Industry'),
                        'lead_source' => $request->input('lead_source'),
                        'annual_revenue' => $request->input('annual_revenue'),
                        'number_of_employees' => $request->input('number_of_employees'),
                        'website' => $request->input('website'),
                        'system_col_id' => $request->input('system_col_id'),
                        'created_by' => $request->input('created_by'),
                        'last_modified_by' => $request->input('last_modified_by'),


                    ];

        $this->leadmodel->create($data); 
        Toastr::success('Lead have created successfully!!', 'Lead ', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.lead.index');
    
       
    }

   
    public function show($id)
    {
        
       $leadData = $this->leadmodel->getById($id);   
       return view('admin.lead.show',compact('leadData'));
    }
 public function edit($id)
    {
      $leadData = $this->leadmodel->getById($id);   
       return view('admin.lead.edit',compact('leadData'));
        
    }
   
   
    public function update(Request $request, $id)
    {
        
        
        
           $data = ['first_name' => $request->input('first_name'),
                        'last_name' => $request->input('last_name'),
                        'company' => $request->input('company'),
                        'lead_owner' => $request->input('lead_owner'),
                        'title_or_position' => $request->input('title_or_position'),
                        'phone' => $request->input('phone'),
                        'mobile' => $request->input('mobile'),
                        'fax' => $request->input('fax'),
                        'email' => $request->input('email'),
                        'lead_status' => $request->input('lead_status'),
                        'rating' => $request->input('rating'),
                        'address' => $request->input('address'),
                        'Industry' => $request->input('Industry'),
                        'lead_source' => $request->input('lead_source'),
                        'annual_revenue' => $request->input('annual_revenue'),
                        'number_of_employees' => $request->input('number_of_employees'),
                        'website' => $request->input('website'),
                        'system_col_id' => $request->input('system_col_id'),
                        
                        'last_modified_by' => $request->input('last_modified_by'),


                    ];
                    
         
        
        $this->leadmodel->update($data, $id); 
          
        Toastr::success('lead  updated successfully!!', 'Lead', ["positionClass" => "toast-top-right"]); 
        return view('admin.lead.index');
       
        
    }

   
    public function destroy($id) 
    {
           $this->leadmodel->delete($id);           
            Toastr::success('Lead Data have deleted successfully!!', 'Lead', ["positionClass" => "toast-top-right"]);      
            return redirect()->route('admin.lead.index');
            
    }
    public function checkValidation(Request $request )
    {
        
        $validator = \Validator::make($request->all(),[
                        'first_name' => 'required',
        'last_name' => 'required',
        'lead_owner' => 'required',
        'company' => 'required',
        'title_or_position' => 'required',
        'phone' => 'required',
        'mobile' => 'required',
        'fax' => 'required',
        'email' => 'required',
        'lead_status' => 'required',
        'rating' => 'required',
        'address' => 'required',
        'Industry' => 'required',
        'lead_source' => 'required',
        'annual_revenue' => 'required',
        'number_of_employees' => 'required',
        'website' => 'required',
        'system_col_id' => 'required',
                         
                    ]);
        
        if ($validator->fails())
        {
          return response()->json(['error'=>$validator->errors()->all()]); 
        }
    
    }
   
}
