<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Article;
use App\User;


class Vote extends Model
{
	public $table = "votes";
	public function article ()
	{
		return $this->belongsTo(Article::class);
	}
	
	public function user ()
	{
		return $this->belongsTo(User::class);
	}
}