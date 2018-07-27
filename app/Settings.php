<?php

namespace Gutropolis;

use Gutropolis\Settings;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    protected $table = 'settings';
    protected $fillable = [
       'key', 'value','group'
    ];
	
    
	 
}