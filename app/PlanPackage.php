<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

class PlanPackage extends Model
{
    protected $table = 'plan_packages';
	protected $fillable = [
					 'plan_id','package_type', 'price', 'price_month','price_yearly','have_trial',  'trial_days','users_allowed','users_limit','support_available'
						  ];


    /**
     * Get the phone record associated with the user.
     */
    public function plan()
    {
			return $this->belongsTo('Gutropolis\Plans','plan_id');
       
    }

}
