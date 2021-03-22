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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/profiles', 'ProfilesController@index')->name('index');

Route::get('profiles/create', 'ProfilesController@create')->name('create.user');

Route::get('profiles/{user:name}', 'ProfilesController@show')->name('show.user');

Route::get('profiles/{id}/edit', 'ProfilesController@edit')->name('edit.user');

Route::post('profiles', 'ProfilesController@store')->name('store.user');

Route::patch('/profiles/{id}', 'ProfilesController@update')->name('update.user');
