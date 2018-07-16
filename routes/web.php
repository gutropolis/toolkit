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

	Route::get('logout', 'Auth\LoginController@logout');
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');
 
	Route::group([ 'prefix' => 'admin', 'middleware' => ['auth'],'as' => 'admin.'], function() {
				
				Route::get('/dashboard', 'Admin\AdminHomeController@dashboard');
	
		//----Role-Management For Different Module start Here-----//

			Route::get('role-management/{id}', 'Admin\AdminRoleController@manageRole')->name('role-managment.index');
			Route::post('role-management/update/{id}', 'Admin\AdminRoleController@updatePermissionbyRole')->name('role-managment.update');
				
			Route::get('roles','Admin\AdminRoleController@index')->name('roles.index');
			Route::get('roles/create','Admin\AdminRoleController@create')->name('roles.create');
			Route::get('roles/edit/{id}','Admin\AdminRoleController@edit')->name('roles.edit');
			Route::get('roles/data','Admin\AdminRoleController@data')->name('roles.data');
			Route::get('roles/destroy/{id}','Admin\AdminRoleController@destroy')->name('roles.destroy');
			Route::post('roles/store','Admin\AdminRoleController@store')->name('roles.store');
			Route::post('roles/update/{id}','Admin\AdminRoleController@update')->name('roles.update');

		//--Role Management End Here--//
				
	
		//Permission Module Management Start Here//
			Route::get('permissionmodule','Admin\AdminPermissionModuleController@index')->name('permissionmodule.index');
			Route::get('permissionmodule/create','Admin\AdminPermissionModuleController@create')->name('permissionmodule.create');
			Route::get('permissionmodule/edit/{id}','Admin\AdminPermissionModuleController@edit')->name('permissionmodule.edit');
			Route::post('permissionmodule/store','Admin\AdminPermissionModuleController@store')->name('permissionmodule.store');
			Route::post('permissionmodule/update/{id}','Admin\AdminPermissionModuleController@update')->name('permissionmodule.update');
			Route::get('permissionmodule/destroy/{id}','Admin\AdminPermissionModuleController@destroy')->name('permissionmodule.destroy');
			Route::get('permissionmodule/data', 'Admin\AdminPermissionModuleController@data')->name('permissionmodule.data');
		//PermissionModule End Here//
	
		//Permission Module Start Here//
			Route::get('permission','Admin\AdminPermissionController@index')->name('permission.index');
			Route::get('permission/destroy/{id}','Admin\AdminPermissionController@destroy')->name('permission.destroy');
			Route::get('permission/create','Admin\AdminPermissionController@create')->name('permission.create');
			Route::get('permission/edit/{id}','Admin\AdminPermissionController@edit')->name('permission.edit');
			Route::post('permission/update/{id}','Admin\AdminPermissionController@update')->name('permission.update');
			Route::post('permission/store','Admin\AdminPermissionController@store')->name('permission.store');
			Route::get('permission/{id}/edit','Admin\AdminPermissionController@edit')->name('permission.edit');
			Route::get('permission/data', 'Admin\AdminPermissionController@data')->name('permission.data');
	//Permission Modules End Here//
	
	//Opportunity Start Here//
		Route::resource('opportunity','Admin\AdminOpportunityController');
		Route::get('opportunity/destroy/{id}','Admin\AdminOpportunityController@destroy')->name('opportunity.destroy');
	//Opportunity End Here//
	
	//Work For Plan Type Management Start Here//
		Route::resource('plans','Admin\AdminPlanController');
		Route::get('plans/destroy/{id}','Admin\AdminPlanController@destroy')->name('plans.destroy');
	//Plan Management End Here//
	
	//Work For Packages Management 
		Route::resource('package-feature','Admin\AdminPackageFeaturesController');
		Route::get('package-feature/destroy/{id}','Admin\AdminPackageFeaturesController@destroy')->name('package-feature.destroy');
	//Package Management//
	
	//Plan Management Start Here// Route::resource('plan', 'Admin\AdminPlanPackagesController');
		Route::get('plan/{id}', 'Admin\AdminPlanPackagesController@show');
		Route::get('editPlan/{id}', 'Admin\AdminPlanPackagesController@edit');
		Route::get('update', 'Admin\AdminPlanPackagesController@update');
		Route::post('update', 'Admin\AdminPlanPackagesController@update');
		Route::get('destroy/{id}', 'Admin\AdminPlanPackagesController@destroy')->name('plan.destroy');;
		Route::get('datatable/getdata', 'Admin\AdminPlanPackagesController@data')->name('datatable/getdata');
	//Plan Mangement End Here//
	
	
	
    Route::resource('users','Admin\AdminUserController');
	Route::get('users/data','Admin\AdminUserController@data')->name('users.data');


	Route::resource('plan', 'Admin\AdminPlanPackagesController');
	  
}); 
Route::prefix('admin')->group(function () { 
		Route::get('login', 'Admin\AdminHomeController@index'); 
		Route::get('register', 'Admin\AdminHomeController@register');
		Route::get('dashboard', 'Admin\AdminHomeController@dashboard'); 	
});
  