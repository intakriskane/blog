<?php

// get data from registration page to create new user
Route::get('/register', 'UsersController@create')->name("register");

//store data from registration form
Route::post('/register', 'UsersController@store');


//login + create a session
Route::get('/login', 'SessionsController@create')->name("login");

//logout
// Route::post('/logout', 'SessionsController@destroy')->name("logout");


//user profile
// Route::post('/user', 'SessionsController@show')->name("profile");
Route::post('/user', 'SessionsController@store');



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







