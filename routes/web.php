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

Route::get('/', 'GameController@index')->name('game');
Route::get('/name-your-tribe', 'GameController@index')->name('nameYourTribe');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
