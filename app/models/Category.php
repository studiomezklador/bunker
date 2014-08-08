<?php

class Category extends \Eloquent {

	protected $table = 'categories';
	protected $fillable = ['users_id','title','desc','status','updated_at'];
	
	public function getId()
	{
		return $this->id;
	}
	
}