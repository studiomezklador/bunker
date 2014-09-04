<?php

use mzkd\Helpers\Slug as Slug;

class PostsController extends BaseController{
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function index()
	{
		$posts = Post::get();
		return View::make('posts.index', compact('posts'));
	}

	public function create()
	{
		$admin = Auth::user();
		$categories = Category::lists('title', 'id');
		return View::make('posts.create', compact('admin', 'categories'));
	}

	public function show($id){
		$post = Post::findOrFail($id);
		return View::make('posts.show', compact('post'));
	}

	public function edit($id){
		$post = Post::findOrFail($id);
		$categories = Category::lists('title', 'id');
		return View::make('posts.edit', compact('post', 'categories'));
	}

	public function store($id){

		$input = [
			'title' => Input::get('title'),
			'slug' => Input::get('slug'),
			'user_id' => Input::get('users_id'),
			'content' => Input::get('content'),
			'category' => Input::get('category')
		];

		$title = Input::get('title');

		$post = Post::findOrFail($id);

		$alert = "";

		if ($post->title != $title) {
			$slug = Slug::make($input['title'], 3);
			$input['slug'] = $slug;
			$alert = "<p>Le slug a été modifié selon le titre, sous la forme : $slug</p>";
		}

		$post->update($input);

		return Redirect::route('posts.index')->with(['msg' => "<p class='lead'>L'Article <strong>$title</strong> a été modifié avec succès.</p>".$alert]);
	}

	public function insert($user)
	{
		$title = Input::get('title');

		$post = Post::firstOrCreate([
				'users_id' => $user,
				'categories_id' => Input::get('category'),
				'title' => $title,
				'slug' => Input::get('slug'),
				'content' => Input::get('content')
				]);
		$post->save();

		return Redirect::route('posts.index')->with(['msg' => "<p>L'Article <strong>$title</strong> a été créé avec succès.</p><p>Cependant, il n'a pas été publié (pensez à mettre à jour son statut, merci).</p>"]);
	}

}