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
* LOGIN FORM
*/

Route::get('users', ['as' => 'users.all', 'uses' => 'UsersController@index'])->before('auth');
Route::post('users/delete/{id}', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy'])->before('auth');
Route::get('users/create', ['as' => 'users.create', 'uses' => 'UsersController@create'])->before('auth');
Route::post('users/store', ['as' => 'users.store', 'uses' => 'UsersController@store'])->before('auth');
Route::get('users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UsersController@show'])->before('auth');
Route::post('users/edit/{id}', ['as' => 'users.update', 'uses' => 'UsersController@update'])->before('auth');

// Route::resource('users', 'UsersController');