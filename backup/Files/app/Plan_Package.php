<?php

namespace Gutropolis;

use Illuminate\Notifications\Notifiable;
 

use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Permission\Traits\HasRoles;

class Plan_Package extends Authenticatable
{
    use  Notifiable, HasRoles;


 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plan_id','package_type', 'price', 'price_month','price_yearly','have_trial','users_allowed','support_available',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'plan_id', 'package_type', 'price', 'price_month','price_yearly','have_trial','users_allowed','support_available',
    ];
}
