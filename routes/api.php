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

Route::namespace('API')->group(function(){
	Route::prefix('auth')->group(function(){
		Route::post('/register', 'AuthController@register');
		Route::post('/login', 'AuthController@login');

		Route::middleware('auth:api')->group(function(){
			Route::get('/user', 'AuthController@user');
			Route::post('/logout', 'AuthController@logout');

		});		
	});

	Route::prefix('advocate')->namespace('Advocate')->middleware('auth:api')->group(function(){
		Route::apiResource('client', 'ClientController');
		Route::apiResource('casetype', 'CaseTypeController');
		Route::get('case/{id}/payment', 'LawsuitController@payments');
		Route::apiResource('case', 'LawsuitController');
		Route::apiResource('payment', 'PaymentController');
		Route::apiResource('document', 'DocumentController');
		Route::apiResource('hearing', 'HearingController');
		Route::apiResource('profile', 'ProfileController');
		Route::apiResource('appointment', 'AppointmentController');
	});

	Route::prefix('applicant')->namespace('Applicant')->middleware('auth:api')->group(function(){
		Route::apiResource('advocate', 'AdvocateController');
		Route::apiResource('appointment', 'AppointmentController');
	});
});