<?php

namespace App;


class Comment extends Model
{
    public function task(){

    	return $this->belongsTo(Task::class);

    }

    public function user(){

    	return $this->belongsTo(User::class);

    }
}
