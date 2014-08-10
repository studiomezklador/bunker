<?php

class Post extends BaseModel {

	protected $table = 'posts';
	protected $fillable = ['users_id','categories_id','title','slug','content','publish','updated_at'];

}