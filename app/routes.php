<?php

Route::get('/', ['as' => 'home', 'before' => 'auth', function()
{
	return View::make('hello');
}]);

Route::get('login', ['uses' => 'SessionController@create', 'as' => 'create']);
Route::get('logout', ['uses' => 'SessionController@destroy'])->before('auth');
// Route::get('success', ['uses' => 'SessionController@success', 'as' => 'session.success']);
Route::resource('session', 'SessionController', ['only' => ['create', 'store', 'destroy']]);