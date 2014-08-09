<?php

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
		$title = Input::get('title');

		$post = Post::findOrFail($id);
		$post->update(Input::all());

		return Redirect::route('posts.index')->with(['msg' => "L'Article <strong>$title</strong> a été modifié avec succès."]);
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