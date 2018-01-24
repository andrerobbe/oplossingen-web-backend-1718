<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Article;
use \App\User;
use App\Rules\ValidateUrl;


class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

	public function index()
	{
		$articles = Article::all();
		return view('index')->with('articles', $articles);
	}

    public function showForm()
	{
		return view('addArticle');
	}

	public function add(Request $request)
	{
		$request->validate([
            'title' => 'required|string',
            'url' => 'required', 'string', new ValidateUrl
        ]);

        $article 			= new Article;
        $article->title 	= $request->title;
        $article->url 		= $request->url;
        $article->user_id 	= auth()->user()->id;
        $article->posted_by = auth()->user()->name;
        $article->save();

        return redirect('/')->with('success', "Succesfully posted: " . $article->title);
	}

}