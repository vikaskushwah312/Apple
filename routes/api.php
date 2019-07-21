<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	// Route::post('payment/status', 'EventController@paymentCallback');
    return $request->user();
});

 
// Route::post('payment/status', 'OrderController@paymentCallback');
Route::post('payment/status', 'EventController@paymentCallback');
