<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return $request->user();
});

Route::post('info_parking', 'Api\InfoParkingController@index')->name('app.index');
Route::post('add_log_merge', 'Api\InfoParkingController@addLogMerge')->name('app.addLogMerge');
Route::post('add_log_log_in', 'Api\InfoParkingController@addLogLogIn')->name('app.addLogLogIn');
Route::post('add_parking', 'Api\InfoParkingController@addParking')->name('app.addParking');
Route::post('upload_image', 'Api\InfoParkingController@uploadImage')->name('app.uploadImage');
