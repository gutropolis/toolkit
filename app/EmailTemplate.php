<?php

namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $table = 'email_templates';
	protected $fillable = [	'title','slug', 'type', 'subject', 'content' , 'from_email','from_name','template_status' ];
	 
}
