<?php
// Mobule: AUTH
Route::group(['as' => 'auth.'], function () {
   
   	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::get('logout', 'Auth\LoginController@logout');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
	
	// Change Password Routes...
	Route::get('change/password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('change.password');;
    Route::post('change/password',  'Auth\ForgotPasswordController@sendResetLinkEmail')->name('change.password');;
	
	// Password Reset Routes..
	Route::get('password/email',  'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.forgot');
	Route::post('password/email',  'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.send');
	Route::get('password/reset/{token?}',  'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/email',  'Auth\ResetPasswordController@reset')->name('password.reset'); 
			 
    	
	//facebook
	Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
	Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
	//twitter
	Route::get('login/twitter', 'Auth\TwitterController@redirectToProvider');
	Route::get('login/twitter/callback', 'Auth\TwitterController@handleProviderCallback');
	//github
	Route::get('login/github', 'Auth\GithubController@redirectToProvider');
	Route::get('login/github/callback', 'Auth\GithubController@handleProviderCallback');
	//linkedin
	Route::get('login/linkedin', 'Auth\LinkedinController@redirectToProvider');
	Route::get('login/linkedin/callback', 'Auth\LinkedinController@handleProviderCallback');
	//google
	Route::get('login/google', 'Auth\GoogleController@redirectToProvider');
	Route::get('login/google/callback', 'Auth\GoogleController@handleProviderCallback');
	
	
});
 


?>