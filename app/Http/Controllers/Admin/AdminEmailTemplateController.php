<?php

namespace Gutropolis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gutropolis\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use DB;  
use URL;
use Toastr; 
use Gutropolis\Repositories\Contracts\EmailTemplateRepositoryInterface;
use Gutropolis\Repositories\EmailTemplateRepository; 
use Gutropolis\EmailTemplate;
use Validator;
use Auth;

class AdminEmailTemplateController extends Controller
{
	
	// space that we can use the repository from
	
	protected $emailtemplate; 
	
	public function __construct( EmailTemplate $emailtemplate )
	{
       // set the model
        $this->emailtemplate = new EmailTemplateRepository($emailtemplate);		 
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emailtemplate =$this->emailtemplate->getAll();
        return view('admin.emailtemplate.index', compact('emailtemplate'));         
    }
	
	public function getdata()
    {
		 
         $emailtemplatedata = $this->emailtemplate->getAll();
		 
		  return DataTables::of($emailtemplatedata)
							->editColumn('title',function( $emailtemplatedata) {
                                $title='';
								if(isset($emailtemplatedata->title)){
										 $title= $emailtemplatedata->title;
								} 
								return  $title;
							}) 
							->editColumn('type',function( $emailtemplatedata) {
								$type= $emailtemplatedata->type; 
								return $type;
							})
							->editColumn('subject',function( $emailtemplatedata) {
                                 
								return  $emailtemplatedata->subject;
								 
							})
							->editColumn('created_at',function( $emailtemplatedata) {
								return $emailtemplatedata->created_at;
							})
							->addColumn('actions',function($emailtemplatedata) {
					
							 $actions = ''; 
								$actions .= '&nbsp;<a href="'.URL::to("/").'/admin/emailtemplate/show/'.$emailtemplatedata->id.'" class="btn btn-info" data-info="'.$emailtemplatedata->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
							    $actions .= '<form method="POST" action="'.URL::to("/").'/admin/emailtemplate/destroy/'.$emailtemplatedata->id.'" accept-charset="UTF-8" style="display:inline">
								                    '. csrf_field() .'  
													<button class="btn btn-danger delete" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Email Template" data-message="Are you sure you want to delete this Email Template ?">
														<i class="fa fa-trash" aria-hidden="true"></i>
													</button>
												</form>'; 
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
        $validator = Validator::make($request->all(), [
				'title' => 'required', 
				'type' => 'required',
				'subject' => 'required',
				'content' => 'required' 
          ]);
		  
        if ($validator->fails()) {
           Toastr::error('Fields are left empty!!', 'error ', ["positionClass" => "toast-top-right"]); 
            return redirect()->route('admin.emailtemplate.index');
        }
		
		if($request->input('template_status') == 'active'){
			$template_status = 'active';
		}
		else
		{
			$template_status = 'inactive';
		}
		 
		$slug = str_slug( $request->input('title') , '-'); 
		// create record and pass in only fields that are fillable
        $data = [  	'title' => $request->input('title'),
					'slug' => $slug,
					'type' => $request->input('type'),
					'subject' => $request->input('subject'),
					'content' => $request->input('content'),
					'from_email' => $request->input('from_email'),
					'from_name' => $request->input('from_name'),
					'template_status' => $template_status,
				];
				
		$this->emailtemplate->create($data);
		
        Toastr::success('Email Template have created successfully!!', 'Email Template', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.emailtemplate.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emailtemplatebyid = $this->emailtemplate->getById($id);
		 
		return view('admin.emailtemplate.show')->with(compact('emailtemplatebyid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
		 $validator = Validator::make($request->all(), [
				'title' => 'required', 
				'type' => 'required',
				'subject' => 'required',
				'content' => 'required',
				'from_email' => 'required',
				'from_name' => 'required', 
          ]);
		  
        if ($validator->fails()) {
           Toastr::error('Fields are left empty!!', 'error ', ["positionClass" => "toast-top-right"]); 
            return redirect()->route('admin.emailtemplate.index');
        }
		if($request->input('template_status') == 'active'){
			$template_status = 'active';
		}
		else
		{
			$template_status = 'inactive';
		}
         $data = [
            'title' => $request->input('title'),
            'type' => $request->input('type'),
            'subject' => $request->input('subject'),
            'content' => $request->input('content'),
            'from_email' => $request->input('from_email'),
            'from_name' => $request->input('from_name'),
            'template_status' => $template_status,
        ];	
		 
		$this->emailtemplate->update($data, $id); 
		Toastr::success('Email Template have updated successfully!!', 'Email Template', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.emailtemplate.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
	 
    public function destroy($id)
    { 
		$this->emailtemplate->delete($id); 			
		Toastr::success('Email Template have deleted successfully!!', 'Email Template', ["positionClass" => "toast-top-right"]); 		
		return redirect()->route('admin.emailtemplate.index');
    }
}
