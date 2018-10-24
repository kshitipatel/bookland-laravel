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

use App\Subject;
Route::get('test',function(){
	return App\User::find(1)->profile;
});

Route::get('/', function () {
    return view('welcome')->with('subjects', Subject::all());
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'ProfilesController@about')->name('about');


Route::group(['prefix'=>'user','middleware'=>'auth'],function(){
	
	Route::get('/home',[
		'uses' => 'HomeController@index',
		'as' => 'home'
	]);
	
	Route::get('/books',[
		'uses' => 'BooksController@index',
		'as' => 'books'
	]);

	Route::get('/book/show/{id}',[
		'uses' => 'BooksController@show',
		'as' => 'book.show'
	]);

	Route::get('/book/create',[
		'uses' => 'BooksController@create',
		'as' => 'book.create'
	]);

	Route::post('/book/store',[
		'uses' => 'BooksController@store',
		'as' => 'book.store'
	]);

	Route::get('/book/delete/{id}',[
		'uses' => 'BooksController@destroy',
		'as' => 'book.delete'
	]);

	Route::get('/book/trashed',[
		'uses' => 'BooksController@trashed',
		'as' => 'book.trashed'
	]);

	Route::get('/book/kill/{id}',[
		'uses' => 'BooksController@kill',
		'as' => 'book.kill'
	]);

	Route::get('/book/restore/{id}',[
		'uses' => 'BooksController@restore',
		'as' => 'book.restore'
	]);

	Route::get('/book/edit/{id}',[
		'uses' => 'BooksController@edit',
		'as' => 'book.edit'
	]);

	Route::post('/book/update/{id}',[
		'uses' => 'BooksController@update',
		'as' => 'book.update'
	]);

	Route::get('/book/buy/{id}',[
		'uses' => 'BooksController@buy',
		'as' => 'book.buy'
	]);

	Route::get('/subjects',[
		'uses' => 'SubjectsController@index',
		'as' => 'subjects'
	]);

	Route::get('/subject/create',[
		'uses' => 'SubjectsController@create',
		'as' => 'subject.create'
	]);

	Route::get('/subject/store',[
		'uses' => 'SubjectsController@store',
		'as' => 'subject.store'
	]);

	Route::get('/subject/edit/{id}',[
		'uses' => 'SubjectsController@edit',
		'as' => 'subject.edit'
	]);

	Route::get('/subject/update/{id}',[
		'uses' => 'SubjectsController@update',
		'as' => 'subject.update'
	]);

	Route::get('/subject/delete/{id}',[
		'uses' => 'SubjectsController@destroy',
		'as' => 'subject.delete'
	]);

	Route::get('/users',[
		'uses' => 'UsersController@index',
		'as' => 'users'
	]);

	Route::get('/user/show/{id}',[
		'uses' => 'UsersController@show',
		'as' => 'user.show'
	]);

	Route::get('/user/create',[
		'uses' => 'UsersController@create',
		'as' => 'user.create'
	]);

	Route::get('/user/store',[
		'uses' => 'UsersController@store',
		'as' => 'user.store'
	]);

	Route::get('/user/admin/{id}',[
		'uses' => 'UsersController@admin',
		'as' => 'user.admin'
	]);

	Route::get('/user/not_admin/{id}',[
		'uses' => 'UsersController@not_admin',
		'as' => 'user.not.admin'
	]);

	Route::get('/user/profile',[
		'uses' => 'ProfilesController@index',
		'as' => 'user.profile'
	]);

	Route::get('/user/profile/update/{id}',[
		'uses' => 'ProfilesController@update',
		'as' => 'user.profile.update'
	]);

	Route::get('/user/delete/{id}',[
		'uses' => 'ProfilesController@destroy',
		'as' => 'user.delete'
	]);

});
