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

/**
 * Rotas para Novas Agendas
 */
Route::get('/fone', 'TelefoneController@getIndex')->name('fone');



Route::get('/', 'EventController@listEvents');
Route::post('/logout', 'EventController@logout')->name('logout');
Route::get('/load-events',  'EventController@loadEvents')->name('routeLoadEvents');
Route::get('/event-list', 'EventController@listEvents')->name('routeEventList');
Route::post('/event-store', 'EventController@store')->name('routeEventStore');
Route::put('/event-update', 'EventController@update')->name('routeEventUpdate');
Route::delete('/event-destroy', 'EventController@destroy')->name('routeEventDelete');

/**
 * Rotas para Novas Turmas
 */
Route::get('/viewcalendar', 'FastEventController@viewcalendar')->name('viewcalendar')->middleware('auth');
Route::get('/home', 'FastEventController@viewcalendar')->name('home');
Route::post('/fast-event-store', 'FastEventController@store')->name('routeFastEventStore');
Route::put('/fast-event-update', 'FastEventController@update')->name('routeFastEventUpdate');
Route::delete('/fast-event-destroy', 'FastEventController@destroy')->name('routeFastEventDelete');

