<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// php artisan route:cache;
// php artisan route:clear;
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

// Route::get('/', function(){
//     return view('login');
// });

Route::get('login', 'App\Http\Controllers\LoginController@login');
Route::post('login', 'App\Http\Controllers\LoginController@do_login');
Route::get('signup', 'App\Http\Controllers\LoginController@signup');
Route::post('signup', 'App\Http\Controllers\LoginController@do_signup');
Route::get('logout', 'App\Http\Controllers\LoginController@logout');

//home
Route::get('home', 'App\Http\Controllers\PostController@home');
// Route::get('post', 'App\Http\Controllers\PostController@post');
Route::get('post1', 'App\Http\Controllers\PostController@view_post');
Route::get('show_like', 'App\Http\Controllers\PostController@show_like'); 
Route::get('i_like','App\Http\Controllers\PostController@i_like');

//create post
Route::get('create_post','App\Http\Controllers\create_post@create_post');
Route::get('do_search','App\Http\Controllers\create_post@do_search'); //forse get, guarda il js
Route::get('send_post','App\Http\Controllers\create_post@send_post');

//search people
Route::get('search_people','App\Http\Controllers\search_people@search_people');
Route::get('do_search_people','App\Http\Controllers\search_people@do_search_people');
Route::get('follow_user','App\Http\Controllers\search_people@follow_user');

// Route::get('/search_content', 'search_content@index')->name('search_content');
// Route::get('/do_search', 'do_search_content@do_search')->name('do_search');
// Route::get('/send_post','do_search_content@send_post')->name('send_post');

// Route::get('/search_people','search_people@index')->name('search_people');
// Route::get('/do_search_people', 'search_people@do_search_people')->name('do_search_people');
// Route::get('/follow_user','search_people@follow_user')->name('follow_user');