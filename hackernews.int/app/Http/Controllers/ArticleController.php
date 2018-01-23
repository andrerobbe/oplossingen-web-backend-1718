<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Article;
use \App\User;


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
		return 'test';
	}

}