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

Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/re_edit', 'Re_editController@index')->name('re_edit');
Route::post('/re_edit', 'Re_editController@update')->name('re_edit');
Route::post('/profile', 'ProfileController@store');


Route::get('/all_reseller', 'All_resellerController@index');

