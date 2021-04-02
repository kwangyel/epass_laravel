


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

Route::get('/' , function(){

    return ['message' => 'Welcome to UN BHUTAN e-Pass API'];
});

Route::get('/protected' , function(){
    return ['message' => 'this is a protected message'];
})->middleware('auth:api');

Route::post('/create','AuthController@create');
Route::post('/login','AuthController@login');

Route::resource('/agency' , 'AgencyController');

Route::resource('/car' , 'CarController');

Route::resource('/staff' , 'StaffController');

Route::resource('/gpass' , 'GatepassController');

Route::resource('/gitem' , 'GateitemController');

Route::resource('/visitor' , 'VisitorController');

Route::get('/visitorbydate' , 'VisitorController@showbydate');

Route::get('/checkstaffs' , 'CheckController@showstaff');

Route::get('/checkvisitors' , 'CheckController@showvisitor');

Route::get('/checkcars' , 'CheckController@showcar');

Route::resource('/check' , 'CheckController');

Route::get('/checkcount' , 'CheckController@checkcount'); /// todays count

Route::get('/agencycount' , 'AgencyController@agencycount');

Route::get('/staffcount' , 'StaffController@staffcount');

Route::get('/visitorcount' , 'VisitorController@visitorcount');

Route::get('/getdriver' , 'StaffController@showbyrole');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});