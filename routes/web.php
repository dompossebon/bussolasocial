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

Route::get('/rules-system', function () {
    return view('rulesbasic.ruleSystem');
})->name('ruleSystem');
Route::get('/', function () {
    return view('rulesbasic.ruleSystem');
});


/**
 * Rotas para Novas Agendas
 */

Route::get('/view-registration-form/{id}', 'EventController@viewRegistrationForm')->name('viewRegistrationForm');
Route::post('/logout', 'EventController@logout')->name('logout');
Route::get('/load-events', 'EventController@loadEvents')->name('routeLoadEvents');
Route::get('/event-list', 'EventController@listEvents')->name('routeEventList');



/**
 * Rotas para Novas Turmas
 */
Route::get('/home', 'FastEventController@viewCalendar')->name('home');


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::post('/event-store', 'EventController@store')->name('routeEventStore');
    Route::put('/event-update', 'EventController@update')->name('routeEventUpdate');
    Route::delete('/event-destroy', 'EventController@destroy')->name('routeEventDelete');


    Route::get('/view-calendar', 'FastEventController@viewCalendar')->name('viewCalendar');
    Route::post('/fast-event-store', 'FastEventController@store')->name('routeFastEventStore');
    Route::put('/fast-event-update', 'FastEventController@update')->name('routeFastEventUpdate');
    Route::delete('/fast-event-destroy', 'FastEventController@destroy')->name('routeFastEventDelete');
});

