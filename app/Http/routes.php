<?php

use App\Doctor;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::post('/dummy', 'DummyController@dummy');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin', 'HomeController@admin');

Route::delete('/admin/delete={id}', 'HomeController@adminDelete');

Route::delete('/admin/verify={id}', 'HomeController@adminVerify');
