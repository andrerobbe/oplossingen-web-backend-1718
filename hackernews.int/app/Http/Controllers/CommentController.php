<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Article;
use \App\User;
use App\Rules\ValidateUrl;

class CommentController extends Controller
{
	public function show($id)
	{
		$article = Article::find($id);
		$user = User::find($id);

		return view('comments')->with('article', $article);
	}

	
	public function post()
	{
		return view('comments');
	}
}