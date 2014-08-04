<?php

class SessionController extends BaseController {
	protected $user;

	public function __contruct(User $user)
	{
		$this->user = $user;
	}

	public function create()
	{
		return View::make('session.create');
	}

	public function store()
	{
		if (Auth::attempt(['name' => Input::get('q1'), 'pwd' => Input::get('q2')])) {
			return Redirect::intended('/');
		}
		return Redirect::route('session.create')->withInput()->withMessage('Bad credentials.');
	}

	public function destroy()
	{
		Auth::logout();
		return View::make('session.destroy');
	}
}