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

Route::get('/','HomeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/users','AdminUsersController');
Route::resource('/posts','AdminPostsController');
Route::resource('/categories','AdminCategoriesController');
Route::resource('/media','AdminPhotosController');
Route::resource('/comments','AdminCommentsController');
Route::resource('/comment/replies','AdminRepliesController');

Route::post('/comment/reply','ReplyController@store')->name('reply.store');
Route::post('/comment','CommentController@store')->name('comment.store');

Route::delete('/delete/media','AdminPhotosController@destroy');
Route::get('/post/{id}','PostController')->name('post.index');
Route::get('/addPost','AuthorPostController@create')->name('addPost.create');
Route::post('/addPost','AuthorPostController@store');
Route::get('/category/{category}','HomeController@category')->name('category.posts');
Route::any('/post/search','HomeController@search');
Route::get('/admin','AdminController@index')->name('admin.index');



