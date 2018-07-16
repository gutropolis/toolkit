<?php


namespace Gutropolis;


use Illuminate\Database\Eloquent\Model;


class Permisson extends Model

{

    /**

     * The attributes that are mass assignable.

     *	

     * @var array

     */
	  protected $table = 'permissions';

    protected $fillable = [

        'module','name','display_name','order','guard_name', 'description'

    ];

}