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
	
	 public function getAll()

    {

        return static::all();

    }


    public function findUser($id)

    {

        return static::find($id);

    }


    public function deleteUser($id)

    {

        return static::find($id)->delete();

    }
}
