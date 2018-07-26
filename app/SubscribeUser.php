<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

class SubscribeUser extends BaseModel
{
    protected $table = 'subscribe_users';
	protected $fillable = [ 'id', 'user_id', 'organization_id', 'start_date', 'end_date', 'status', 'invoice_id'  ];
}
