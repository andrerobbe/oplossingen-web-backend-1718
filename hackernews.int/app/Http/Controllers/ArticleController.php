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

    public function edit($id)
    {
        $article = Article::find($id);
        return view('addArticle')->with('article', $article);
    }

    public function update(Request $request, $id)
    {
        $article            = Article::find($id);

        $article->title     = $request->title;
        $article->url       = $request->url;
        $article->save();

        return redirect('/')->with('success', 'Succesfully updated your article!');
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

    public function delete($id)
    {
        $article = Article::find($id);

        return redirect($article->id)->with('delete', 'Delete this article?')->with('article-id', $id);
    }

    public function confirmDelete($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/')->with('success', 'Succesfully deleted your article!');
    }
}