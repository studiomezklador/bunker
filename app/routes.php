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

Route::get('/', ['uses' => 'SessionController@create', 'as' => 'session.create']);

Route::post('login', ['uses' => 'SessionController@store', 'as' => 'session.store']);

Route::get('logout', ['uses' => 'SessionController@destroy', 'as' => 'session.destroy']);

