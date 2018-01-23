<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddArticleController extends Controller
{
    public function addArticle()
    {
    	return view('addArticle');
    }
}