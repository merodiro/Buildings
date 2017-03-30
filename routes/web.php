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

// admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', 'AdminController@index');

    Route::get('users/data', 'UserController@anyData');
    Route::resource('users', 'UserController');

    Route::get('settings', 'SettingController@index');
    Route::post('settings', 'SettingController@store');

    Route::get('buildings/data', 'BuildingController@anyData');
    Route::resource('buildings', 'BuildingController');

});

// user routes
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'buildings'], function () {
    Route::get('/', 'BuildingController@index');

    Route::get('rent', 'BuildingController@showRent');

    Route::get('sell', 'BuildingController@showSell');

    Route::get('type/{id}', 'BuildingController@byType');

    Route::get('search', 'BuildingController@search');
});


Route::get('home', 'HomeController@index');
