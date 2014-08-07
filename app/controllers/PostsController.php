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
}