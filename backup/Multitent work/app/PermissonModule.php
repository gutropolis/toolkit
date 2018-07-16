<?php


namespace Gutropolis;


use Illuminate\Database\Eloquent\Model;


class PermissonModule extends Model

{

    /**

     * The attributes that are mass assignable.

     *	

     * @var array

     */
	  protected $table = 'permission_module';

    protected $fillable = [

        'title', 'description'

    ];

}