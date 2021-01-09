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

Route::get('/', function () {
    return view('welcome');
});

Route::get('todo', 'TodoController@index')->middleware('auth');
Route::get('todo/create', 'TodoController@create')->middleware('auth');
Route::post('todo/create', 'TodoController@store')->middleware('auth');
Route::get('todo/edit', 'TodoController@edit')->middleware('auth');
Route::post('todo/edit', 'TodoController@update')->middleware('auth');
Route::get('todo/del', 'TodoController@delete')->middleware('auth');
Route::post('todo/del', 'TodoController@remove')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
