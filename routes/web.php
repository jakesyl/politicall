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

Route::post('/api/create', 'VolunteerController@makeUser');
Route::post('/api/login', 'VolunteerController@loginUser');
Route::post('/api/call', 'CallController@makeCall');
Route::get('/api/calls', 'CallController@getCalls');
Route::get('/api/toCall', 'CallController@toCall');
Route::get('/call/{id}', 'CallController@getCall');
