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

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::get('team', 'HomeController@team');

Route::get('bugs', 'BugsController@index');

Route::get('profile', 'ProfileController@index');

Route::get('bugs/edit/{id}', 'HomeController@view_edit');

Route::get('bugs/delete/{id}', 'HomeController@delete');

Route::post('report_bug', 'HomeController@store');

Route::post('edit_bug', 'HomeController@edit');

Route::post('edit_profile', 'ProfileController@edit');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
