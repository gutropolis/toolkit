<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

class Plan_Package extends Model
{
	
	protected $fillable = [
   'plan_id','package_type', 'price', 'price_month','price_yearly','have_trial','users_allowed','support_available'
];
}
