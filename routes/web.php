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

Route::get('/', 'DynamicFieldController@home');

Route::get('/insert', 'DynamicFieldController@index');
Route::post('dynamic-field/insert', 'DynamicFieldController@insert')->name('dynamic-field.insert');

Route::get('/data', 'DataController@index');
Route::get('/data/search', 'DataController@search');
Route::put('/data/edit', 'DataController@edit');
Route::delete('/data/delete', 'DataController@delete');


