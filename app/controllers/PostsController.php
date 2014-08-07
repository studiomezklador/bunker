<?php 

class PostController extends BaseController{
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function index()
	{
		$posts = Posts::get();
		return View::make('posts.index', compact('posts'));
	}
}