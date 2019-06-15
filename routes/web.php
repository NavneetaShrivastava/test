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
Route::post('/re_edit/update/{id}', 'Re_editController@update')->name('re_update');



Route::get('/all_reseller', 'All_resellerController@index')->name('all_reseller');

Route::get('/customers', 'CustomersController@index')->name('customers');
Route::post('/profile/update', 'ProfileController@store')->name('profile_add');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){
    Route::resource('buildings','Admin\BuildingsController');
});









