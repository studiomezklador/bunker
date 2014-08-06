<?php

class UsersController extends \BaseController {

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::get();
		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User;
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));

		$user->save();

		$new_user = Input::get('username');
		Redirect::to('users/')->with(['msg' => "Le Pseudo <strong>$new_user</strong> a été créé."]);
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::where('id', $id)->get()->first();
		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$usename = '';
		$email = $pwd = $usename;

		$user = User::findOrFail($id);

		if (Input::get('password') != '') {
			$user->password = Hash::make(Input::get('password'));
			$pwd = "<li>mot de passe</li>";
		}
		if (Input::get('username') != $user->username) {
			$user->username = Input::get('username');
			$usename = "<li>pseudo</li>";
		}
		if (Input::get('email') != $user->email) {
			$user->email = Input::get('email');
			$email = "<li>email</li>";
		}
		$user->save();
		$infos = ($usename || $email || $pwd) ? "Informations mises à jour : <ol>$usename $email $pwd</ol>" : "Aucune mise à jour.";

		return Redirect::back()->with(['msg' => $infos]);

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		return Redirect::route('users.all');
	}

}