<?php

use App\Doctor;
use App\ServiceType;
use App\Location;

/*
|--------------------------------------------------------------------------
| Application Routes version 2.1
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

Route::get('/search','PagesController@search');
Route::post('/search_service','PagesController@search');
Route::post('/search_doc','PagesController@search_doctor');

//after raquibbox
Route::post('/appointment/doctor={id}', 'HomeController@appointmentPage');
Route::post('/appointment/make={id}', 'HomeController@appointment');

//own editprofile
Route::get('/editprofile', 'HomeController@editProfilePage');
Route::post('/editprofile', 'HomeController@editProfile');

// Route::get('/passwordchange', 'HomeController@editProfilePage');
// Route::post('/editprofile', 'HomeController@editProfile');

Route::get('/doctorprofile', 'HomeController@doctorEditProfilePage');
Route::post('/addchamber', 'HomeController@addChamber');
Route::post('/addschedule', 'HomeController@addSchedule');

//profile
Route::get('/profile', 'newController@profile');
Route::post('/profile/doctor={id}', 'newController@doctorPage');

//edit schedule
Route::post('/editSchedule', 'HomeController@editSchedule');

//user show appointment
Route::get('/user/appointment/show', 'PagesController@show_user_app');
Route::get('/doc/schedule/show', 'PagesController@show_doc_app');
Route::delete('/user/appointment/delete={id}', 'HomeController@userAppointmentDelete');

Route::delete('doc/schedule/delete={id}', 'HomeController@doctorScheduleDelete');


