<?php

use Illuminate\Support\Facades\Route;

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




Route::middleware(['checkLogin'])->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/statisticOfDay/{day}', 'HomeController@statisticOfDay')->name('statisticOfDay');
    Route::get('/statisticOfYear/{year}', 'HomeController@statisticOfYear')->name('statisticOfYear');

    Route::get('/config-parking', 'ConfigManagementController@configParking')->name('config.configParking');
    Route::get('/config-fee', 'ConfigManagementController@configFee')->name('config.configFee');
    Route::post('/config-fee', 'ConfigManagementController@setConfigFee')->name('config.setConfigFee');
    Route::post('/config-parking', 'ConfigManagementController@setConfigParking')->name('config.setConfigParking');

    Route::resource('user-management', 'UserManagementController');
    Route::resource('parking-management', 'ParkingManagementController');
    Route::resource('company-management', 'CompanyManagementController');

    Route::get('/statistic-vehicle', 'StatisticController@statisticVehicle')->name('statisticVehicle');
    Route::get('/statistic-login', 'StatisticController@statisticLogin')->name('statisticLogin');
    Route::get('/statistic-revenue', 'StatisticController@statisticRevenue')->name('statisticRevenue');
    Route::get('/search-vehicle', 'StatisticController@searchVehicle')->name('searchVehicle');
    Route::get('/search-vehicle/{id}', 'StatisticController@detailVehicle')->name('detailVehicle');

    Route::get('/info', 'HomeController@info')->name('info');
    Route::get('/profile', 'HomeController@profile')->name('profile');

});

Auth::routes();


