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


Route::group(['prefix' => '/','middleware' => 'auth'],function(){
	Route::get('/',[
		'uses' => 'HomeController@index',
		'as'   => 'home'
	]);
	
});

Route::group(['prefix' => 'propuestas','middleware' => 'auth'],function(){
	Route::get('/crear',[
		'uses' => 'PostsController@create',
		'as' => 'post.create'
	]);
	Route::get('/mispropuestas',[
		'uses' => 'PostsController@showMyPosts',
		'as' => 'post.myposts'
	]);
	Route::post('/guardar',[
		'uses' => 'PostsController@store',
		'as' => 'post.store'
	]);
	Route::get('/eliminar/{id}',[
		'uses' => 'PostsController@destroy',
		'as' => 'post.destroy'
	]);
	Route::get('/edit/{id}',[
		'uses' => 'PostsController@edit',
		'as' => 'post.edit'
	]);
	Route::post('/actualizar/{id}',[
		'uses' => 'PostsController@update',
		'as' => 'post.update'
	]);
});

Route::group(['prefix' => 'personas','middleware' => 'auth'],function(){
	Route::get('/',[
		'uses' => 'UsersController@index',
		'as' => 'user.index'
	]);
	Route::get('/editar/{id}/usuario',[
		'uses' => 'UsersController@edit',
		'as' => 'user.edit'
	]);
	Route::put('/actualizar/{id}/usuario',[
		'uses' => 'UsersController@update',
		'as' => 'user.update'
	]);

	Route::get('users/{id}/destroy',[
		'uses' => 'UsersController@destroy',
		'as'   => 'user.destroy',		
	]);
});
Route::auth();

Route::get('/home', 'HomeController@index');
