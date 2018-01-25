<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/home', 'ArticleController@index')->name('home');
Route::get('/', 	'ArticleController@index');


#Instructions
Route::get('/instructies', 'InstructionController@show');


#Comments
Route::post('comments/add', 				'CommentController@add');
Route::get('/comments/{id}', 				'CommentController@show');
Route::get('comments/{id}/edit', 			'CommentController@edit');
Route::post('comments/{id}/update', 		'CommentController@update');
Route::get('comments/{id}/delete', 			'CommentController@delete');
Route::post('comments/{id}/confirm-delete', 'CommentController@confirmDelete');


#Articles
Route::post('/addArticle',	'ArticleController@add');
Route::get('/article/{id}',	'ArticleController@showForm');


#Votes
Route::put('vote/up/{id}',		'VoteController@up');
Route::put('vote/down/{id}',	'VoteController@down');
