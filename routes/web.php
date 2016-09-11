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
Route::get('addContact','adminAddContact@addAContactGet');
Route::post('addContact','adminAddContact@addAContact');
Route::get('/api/create', 'VolunteerController@makeUser');
Route::get('/contacts','HomeController@getListOfContacts');

Route::post('/api/create', 'VolunteerController@makeUser');
Route::post('/api/login', 'VolunteerController@loginUser');
Route::post('/api/call', 'CallController@makeCall');
Route::get('/api/calls', 'CallController@getCalls');
Route::get('/api/toCall', 'CallController@toCall');
Route::get('/call/{id}', 'CallController@getCall');
Route::get('/api/average/{id}', 'CallController@getAverageCallLengthForUser');
Route::get('/calls', 'CallController@index');

Route::get('/api/leaderboard', 'CallController@getLeaderboard');
Route::get('/lastCall', 'LastCall@getLastCall');
