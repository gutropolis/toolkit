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
 
 
Route::get('/myaccount', 'Frontend\User\UserController@index');

//HeatMap Module Start Here //
Route::get('/heatmap/domain', 'Frontend\HeatMap\DomainController@index');


 
Route::get('/', 'Frontend\PlanController@index');
Route::get('/plan/{slug?}', 'Frontend\PlanController@showpricepkg')->name('plan'); ; 

//Get Payment Gateway Button Here
Route::get('/payment-type/{slug?}/{paymethod?}/{recur?}', 'Frontend\Payment\PaymentController@index')->name('plan.gateway'); 
  
//Paypal Payment
Route::post('/paynow/paypal/{slug?}', 'Frontend\Payment\PaypalController@makePayment')->name('plan.paynow.paypal');   //Make Payment by paypal  
Route::get('payment/paypal/status/{slug?}', 'Frontend\Payment\PaypalController@getPaypalStatus');// route for check status of the payment

//Stripe Payment 
  
Route::post('/paynow/stripe/{slug?}', 'Frontend\Payment\StripeController@makePayment')->name('plan.paynow.stripe');   //Make Payment by paypal  
Route::get('payment/testing', 'Frontend\Payment\StripeController@testing');// route for check status of the payment

//Payment Status 
Route::get('/payment/status/{slug?}', 'Frontend\Payment\PaymentController@paymentStatus')->name('payment.status'); 

 

/*
|--------------------------------------------------------------------------
| include Customer routes(Non Login)
|-------------------------------------------------------------------------- 
*/
require 'web_customer.php';
 
Auth::routes();

/*
|--------------------------------------------------------------------------
| include User routes(Login)
|-------------------------------------------------------------------------- 
*/
require 'web_user.php';
 


/*
|--------------------------------------------------------------------------
| include Admin routes
|--------------------------------------------------------------------------
|
*/
require 'web_admin.php';
  