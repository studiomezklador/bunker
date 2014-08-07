<?php
/*
* LOGIN FORM
*/

Route::get('/', ['as' => 'home', 'before' => 'auth', function()
{
	return View::make('hello');
}]);

Route::get('login', ['uses' => 'SessionsController@create', 'as' => 'create']);
Route::get('logout', ['uses' => 'SessionsController@destroy'])->before('auth');
// Route::get('success', ['uses' => 'SessionController@success', 'as' => 'session.success']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

/*
* DASHBOARD : Users Management System
*/

Route::get('users', ['as' => 'users.index', 'uses' => 'UsersController@index'])->before('auth');
Route::get('users/delete/{id}', ['as' => 'users.delete', 'uses' => 'UsersController@destroy'])->before('auth');
Route::get('users/create', ['as' => 'users.create', 'uses' => 'UsersController@create'])->before('auth');
Route::post('users/store', ['as' => 'users.store', 'uses' => 'UsersController@store'])->before('auth');
Route::get('users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UsersController@show'])->before('auth');
Route::post('users/edit/{id}', ['as' => 'users.update', 'uses' => 'UsersController@update'])->before('auth');
// Route::resource('users', 'UsersController');