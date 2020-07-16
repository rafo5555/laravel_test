<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'TestController@index')->name('index');
Route::get('/create', 'TestController@create')->name('create');
Route::post('/create', 'TestController@store')->name('store');
Route::get('/{id}/edit', 'TestController@edit')->name('edit');
Route::put('/{id}', 'TestController@update')->name('update');
Route::delete('/{id}', 'TestController@destroy')->name('destroy');

