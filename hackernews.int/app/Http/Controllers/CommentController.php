<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Article;
use \App\Comment;
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

	
	public function add(Request $request)
	{
		$request->validate([
		'body' => 'required|string'
		]);

		$comment 				= new Comment;
		$comment->article_id    = $request->article_id;
		$comment->user_id       = auth()->user()->id; 
		$comment->body          = $request->body;
		$comment->save();

		return back()->with('success', "Succesfully posted");
	}
}