<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

class SubscribeUser extends BaseModel
{
    protected $table = 'subscribe_users';
	protected $fillable = [ 
	'id', 
	'user_id', 
	'item_id', 
	'organization_id', 
	'start_date', 
	'end_date', 
	'subscription_reference', 
	 
	'next_billing_at', 
	'interval', 
	'billing_address', 
	'shipping_address',
	
	'status', 
	'invoice_id'  ];
}
