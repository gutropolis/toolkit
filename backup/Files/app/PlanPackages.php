<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

class PlanPackages extends Model
{
    //
     protected $table = 'plan_packages';
     protected $fillable = [

       'id', 'title', 'description', 'order_by' ,'package_id'

    ];
}
