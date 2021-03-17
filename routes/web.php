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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profiles', 'ProfilesController@index')->name('index');

Route::get('proflies/{user:name}', 'ProfilesController@show')->name('show.user');

Route::get('profiles/{user:name}/edit', 'ProfilesController@edit')->name('edit.user');

Route::get('profiles/create', 'ProfilesController@create')->name('create.user');

Route::post('profiles', 'ProfilesController@store')->name('store.user');

Route::patch('/profiles/{user:username}', 'ProfilesController@update')->name('update.user');
