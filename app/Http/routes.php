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

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::get('posts', 'PostController@index');
Route::get('register', 'RegisterController@index');
//Route::get('sqlquery', 'PostController@sqlquery');
//Route::get('unpublished', 'PostController@unpublished');
get('unpublished', ['as' => 'posts.unpublished', 'uses'=> 'PostController@unpublished']);
get('sqlquery', ['as' => 'posts.sqlquery', 'uses'=> 'PostController@sqlquery']);
get('beer', ['as' => 'posts.beer', 'uses'=> 'PostController@beer']);
post('link', ['as' => 'register.link', 'uses'=> 'RegisterController@link']);
post('pass', ['as' => 'register.pass', 'uses'=> 'RegisterController@pass']);
post('sms', ['as' => 'register.sms', 'uses'=> 'RegisterController@sms']);
post('code', ['as' => 'register.code', 'uses'=> 'RegisterController@code']);

Route::get('memberArea', 'MAController@index');
post('auth', ['as' => 'MA.auth', 'uses'=> 'MAController@auth']);
get('logout', ['as' => 'MA.logout', 'uses'=> 'MAController@logout']);

get('activation', ['as' => 'memberArea.activation', 'uses'=> 'MAController@activation']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// get('post/create',	['as'=>'post.create', 'uses'=>'PostController@create']);
// post('post',	['as'=>'post.store', 'uses'=>'PostController@store']);
// get('post/{post}',	['as'=>'post.show', 'uses'=>'PostController@show']);
// get('post/{post}/edit',	['as'=>'post.edit', 'uses'=>'PostController@edit']);
// post('post/{post}',	['as'=>'post.update', 'uses'=>'PostController@update']);

$router->resource('posts', 'PostController');