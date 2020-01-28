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


Route::get('/dash', 'DashboardController@index')->name('dash');
Route::post('/logout', 'DashboardController@logout')->name('logout');
Route::get('/addClass', 'ClassController@addClass')->name('addClass')->middleware('auth');
Route::get('/addEventClass', 'ClassController@addEventClass')->name('addEventClass')->middleware('auth');
Route::get('/viewClasses', 'ClassController@viewClasses')->name('viewClasses');


