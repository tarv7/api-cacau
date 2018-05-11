<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(array('prefix' => 'api'), function(){
    Route::get('/', function(){
        return response()->json(['message' => 'Jobs API', 'status' => 'Connected']);
    });

    Route::resource('jobs', 'JobsController');
    Route::resource('companies', 'CompaniesController');
});

Route::get('/', function(){
    return redirect('api');
});