<?php

use App\Doctor;
use App\ServiceType;
use App\Location;

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

Route::get('/serviceRegister', function () {
	$location = Location::lists('Location_name');
	$type = ServiceType::lists('typename');
	
	return view('serviceform',array('location'=> $location, 'type'=>$type));
});

Route::post('/serviceRegister', 'DummyController@serviceCreate');

Route::delete('/admin/servicedelete={id}', 'HomeController@serviceDelete');

Route::delete('/admin/serviceverify={id}', 'HomeController@serviceVerify');
