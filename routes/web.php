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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'Blog\PagesController@blogHome');
Route::get('/post/{post}', 'Blog\PagesController@blogPost')->name('blog.post');
Route::get('/category/{category}', 'Blog\PagesController@blogCategory')->name('blog.category');
// Route::get('/{year}/{month}/{day}', 'Blog\PagesController@blogPost')
// 	->where(['year' => '[0-9]{4}', 'month' => '[0-9]{2}', 'day' => '[0-9]{2}']);

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => ['auth']], function () {

	Route::prefix('admin')->group(function () {

		Route::get('/', 'HomeController@index')->name('admin');
		Route::resource('/tags', 'TagController', ['except' => ['create', 'show', 'destroy']]);
		Route::resource('/categories', 'CategoryController', ['except' => ['create', 'show', 'destroy']]);
		Route::resource('/posts', 'PostController', ['except' => ['show', 'destroy']]);
	});
});