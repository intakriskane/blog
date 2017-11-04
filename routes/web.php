<?php

// get data from registration page
Route::get('/register', 'UsersController@register')->name("register");

//store data from registration form
Route::post('/register', 'UsersController@store');

// route to login page
Route::get('/login', 'Controller@login')->name("login");

//home route with 3 latest articles
Route::get('/', 'PostsController@latest3')->name("home");

//all articles in Articles page with controllers
Route::get('/articles', 'PostsController@index')->name("articles");

//page for creating/editing posts
Route::get('/articles/create', 'PostsController@create')->name("create");

//individual article in it's own page 
Route::get('/articles/{post}', 'PostsController@show')->name("post");

//saving post to database
Route::post('/articles', 'PostsController@store');







