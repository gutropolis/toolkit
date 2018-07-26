<?php

namespace Gutropolis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gutropolis\Http\Controllers\Controller;
use Gutropolis\Settings;
use Validator;
use DB;  
use URL;
use Toastr;  
use Gutropolis\Repositories\Contracts\SettingsRepositoryInterface;
use Gutropolis\Repositories\SettingsRepository; 



class AdminSettingsController extends Controller
{
    protected $settingmodel;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(Settings $settings)
   {
       // set the model
        $this->settingmodel = new SettingsRepository($settings);
      
 
   }
    public function index()
    {
        //
        //$alldata=array();
        $mydata=array();
        $settingsData =$this->settingmodel->getAll();
        foreach ($settingsData as $data) {
          $mydata[$data['key']]=$data['value'];
        }
       // print_r($mydata);exit;
       // $jsondata=json_encode($mydata);
       // echo $jsondata;exit;
        $alldata= $mydata;

		return view('admin.settings.index',compact('mydata'));
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
       // $settingsdata =$this->settingmodel->getAll();
       $validator = Validator::make($request->all(), [
        'application_name' => 'required',
        'login_background_image' => 'required',
        'side_bar_background_image' => 'required',
        'group' => 'required',
        'logo' => 'required_without:img',

          ]);

        if ($validator->fails()) {
           Toastr::error('Field is left empty!!', 'error ', ["positionClass" => "toast-top-right"]); 
            return redirect()->route('admin.settings.index');
         }
            if($request->file('logo')!=null)
            {
         $image = $request->file('logo');

          $imageName = time().'.'.$image->getClientOriginalExtension();

          $image->move(public_path('admin/images/upload'), $imageName);
           }
           else
           {
            $imageName=$request->input('img');
           }

       $input = [      
                        'logo' => $imageName,

                        'show_logo_home' => $request->input('show_logo_home'),   
                        'show_logo_application' => $request->input('show_logo_application'),
                        'show_logo_pdf' => $request->input('show_logo_pdf'),
                        
                        'application_name' => $request->input('application_name'),
                        'login_background_image' => $request->input('login_background_image'),
                        'side_bar_background_image' => $request->input('side_bar_background_image'),
                       
                                                
               ];

               $group= $request->input('group');
                $this->settingData($input,$group);

         //$settingsData =$this->settingmodel->getAll();
       // return response()->json($settingsData);
        // return response()->json(['data'=>'settingsData']);
         //return response()->withHeader('Content-type','application/json')->write(json_encode($settingsData));

         

        Toastr::success('Setting created successfully!!', 'Setting ', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.settings.index');
              
              
    }

    public function csettingstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'company_name' => 'required',
        'caddress' => 'required',
        'city' => 'required',
        'state' => 'required',
        'postal_code' => 'required',
        'country' => 'required',
        'phone' => 'required',
        'fax' => 'required',
        'website' => 'required',
        'vatid' => 'required',
        'group' => 'required',

          ]);
        if ($validator->fails()) {
           Toastr::error('Field is left empty!!', 'error ', ["positionClass" => "toast-top-right"]); 
            return redirect()->route('admin.settings.index');
         }

         $input = [      
                        'company_name' => $request->input('company_name'),

                        'caddress' => $request->input('caddress'),   
                        'city' => $request->input('city'),
                        'state' => $request->input('state'),
                        
                        'postal_code' => $request->input('postal_code'),
                        'country' => $request->input('country'),
                        'phone' => $request->input('phone'),
                        'fax' => $request->input('fax'),
                        'website' => $request->input('website'),
                        'vatid' => $request->input('vatid'),
                       
                                                
               ];
                $group= $request->input('group');
                $this->settingData($input,$group);

         
        Toastr::success('Setting created successfully!!', 'Company Setting ', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.settings.index');
    }

     public function outserverstore(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'mail_driver' => 'required',
        'mail_host' => 'required',
        'mail_port' => 'required',
        'mail_username' => 'required',
        'mail_password' => 'required',
        'group' => 'required',


          ]);
       if ($validator->fails()) {
           Toastr::error('Field is left empty!!', 'error ', ["positionClass" => "toast-top-right"]); 
            return redirect()->route('admin.settings.index');
         }
         $input = [     
                        'mail_driver' => $request->input('mail_driver'),

                        'mail_host' => $request->input('mail_host'),   
                        'mail_port' => $request->input('mail_port'),
                        'mail_username' => $request->input('mail_username'),
                        
                        'mail_password' => $request->input('mail_password'),
                        'mail_encryption' => $request->input('mail_encryption'),
                       
                       
                                                
               ];
                $group= $request->input('group');
                $this->settingData($input,$group);

         
        Toastr::success('Setting created successfully!!', 'Ourgoing Server ', ["positionClass" => "toast-top-right"]); 
        return redirect()->route('admin.settings.index');
    }



    function  settingData($input,$group)
    {

        foreach ($input as $key => $value){
                 // echo $key;

                  $data=[
                    'key'=>$key,
                    'value'=>$value,
                    'group'=>$group,
                  ];

                 $keyexist=Settings::where('key',$key)->first();
                 if(count($keyexist)>0)
                 {
                   $this->settingmodel->update($data, $keyexist['id']); 
                 }
                 else
                 {
                    $this->settingmodel->create($data);  

                 }
             //$this->settingmodel->update($data, $key);
          

                    }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
