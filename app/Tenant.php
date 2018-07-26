<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
     protected $table = 'sass_tenants';
	protected $fillable = [
					 'id','db_name','user_id', 'role_id', 'db_host','db_username','db_password',  'db_port','db_driver'
						  ];
}
