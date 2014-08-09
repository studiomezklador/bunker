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

/*
* DASHBOARD : Posts Management System
*/

Route::get('posts', ['as' => 'posts.index', 'uses' => 'PostsController@index'])->before('auth');
Route::get('posts/create', ['as' => 'posts.create', 'uses' => 'PostsController@create'])->before('auth');
Route::get('posts/{id}', ['as' => 'posts.show', 'uses' => 'PostsController@show'])->before('auth');
Route::get('posts/{id}/edit', ['as' => 'posts.edit', 'uses' => 'PostsController@edit'])->before('auth');
Route::post('posts/insert/{user}', ['as' => 'posts.insert', 'uses' => 'PostsController@insert'])->before('auth');
Route::post('posts/{id}/store', ['as' => 'posts.store', 'uses' => 'PostsController@store'])->before('auth');