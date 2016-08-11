<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('pages.index');
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
	
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
	
Route::get('users', [
	'as' => 'users_path',
	'uses' => 'UsersController@index'
	]);

Route::get('user/@{name}',[
		'as' => 'profile_path',
		'uses' => 'UsersController@show'
	]);


Route::get('statuses', [
		'as' => 'statuses_path',
		'uses' => 'StatusController@index'
	]);

Route::post('statuses', [
		'as' => 'statuses_path',
		'uses' => 'StatusController@store'
	]);


Route::post('statuses/{id}/comments', [
		'as' => 'comment_path',
		'uses' => 'CommentsController@store'
	]);

Route::post('statuses/{id}/photos', [
		'as' => 'photo_path',
		'uses' => 'PhotoController@store'
	]);

Route::post('follows',[
		'as' => 'follows_path',
		'uses' => 'FollowsController@store'
	]);

Route::delete('follows/{id}',[
		'as' => 'follow_path',
		'uses' => 'FollowsController@destroy'
	]);

Route::get('phrases', [
		'as' => 'phrases_path',
		'uses' => 'PhrasesController@index'
	]);

Route::post('phrases', [
		'as' => 'phrases_path',
		'uses' => 'PhrasesController@store'
	]);

Route::get('phrase/@{body}',[
		'as' => 'phrase_path',
		'uses' => 'PhrasesController@show'
	]);


Route::post('phrase/{id}/tags', [
		'as' => 'tag_path',
		'uses' => 'TagsController@store'
	]);

Route::post('counts', [
		'as' => 'count_path',
		'uses' => 'CountsController@index'
	]);

Route::post('counts', [
		'as' => 'count_path',
		'uses' => 'CountsController@store'
	]);



















Route::get('register/confirm/{token}', 'Auth\AuthController@confirmEmail');