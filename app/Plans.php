<?php

namespace Gutropolis;

use Gutropolis\PlanPackage;

use Illuminate\Database\Eloquent\Model;

class Plans extends BaseModel
{
    //
    protected $table = 'plan';
    protected $fillable = [
       'id', 'slug','title', 'description','is_stripe_plan','stripe_plan_id','is_razor_plan','razor_plan_id'
    ];
	 
    
	   /**
     * Get many packages.
     */
	   
    public function package()
    { 
		return $this->hasMany('Gutropolis\PlanPackage','plan_id','id');
    }
}
