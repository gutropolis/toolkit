<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

class PlanPackage  extends BaseModel
{
    protected $table = 'plan_packages';
	protected $fillable = [
					 'plan_id', 'package_type','title','description','slug',  'price', 'have_trial',  
					 'trial_days','users_allowed','users_limit','support_available','razor_package_id','stripe_package_id'
						  ];


    /**
     * Get the phone record associated with the user.
     */

    public function plan()
    {
			return $this->belongsTo('Gutropolis\Plans','plan_id');
       
    }

}
