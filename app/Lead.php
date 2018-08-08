<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';
    protected $fillable = [
			'id','first_name','last_name','lead_owner','company','title_or_position','phone',
			'mobile','fax','email','lead_status','rating','address','Industry','lead_source','annual_revenue',
			'number_of_employees','website','system_col_id','created_by','last_modified_by',
        

    ];
}
 