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

Route::get('/', 'UserController@book');

Route::get('/new', 'UserController@newPage');

Route::post('/new', 'UserController@newContact');

Route::get('/edit/{id}', 'UserController@editPage');

Route::post('/edit/{id}', 'UserController@editContact');
