<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Begin Widget Routes

Route::get('api/widget-data', 'ApiController@widgetData');

Route::resource('widget', 'WidgetController');

// End Widget Routes
// Begin Tank Routes

Route::get('api/tank-data', 'ApiController@tankData');

Route::resource('tank', 'TankController');

// End Tank Routes