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
Route::get('/', 'TasksController@index');
Route::get('/tasks', 'TasksController@index');
Route::get('/create', 'TasksController@create');
Route::get('/tasks/{task}', 'TasksController@show');


Route::post('/tasks', 'TasksController@store');
Route::post('/tasks/{task}/comments', 'CommentsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
