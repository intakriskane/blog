<?php

// route to registration page
Route::any('/register', 'Controller@register')->name("register");

// route to login page
Route::any('/login', 'Controller@login')->name("login");

//home route with 3 latest articles
Route::get('/', 'PostsController@latest3')->name("home");

//all articles in Articles page with controllers
Route::get('/articles', 'PostsController@index')->name("articles");

//individual article in it's own page 
// Route::get('/articles/{post}', 'PostsController@show')->name("post");

//page for creating/editing posts
Route::get('/articles/create', 'PostsController@create')->name("create");

//saving post to database
Route::post('/articles', 'PostsController@store');







