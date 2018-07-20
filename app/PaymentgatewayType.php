<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

class PaymentgatewayType extends Model
{
    //
	 //
    protected $table = 'paymentgateway_types';
    protected $fillable = [
       'id', 'title', 'image_url','order','status'
    ];
}



