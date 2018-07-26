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

 

Route::get('/', 'Frontend\PricePackageController@index');
Route::get('/price-package/{slug?}', 'Frontend\PricePackageController@showpricepkg')->name('price-package'); ; 
Route::post('/payments/paynow/{slug}', 'Frontend\PricePackageController@makePayment')->name('payments.paynow'); 

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
	 
		Route::get('plans', 'Admin\AdminPlanController@index')->name('plans.index');
		Route::post('plans/store','Admin\AdminPlanController@store')->name('plans.store'); 
		Route::get('plans/edit/{id}', 'Admin\AdminPlanController@edit');
		Route::get('plans/update/', 'Admin\AdminPlanController@update');
		Route::post('plans/update/{id}', 'Admin\AdminPlanController@update')->name('plans.update');; 
		Route::get('plans/getdata', 'Admin\AdminPlanController@data')->name('plans.getdata'); 
		Route::post('plans/destroy/{id}','Admin\AdminPlanController@destroy')->name('plans.destroy');
		 
	
	
	// PlanPackages
			Route::get('planpackage/data','Admin\AdminPlanPackageController@getdata')->name('planpackage.data');
			Route::get('planpackage/show/{id}', 'Admin\AdminPlanPackageController@show'); 
			Route::post('planpackage/update/{id}', 'Admin\AdminPlanPackageController@update')->name('planpackage.update'); 
			Route::post('planpackage/destroy/{id}','Admin\AdminPlanPackageController@destroy')->name('planpackage.destroy');
			Route::resource('planpackage','Admin\AdminPlanPackageController');
	

	
	//Work For Packages Management 
		Route::resource('package-feature','Admin\AdminPackageFeaturesController');
		Route::get('package-feature/destroy/{id}','Admin\AdminPackageFeaturesController@destroy')->name('package-feature.destroy');
	 
	
	 
	 
	
    Route::resource('users','Admin\AdminUserController');
	Route::get('users/data','Admin\AdminUserController@data')->name('users.data');

     //Work on website Setting
		Route::resource('settings','Admin\AdminSettingsController');
		Route::get('settings/store','Admin\AdminSettingsController@store')->name('settings.store');
		Route::post('settings/store','Admin\AdminSettingsController@store')->name('settings.store');
		Route::post('settings/csettingstore','Admin\AdminSettingsController@csettingstore')->name('settings.csettingstore');
		Route::post('settings/outserverstore','Admin\AdminSettingsController@outserverstore')->name('settings.outserverstore');

	 
//Work on Lead module start here
		Route::get('lead','Admin\AdminLeadController@index')->name('lead.index');
		Route::get('lead/data','Admin\AdminLeadController@getdata')->name('lead.data');
		Route::get('lead/create','Admin\AdminLeadController@create')->name('lead.create');
		Route::get('lead/store','Admin\AdminLeadController@store')->name('lead.store');
		Route::post('lead/store','Admin\AdminLeadController@store')->name('lead.store');
		Route::get('lead/edit/{id}','Admin\AdminLeadController@edit')->name('lead.edit');
		Route::post('lead/edit/{id}','Admin\AdminLeadController@edit')->name('lead.edit');
		Route::post('lead/show/{id}','Admin\AdminLeadController@show')->name('lead.show');
		Route::get('lead/show/{id}','Admin\AdminLeadController@show')->name('lead.show');
		Route::post('lead/update/{id}', 'Admin\AdminLeadController@update')->name('lead.update'); 
		Route::post('lead/destroy/{id}','Admin\AdminLeadController@destroy')->name('lead.destroy');
		// checkValidation
		Route::get('checkvalidation','Admin\AdminLeadController@checkValidation');
		Route::post('checkvalidation','Admin\AdminLeadController@checkValidation');

//Tenant start here tenants/data

		Route::get('tenant','Admin\AdminTenantController@index')->name('tenant.index');
		Route::get('tenant/data','Admin\AdminTenantController@getdata')->name('tenant.data');
		Route::post('tenant/store','Admin\AdminTenantController@store')->name('tenant.store');
		Route::get('tenant/show/{id}', 'Admin\AdminTenantController@show'); 
		Route::post('tenant/update/{id}', 'Admin\AdminTenantController@update')->name('tenant.update'); 
		Route::post('tenant/destroy/{id}','Admin\AdminTenantController@destroy')->name('tenant.destroy');
		Route::post('checkvalidation','Admin\AdminTenantController@checkValidation');



 // Email Template
      Route::get('emailtemplate/data','Admin\AdminEmailTemplateController@getdata')->name('emailtemplate.data'); 
      Route::get('emailtemplate/show/{id}', 'Admin\AdminEmailTemplateController@show');
      Route::post('emailtemplate/update/{id}', 'Admin\AdminEmailTemplateController@organizationsetting')->name('emailtemplate.update');; 
      Route::post('emailtemplate/destroy/{id}','Admin\AdminEmailTemplateController@destroy')->name('emailtemplate.destroy');
     Route::resource('emailtemplate','Admin\AdminEmailTemplateController');

	  
}); 
Route::prefix('admin')->group(function () { 
		Route::get('login', 'Admin\AdminHomeController@index'); 
		Route::get('register', 'Admin\AdminHomeController@register');
		Route::get('dashboard', 'Admin\AdminHomeController@dashboard'); 	
});
  