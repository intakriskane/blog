<?php

// get data from registration page to create new user
Route::get('/register', 'UsersController@create')->name("register");

//store data from registration form
Route::post('/register', 'UsersController@store');


//login + create a session
Route::get('/login', 'SessionsController@create')->name("login");
Route::post('/login', 'SessionsController@store')->name("login");

//logout
Route::any('/logout', 'SessionsController@destroy')->name("logout");

//home route with 3 latest articles
Route::get('/', 'PostsController@latest3')->name("home");

//all articles in Articles page with controllers
Route::get('/articles', 'PostsController@index')->name("articles");

//page for creating posts
Route::get('/articles/create', 'PostsController@create')->name("create");

//saving post to database
Route::post('/articles', 'PostsController@store');

//editing post
Route::get('/articles/{post}/edit', 'PostsController@edit');

//save  editted post to database
Route::patch('/articles/{post}', 'PostsController@update');

//delete a post
Route::delete('/articles/{post}', 'PostsController@delete');

//individual article in it's own page 
Route::get('/articles/{post}', 'PostsController@show')->name("post");

//user profile
Route::get('/user', 'UsersController@index');

//page with all posts by specific author
Route::get('/author/{id}', 'AuthorsController@index');

//save comment to database 
Route::post('/articles/{post}/comments', 'CommentsController@store');
