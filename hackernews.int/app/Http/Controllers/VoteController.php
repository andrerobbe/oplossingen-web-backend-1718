<?php

namespace App\Http\Controllers;

class VoteController extends Controller
{
	public function up()
	{
		return view('index');
	}

	public function down() {
		return view('index');
	}
}
