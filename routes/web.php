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

Route::get('/','PagesController@index')->name('dashboard');

Route::resource('/banner', 'BannerController');
Route::resource('/feature', 'FeaturesController');
Route::resource('/workshop', 'Upcoming_WorkshopController');
Route::resource('/faculty','Faculty_MemberController');
Route::resource('/feedback','FeedbackController');
Route::resource('/course','CourseController');
Route::resource('/contact', 'ContactController');
Route::get('/contact/reply/{id}','ContactController@mail_reply')->name('contact.mail_reply');
Route::post('/contact/reply','ContactController@send_email')->name('contact.send_mail');


// Route::get('/', 'PagesController@index');
