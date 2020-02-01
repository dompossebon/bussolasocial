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

Route::get('/', 'EventController@listEvents');
Route::get('/home', 'EventController@listEvents')->name('home');
Route::post('/logout', 'EventController@logout')->name('logout');

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

