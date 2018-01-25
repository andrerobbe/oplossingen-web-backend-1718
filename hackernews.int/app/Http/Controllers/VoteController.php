<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Comment;
use \App\Article;
use \App\User;
use \App\Vote;


class VoteController extends Controller
{
	public function up($id)
	{
		$user_id	= auth()->user()->id;
		$article 	= Article::find($id);

		$votes 		= Vote::where([['article_id', '=', $id], ['user_id', '=', $user_id]])->first();

		#if user already voted once
		if ( isset( $votes ) ){
			#if users vote is NEUTRAL
			if ( $votes->votes === 0 ){
				$votes->votes = 1;
				$votes->save();
				$article->votes += 1;
				$article->save();

				return back();
			}
			#if user has DOWN voted (add +2 with upvote)
			elseif ( $votes->votes === -1 ) {
				$votes->votes = 1;
				$votes->save();
				$article->votes += 2;
				$article->save();

				return back();
			}
			#if user has ALREADY UP voted (remove vote)
			else{
				$votes->votes = 0;
				$votes->save();
				$article->votes -= 1;
				$article->save();

				return back();
			}
		}
		#if user has NEVER voted on this article
		else{
			$vote = new Vote;

			$vote->article_id	=	$id;
			$vote->user_id		=	$user_id;
			$vote->votes		=	1;
			$vote->save();

			$article->votes += 1;
			$article->save();

			return back();
		}
	}

	public function down($id)
	{
		$user_id	= auth()->user()->id;
		$article 	= Article::find($id);

		$votes 		= Vote::where([['article_id', '=', $id], ['user_id', '=', $user_id]])->first();

		#if user already voted once
		if ( isset( $votes ) ){
			#if users vote is NEUTRAL
			if ( $votes->votes === 0 ){
				$votes->votes = -1;
				$votes->save();

				$article->votes -= 1;
				$article->save();

				return back();
			}
			#if user has UP voted (subtract -2 with downvote)
			elseif ( $votes->votes === 1 ) {
				$votes->votes = -1;
				$votes->save();

				$article->votes -= 2;
				$article->save();

				return back();
			}
			#if user has ALREADY DOWN voted (remove vote)
			else{
				$votes->votes = 0;
				$votes->save();
				$article->votes += 1;
				$article->save();

				return back();
			}
		}
		#if user has NEVER voted on this article
		else{
			$vote = new Vote;

			$vote->article_id	=	$id;
			$vote->user_id		=	$user_id;
			$vote->votes		=	-1;
			$vote->save();

			$article->votes -= 1;
			$article->save();

			return back();
		}

	}
}
