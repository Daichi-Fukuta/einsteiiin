<?php

use Illuminate\Support\Facades\Route;

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

Route::get('welcome', 'WelcomeController@welcome')->name('welcome');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// User
Route::get('profile/{id}', 'UserController@show')->name('user_show');
Route::get('profile/{id}/edit', 'UserController@edit')->name('user_edit');
Route::post('profile/{id}/update', 'UserController@update')->name('user_update');
Route::post('profile/{id}/remove', 'UserController@remove')->name('user_remove');

// Post
Route::get('/', 'PostController@index')->name('posts');
Route::get('posts/create', 'PostController@create')->name('posts_create');
Route::post('posts/store', 'PostController@store')->name('posts_store');
Route::get('posts/{id}', 'PostController@show')->name('posts_show');
Route::post('posts/{id}/remove', 'PostController@remove')->name('post_remove');