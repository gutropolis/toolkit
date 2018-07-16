<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    //
	protected $table = 'opportunity';
    protected $fillable = [
       'id', 'user_id', 'organization_id','opportunity','stages','customer_id','expected_revenue','probability','sales_person_id','next_action','expected_closing','lost_reason','internal_notes','assigned_partner_id','is_archived','is_delete_list','is_converted_list'  ];
}
