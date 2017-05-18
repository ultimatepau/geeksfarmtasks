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
	Route::get('/signup','UsersController@signup')->name('signup');
	Route::post('/signup','UsersController@store')->name('signup.store');

	Route::get('login','UsersController@login')->name('login');
	Route::post('login','UsersController@check')->name('login.check');
	Route::get('logout','UsersController@logout')->name('logout');

	Route::get('/', function() {
		$data['result'] = \App\Article::paginate(10);
        return view('home')->with($data);
	});
	Route::get('detail/{id}', 'ArticleController@show');
	Route::get('export/{id}', 'ArticleController@download');
	Route::resource('Article','ArticleController');
	Route::resource('Comments','CommentsController');

	Route::post('Article/uploadexcel', 'ArticleController@upload')->name('Article.uploadexcel');
	
