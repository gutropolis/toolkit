<?php 
Route::group([ 'prefix' => 'admin', 'middleware' => ['auth'],'as' => 'admin.'], function() {
								
						Route::get('/', 'Admin\AdminHomeController@dashboard');
						// users
						Route::resource('users','Admin\AdminUserController');
						Route::get('users/data','Admin\AdminUserController@data')->name('users.data');
					
						//----Role-Management For Different Module start Here-----// 
						Route::get('role-management/{id}', 'Admin\AdminRoleController@manageRole')->name('role-managment.index');
						Route::post('role-management/update/{id}', 'Admin\AdminRoleController@updatePermissionbyRole')->name('role-managment.update');
						
						 Route::group(['prefix' => 'roles'], function () {
								Route::get('/','Admin\AdminRoleController@index')->name('roles.index');
								Route::get('create','Admin\AdminRoleController@create')->name('roles.create');
								Route::get('edit/{id}','Admin\AdminRoleController@edit')->name('roles.edit');
								Route::get('data','Admin\AdminRoleController@data')->name('roles.data');
								Route::get('destroy/{id}','Admin\AdminRoleController@destroy')->name('roles.destroy');
								Route::post('store','Admin\AdminRoleController@store')->name('roles.store');
								Route::post('update/{id}','Admin\AdminRoleController@update')->name('roles.update');
						 }); 
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
						Route::group(['prefix' => 'permission'], function () {
								Route::get('/','Admin\AdminPermissionController@index')->name('permission.index');
								Route::get('destroy/{id}','Admin\AdminPermissionController@destroy')->name('permission.destroy');
								Route::get('create','Admin\AdminPermissionController@create')->name('permission.create');
								Route::get('edit/{id}','Admin\AdminPermissionController@edit')->name('permission.edit');
								Route::post('update/{id}','Admin\AdminPermissionController@update')->name('permission.update');
								Route::post('store','Admin\AdminPermissionController@store')->name('permission.store');
								Route::get('{id}/edit','Admin\AdminPermissionController@edit')->name('permission.edit');
								Route::get('data', 'Admin\AdminPermissionController@data')->name('permission.data');
					    }); 
						
					//Opportunity Start Here//
						Route::resource('opportunity','Admin\AdminOpportunityController');
						Route::get('opportunity/destroy/{id}','Admin\AdminOpportunityController@destroy')->name('opportunity.destroy');
					//Opportunity End Here//
					
	 
					    
					//Permission Module Start Here//
					Route::group(['prefix' => 'plans'], function () {
							Route::get('/', 'Admin\AdminPlanController@index')->name('plans.index');
							Route::post('store','Admin\AdminPlanController@store')->name('plans.store'); 
							Route::get('edit/{id}', 'Admin\AdminPlanController@edit');
							Route::get('update/', 'Admin\AdminPlanController@update');
							Route::post('update/{id}', 'Admin\AdminPlanController@update')->name('plans.update');; 
							Route::get('getdata', 'Admin\AdminPlanController@data')->name('plans.getdata'); 
							Route::post('destroy/{id}','Admin\AdminPlanController@destroy')->name('plans.destroy');
					}); 
					// PlanPackages
					Route::group(['prefix' => 'planpackage'], function () {
						     Route::get('/', 'Admin\AdminPlanPackageController@index')->name('planpackage.index');
							Route::get('data','Admin\AdminPlanPackageController@getdata')->name('planpackage.data');
							Route::get('show/{id}', 'Admin\AdminPlanPackageController@show')->name('planpackage.show');
							Route::get('fetchpkg/{id}', 'Admin\AdminPlanPackageController@getPkgInfoJson');
							Route::get('gatewaypkg/{plan?}', 'Admin\AdminPlanPackageController@getGatewayPkgJson');
							Route::post('store', 'Admin\AdminPlanPackageController@store')->name('planpackage.store'); 
							Route::post('update/{id}', 'Admin\AdminPlanPackageController@update')->name('planpackage.update'); 
							Route::post('destroy/{id}','Admin\AdminPlanPackageController@destroy')->name('planpackage.destroy');
							Route::post('gateway/update/{id}', 'Admin\AdminPlanPackageController@updateGatewayPkg')->name('planpackage.update.paymentgateway'); 
						 
					});
							

					
					//Work For Packages Management 
						Route::resource('package-feature','Admin\AdminPackageFeaturesController');
						Route::get('package-feature/destroy/{id}','Admin\AdminPackageFeaturesController@destroy')->name('package-feature.destroy');
					 
					 

					 //Work on website Setting
						Route::resource('settings','Admin\AdminSettingsController');
						Route::get('settings/store','Admin\AdminSettingsController@store')->name('settings.store');
						Route::post('settings/store','Admin\AdminSettingsController@store')->name('settings.store');
						Route::post('settings/csettingstore','Admin\AdminSettingsController@csettingstore')->name('settings.csettingstore');
						Route::post('settings/outserverstore','Admin\AdminSettingsController@outserverstore')->name('settings.outserverstore');

					 
				//Work on Lead module start here
					Route::group(['prefix' => 'lead'], function () {
						Route::get('/','Admin\AdminLeadController@index')->name('lead.index');
						Route::get('data','Admin\AdminLeadController@getdata')->name('lead.data');
						Route::get('create','Admin\AdminLeadController@create')->name('lead.create');
						Route::get('store','Admin\AdminLeadController@store')->name('lead.store');
						Route::post('store','Admin\AdminLeadController@store')->name('lead.store');
						Route::get('edit/{id}','Admin\AdminLeadController@edit')->name('lead.edit');
						Route::post('edit/{id}','Admin\AdminLeadController@edit')->name('lead.edit');
						Route::post('show/{id}','Admin\AdminLeadController@show')->name('lead.show');
						Route::get('show/{id}','Admin\AdminLeadController@show')->name('lead.show');
						Route::post('update/{id}', 'Admin\AdminLeadController@update')->name('lead.update'); 
						Route::post('destroy/{id}','Admin\AdminLeadController@destroy')->name('lead.destroy');
						// checkValidation
						Route::get('checkvalidation','Admin\AdminLeadController@checkValidation');
						Route::post('checkvalidation','Admin\AdminLeadController@checkValidation');
					
					});
						

					//Tenant start here tenants/data 
					Route::group(['prefix' => 'tenant'], function () {
						Route::get('/','Admin\AdminTenantController@index')->name('tenant.index');
						Route::get('data','Admin\AdminTenantController@getdata')->name('tenant.data');
						Route::post('store','Admin\AdminTenantController@store')->name('tenant.store');
						Route::get('show/{id}', 'Admin\AdminTenantController@show'); 
						Route::post('update/{id}', 'Admin\AdminTenantController@update')->name('tenant.update'); 
						Route::post('tenant/destroy/{id}','Admin\AdminTenantController@destroy')->name('tenant.destroy');
						Route::post('checkvalidation','Admin\AdminTenantController@checkValidation');
					
					});
							
						
                  // Email Template
					Route::group(['prefix' => 'emailtemplate', 'as' => ''], function () {
						  Route::get('data','Admin\AdminEmailTemplateController@getdata')->name('emailtemplate.data'); 
						  Route::get('show/{id}', 'Admin\AdminEmailTemplateController@show');
						  Route::post('update/{id}', 'Admin\AdminEmailTemplateController@organizationsetting')->name('emailtemplate.update');; 
						  Route::post('destroy/{id}','Admin\AdminEmailTemplateController@destroy')->name('emailtemplate.destroy');
						 
					}); 
				   Route::resource('emailtemplate','Admin\AdminEmailTemplateController'); 
}); 

?>