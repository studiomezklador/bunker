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
		$post = Post::findOrFail($id);
		$title = Input::get('title');
		$post->update(Input::all());
		return Redirect::route('posts.index')->with(['msg' => "L'Article <strong>$title</strong> a été modifié avec succès."]);
	}

}