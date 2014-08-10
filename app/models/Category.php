<?php

class Category extends BaseModel {

	protected $table = 'categories';
	protected $fillable = ['users_id','title','desc','status','updated_at'];

	public function getId()
	{
		return $this->id;
	}

}