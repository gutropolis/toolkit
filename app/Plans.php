<?php

namespace Gutropolis;

use Gutropolis\PlanPackage;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    //
    protected $table = 'plan';
    protected $fillable = [
       'id', 'title', 'description'
    ];
	
    
	 
}
