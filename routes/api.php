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

Route::group(['middleware' => ['cors', 'json.response']], function () {


    Route::get('/' , function(){

        return ['message' => 'Welcome to UN BHUTAN e-Pass API'];
    });

    Route::resource('/agency' , 'AgencyController');

    Route::get('/api/staff', 'StaffController@agency');

    Route::resource('/car' , 'CarController');

    Route::resource('/staff' , 'StaffController');

    Route::resource('/visitor' , 'VisitorController');

    Route::get('/visitorbydate' , 'VisitorController@showbydate');

    Route::resource('/check' , 'CheckController');


    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
});