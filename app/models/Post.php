<?php

class Post extends \Eloquent {
	protected $fillable = ['users_id','categories_id','title','slug','content','updated_at'];
}