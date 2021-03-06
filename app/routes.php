<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
 */

Route::get('/', 'PagesController@home');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');

Route::get('register','UsersController@register');
Route::post('register', [
    'as' => 'users.store', 
    'uses' => 'UsersController@store'
])->before('csrf');

Route::get('home', [
    'as' => 'users.home',
    'uses' => 'UsersController@home'])->before('auth');

Route::get('editProfile', [
    'as' => 'users.edit',
    'uses' => 'UsersController@editProfile'])->before('auth');
Route::post('updateProfile', [
    'as' => 'users.update',
    'uses' => 'UsersController@updateProfile'])->before(['auth','csrf']);

Route::resource('tours', 'ToursController');

