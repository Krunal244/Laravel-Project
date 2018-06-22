<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'DashboardController@index');


Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'Auth\RegisterController@confirm'
]);


Route::get('/user', 'UsersController@index')->name('user');
Route::get('/user/data/', 'UsersController@anyData')->name('userdata');
Route::get('/user/add', 'UsersController@createUser');
Route::post('/user/store', 'UsersController@addUser');
Route::get('/user/delete/{id}', 'UsersController@deleteUser')->name('user/delete');
Route::get('/user/edit/{id}', 'UsersController@editUser')->name('user/edit');
Route::post('/user/edit/{id}', 'UsersController@editUser')->name('user/edit');
Route::get('/profile', 'UsersController@showProfile')->name('profile/show');
Route::post('/profile/edit', 'UsersController@updateProfile')->name('profile/update');