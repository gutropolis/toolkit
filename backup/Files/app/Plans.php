<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    //
    protected $table = 'plan_types';
    protected $fillable = [

       'id', 'title', 'description'

    ];
}
