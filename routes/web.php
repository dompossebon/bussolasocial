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


Auth::routes();

Route::get('/home', 'DashboardController@index')->name('home');


Route::get('/', 'DashboardController@index')->name('dash');
Route::get('/dash', 'DashboardController@index')->name('dash');
Route::post('/logout', 'DashboardController@logout')->name('logout');

Route::get('/addGroup', 'GroupController@addGroup')->name('addGroup')->middleware('auth');
Route::get('/addEventGroup', 'GroupController@addEventGroup')->name('addEventGroup')->middleware('auth');
Route::get('/viewGroup', 'GroupController@index')->name('viewGroup');
Route::post('/store', 'GroupController@store')->name('store');


Route::get('/fullcalendar', 'GroupController@fullcalendar')->name('fullcalendar');
Route::get('/load-events',  'EventController@loadEvents')->name('routeLoadEvents');

Route::put('/event-update', 'EventController@update')->name('routeEventUpdate');

Route::post('/event-store', 'EventController@store')->name('routeEventStore');
