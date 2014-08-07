<?php

class Post extends \Eloquent {

	protected $table = 'posts';
	protected $fillable = ['users_id','categories_id','title','slug','content','updated_at'];
	
}