<?php

namespace App;


class Task extends Model
{
	public function comments(){

		return $this->hasMany(Comment::class);
		
	}

	public function addComment($body){

		$this->comments()->create([
			'body' => request('body'),
            'user_id' => auth()->id()
		]);

	}

	public function user(){

    	return $this->belongsTo(User::class);

    }
}
