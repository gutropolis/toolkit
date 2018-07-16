<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
 
 
 
Route::group([ 'prefix' => 'admin', 'middleware' => ['auth'],'as' => 'admin.'], function() {
	Route::get('/dashboard', 'Admin\AdminHomeController@dashboard');
    Route::resource('roles','Admin\AdminRoleController');

    Route::resource('users','Admin\AdminUserController');

    Route::resource('products','Admin\AdminProductController');
	
	Route::resource('permissionmodule','Admin\AdminPermissionModuleController');
	
	Route::resource('permission','Admin\AdminPermissionController');
	
	  Route::resource('plans','Admin\AdminPlanController');
	   Route::resource('package-feature','Admin\AdminPackageFeaturesController');
	   Route::resource('plan', 'Admin\AdminPlanPackagesController');
	Route::post('permission', 'Admin\AdminPermissionController@index')->name('permission.showdata');
	
	  
});

Route::prefix('admin')->group(function () {
	
		Route::get('login', 'Admin\AdminHomeController@index'); 
		Route::get('register', 'Admin\AdminHomeController@register');
		Route::get('dashboard', 'Admin\AdminHomeController@dashboard');
		
//Work For Role Management 
		Route::resource('/role','RoleController');
		Route::get('role/index', 'RoleController@index'); 
		Route::get('role/create', 'RoleController@create'); 
		Route::post('role/store', 'RoleController@store'); 
		Route::get('role/show/{id}', 'RoleController@show'); 
		Route::post('role/update', 'RoleController@update'); 


		
});
  