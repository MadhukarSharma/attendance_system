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

Route::get('hello_world', function(){
	return "route is working";
});

Route::get('/','PagesController@index')->name('dashboard');

Route::resource('/banner', 'BannerController');
Route::resource('/feature', 'FeaturesController');
Route::resource('/workshop', 'Upcoming_WorkshopController');
Route::resource('/faculty','Faculty_MemberController');