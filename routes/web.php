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

//Admin routes 
Route::namespace('Admin')->prefix('admin')->group(function(){

Route::get('/', 'AdminController@login')->name('login');
Route::get('login', 'AdminController@login')->name('login');
Route::post('post-auth', 'AdminController@postAuth');


Route::get('forgot-auth', 'AdminController@forgotAuth');
Route::post('post-forgot', 'AdminController@postForgot');
Route::any('otp','AdminController@postOtp');
Route::any('forgot-password','AdminController@forgotPassword');

/*Route::get('reset-auth', 'AdminController@resetAuth');
Route::post('post-reset-auth', 'AdminController@postResetAuth');*/

});	


Route::namespace('Admin')->prefix('admin')->as('admin.')->middleware('auth:user')->group(function
	(){

Route::get('dashboard', 'AdminController@dashboard');
Route::any('profile','AdminController@profile');
Route::any('change-password','AdminController@changePassword');

Route::get('logout', 'AdminController@logout');

Route::get('country','LocationController@country');
Route::get('country-list-data','LocationController@countryList');
Route::any('add-country','LocationController@addCountry');
Route::any('edit-country/{id}','LocationController@editCountry');

/******************* State  ****************/
Route::get('state','LocationController@state');
Route::get('state-list-data','LocationController@stateList');
Route::any('add-state','LocationController@addState');
Route::any('edit-state/{id}','LocationController@editState');

/******************* City  ****************/
Route::get('city','LocationController@city');
Route::get('city-list-data','LocationController@cityList');
Route::any('add-city','LocationController@addCity');
Route::any('edit-city/{id}','LocationController@editCity');

###################################################  WEB URLS #####################################################
######## Paying Guest #############
Route::any('pg-list','PGController@pgList');

######## Owner #############
Route::any('owner-list','OwnerController@ownerList');

//status updated active & inactive
Route::get('status_activity/{id}/{Status}/{function}','AdminController@status_activity');

//block_unblock
Route::get('block_unblock/{id}/{Status}/{function}','AdminController@block_unblock');

});

########################################## WEB URLS ############################################################

/*############# My Account Urls ###########################*/
Route::get('/','HomeController@home');
Route::get('home-filter','HomeController@homeFilter');
Route::get('properte-details','HomeController@properteDetails');
Route::get('about-us','HomeController@aboutUs');

//log in for all in one 
Route::any('login','HomeController@login');


######################### OWNER URLS BEFORE LOGIN ###############################
Route::namespace('Web')->prefix('owner')->group(function(){
	/*################# Owner Auth ###################*/
	Route::get('login','OwnerLoginController@login');
	Route::post('post-login','OwnerLoginController@postLogin'); 
	Route::get('signup','OwnerLoginController@signup');
	Route::post('post-signup','OwnerLoginController@postSignup');
	Route::get('forgot-password','OwnerLoginController@forgotPassword');
	Route::post('post-forgot-password','OwnerLoginController@postForgotPassword');
	
	/*################# // Login ###################*/

	######################## Owner URLS AFTER LOGIN #####################
	Route::group(['middleware' => ['ownerLogin']], function () {

		Route::get('zone','OwnerController@dashboard');
		Route::get('dashboard','OwnerController@dashboard');
		Route::get('messages','OwnerController@messages');
		Route::any('my-profile','OwnerController@myProfile');
		Route::any('change-password','OwnerController@changePassword');
		Route::get('invoices','OwnerController@invoices');
		Route::any('submit-property','OwnerController@submitProperty');
		Route::any('my-properties','OwnerController@myProperties'); //list of properties
		Route::any('my-properties/edit/{id}','OwnerController@myPropertiesEdit');
		Route::any('property-details','OwnerController@PropertyDetails');
		Route::get('my-properties/delete','OwnerController@PropertyDelete');

		Route::get('logout','OwnerLoginController@logout');

		///propertey
		// Route::post('submit-property','OwnerController@submitProperty');
		
	/*####################  Oner-Zone #################################*/
	});
});



######################### OWNER URLS BEFORE LOGIN ###############################


Route::namespace('Web')->prefix('pg')->group(function(){
	/*################# Pg Auth ###################*/
	Route::get('login','PgLoginController@login');
	Route::post('post-login','PgLoginController@postLogin'); 
	Route::get('signup','PgLoginController@signup');
	Route::post('post-signup','PgLoginController@postSignup');
	Route::get('forgot-password','PgLoginController@forgotPassword');
	Route::post('post-forgot-password','PgLoginController@postForgotPassword');
/*################# // PG After the login  ###################*/
	Route::group(['middleware'=>['pgLogin']],function(){
		Route::get('dashboard','PgController@dashboard');
		Route::get('messages','PgController@messages');
		Route::get('my-profile','PgController@myProfile');
		Route::get('logout','PgLoginController@logout');
	});

});

/*###################### Global Urls #######################*/
Route::get('get-states','admin\LocationController@getStates');
Route::get('get-city','admin\LocationController@getCity');


