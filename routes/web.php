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

Route::get('/home', 'EventController@listEvents')->name('home');
//Route::get('/', 'GroupController@index')->name('dash');
//Route::get('/dash', 'EventController@listEvents')->name('dash');
Route::post('/logout', 'EventController@logout')->name('logout');

//Route::get('/addGroup', 'GroupController@addGroup')->name('addGroup')->middleware('auth');
//Route::get('/addEventGroup', 'GroupController@addEventGroup')->name('addEventGroup')->middleware('auth');
//Route::post('/store', 'GroupController@store')->name('store');


Route::get('/viewcalendar', 'FastEventController@viewcalendar')->name('viewcalendar')->middleware('auth');
Route::get('/load-events',  'EventController@loadEvents')->name('routeLoadEvents');

/**
 * Rotas para Novas Agendas
 */
Route::get('/event-list', 'EventController@listEvents')->name('routeEventList');
Route::post('/event-store', 'EventController@store')->name('routeEventStore');
Route::put('/event-update', 'EventController@update')->name('routeEventUpdate');
Route::delete('/event-destroy', 'EventController@destroy')->name('routeEventDelete');

/**
 * Rotas para Novas Turmas
 */
Route::post('/fast-event-store', 'FastEventController@store')->name('routeFastEventStore');
Route::put('/fast-event-update', 'FastEventController@update')->name('routeFastEventUpdate');
Route::delete('/fast-event-destroy', 'FastEventController@destroy')->name('routeFastEventDelete');

