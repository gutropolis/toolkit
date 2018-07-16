<?php

namespace Gutropolis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gutropolis\Http\Controllers\Controller;
use Gutropolis\Opportunity;
use DB;
use Auth;

class AdminOpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         // $opportunities = Opportunity::orderBy('id','DESC')->paginate(5); 
         $opportunities = Opportunity::orderBy('id','DESC')->get(); 
		 
        return view('admin.opportunity.index',compact('opportunities')) 
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.opportunity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
		$user_id = Auth::user()->id; 
        $opportunities = Opportunity::create(['user_id' =>  $user_id, 
											  'organization_id' => $request->input('organization_id'), 
											  'opportunity' => $request->input('opportunity'),
											  'stages' => $request->input('stages'),
											  'customer_id' => $request->input('customer_id'),
											  'expected_revenue' => $request->input('expected_revenue'),
											  'probability' => $request->input('probability'),
											  'sales_person_id' => $request->input('sales_person_id'),
											  'next_action' => $request->input('next_action'),
											  'expected_closing' => $request->input('expected_closing'),
											  'lost_reason' => $request->input('lost_reason'),
											  'internal_notes' => $request->input('internal_notes'),
											  'assigned_partner_id' => $request->input('assigned_partner_id'),
											  'is_archived' => $request->input('is_archived'),
											  'is_delete_list' => $request->input('is_delete_list'),
											  'is_converted_list' => $request->input('is_converted_list'),
											  
											  ]); 

        return redirect()->route('admin.opportunity.index')

                        ->with('success','Opportunity created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $opportunities = Opportunity::find($id); 

        return view('admin.opportunity.show',compact('opportunities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $opportunities = Opportunity::find($id);   
		
		return response()->json(array('opportunities'=> $opportunities));
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
        $opportunities = Opportunity::find($id);   
											  
        $opportunities->organization_id = $request->input('organization_id'); 
        $opportunities->opportunity = $request->input('opportunity'); 
        $opportunities->stages = $request->input('stages'); 
        $opportunities->customer_id = $request->input('customer_id'); 
        $opportunities->expected_revenue = $request->input('expected_revenue'); 
        $opportunities->probability = $request->input('probability'); 
        $opportunities->sales_person_id = $request->input('sales_person_id'); 
        $opportunities->expected_closing = $request->input('expected_closing'); 
        $opportunities->internal_notes = $request->input('internal_notes');  
        $opportunities->save();
  
        return redirect()->route('admin.opportunity.index')

                        ->with('success','Opportunity updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table("opportunity")->where('id',$id)->delete();           
		return response()->json(array('status'=> 'deleted'));
    }
}
