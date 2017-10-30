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

//home route
Route::get('/', function () {
    return view('welcome');
})->name("home");

//articles route
Route::get('/articles', function () {
    $tasks = [
        'go to store',
        'dance on table',
        'drink tea'
    ];
    return view('articles', compact('tasks'));
})->name("articles");

// route to registration page
Route::any('/register', function () {
    return view('register');
})->name("register");

// route to login page
Route::any('/login', function () {
    return view('login');
})->name("login");

