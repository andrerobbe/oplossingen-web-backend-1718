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

		return back()->with('success', "Succesfully posted your comment!");
	}

	public function edit ($id)
	{
		$article 		= Article::find($id);
		$comment 		= Comment::find($id);

		return view('editComment')->with('comment', $comment->body)->with('article', $article);
	}

	public function update (Request $request, $id)
	{
		$comment 		= Comment::find($id);
		$comment->body 	= $request->comment;
		$comment->save();

		return redirect('comments/' . $comment->article_id)->with('success', 'Succesfully updated your comment!');
	}

	public function delete($id)
	{
		$comment = Comment::find($id);

		return redirect('comments/' . $comment->article_id)->with('delete', 'Delete this comment?')->with('comment-id', $id);
	}

	public function confirmDelete($id)
	{
		$comment 	= Comment::find($id);
		$article_id	= $comment->article_id;
		$comment->delete();

		return redirect('comments/' . $article_id)->with('success', 'Succesfully deleted your comment!');
	}
}