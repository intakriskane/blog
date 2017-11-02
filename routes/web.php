<?php

use App\Post;
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

//home route
Route::get('/', function () {
    $top3 = DB::table('posts')->orderBy('id', 'desc')->take(3)->get();
    return view('welcome', compact('top3'));
})->name("home");

// route to registration page
Route::any('/register', function () {
    return view('register');
})->name("register");

// route to login page
Route::any('/login', function () {
    return view('login');
})->name("login");

//all articles in Articles page
// Route::any('/articles', function(){
//     $allArticles = DB::table('posts')->get();
//     return view('articles', compact('allArticles'));
// })->name("articles");

//working all articles
// Route::any('/articles', function(){
//     $allArticles = DB::table('posts')->get();
//     return $allArticles;
// })->name("articles");

//individual article in it's own page
// Route::any('/articles/{post}', function($id){
//     $article = DB::table('posts')->find($id);
//     return view('posts.article', compact('article'));
// })->name("post");

//all articles in Articles page
// Route::any('/articles', function(){
//     $allArticles = DB::table('posts')->get();
//     return view('posts.articles', compact('allArticles'));
// })->name("articles");

//all articles in page + ordered by newest on top
// Route::any('/articles', function(){
//     $allArticles = DB::table('posts')->orderBy('created_at', 'desc')->get();
//     return view('posts.articles', compact('allArticles'));
// })->name("articles");


//all articles in Articles page with Eloquent
Route::any('/articles', function(){
    $allArticles = Post::all();
    return view('posts.articles', compact('allArticles'));
})->name("articles");

//individual article in it's own page - Eloquent
Route::any('/articles/{post}', function($id){
    $article = Post::find($id);
    return view('posts.article', compact('article'));
})->name("post");

//all articles in page + ordered by newest on top - Eloquent
Route::any('/articles', function(){
    $allArticles = Post::Desc()->get();
    return view('posts.articles', compact('allArticles'));
})->name("articles");