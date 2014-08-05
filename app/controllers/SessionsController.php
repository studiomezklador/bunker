<?php

class SessionsController extends BaseController {
	protected $user;

	public function __contruct(User $user)
	{
		$this->user = $user;
	}

	public function create()
	{
		return View::make('sessions.create');
	}

	public function store()
	{
		$credentials = Input::all();
		$somebody = $credentials['username'];
		$attempt = Auth::attempt([
					'username' => $somebody,
					'password' => $credentials['password']
				], NULL);
		if ($attempt) return Redirect::home();
		// ELSE
		return Redirect::back()->withInput()->with('msg','Bad credentials.');
	}

	public function destroy()
	{
		Auth::logout();
		return Redirect::home();
	}
}