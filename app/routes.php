<?php

Route::get('/', ['as' => 'home', 'before' => 'auth', function()
{
	return View::make('hello');
}]);

Route::get('login', ['uses' => 'SessionsController@create', 'as' => 'create']);
Route::get('logout', ['uses' => 'SessionsController@destroy'])->before('auth');
// Route::get('success', ['uses' => 'SessionController@success', 'as' => 'session.success']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);