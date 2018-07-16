<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

class PackageFeature extends Model
{
    //
    protected $table = 'package_feature';
    protected $fillable = [

        'title', 'description', 'order_by' ,'package_id'

    ];
}
