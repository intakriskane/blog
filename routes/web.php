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



// route to registration page
Route::any('/register', function () {
    return view('register');
})->name("register");

// route to login page
Route::any('/login', function () {
    return view('login');
})->name("login");





//tasks route
// Route::get('/articles', function () {
//     $tasks = [
//         'go running',
//         'jump around',
//         'cry'
//     ];
//     return view ('articles', compact('tasks'));
// })->name("articles");

Route::get('/tasks', function () {
    $tasks = App\Task::all();
    return view ('tasks.index', compact('tasks')); //passes on all tasks as objects
});

Route::get('/tasks/{task}', function ($id) {
    $task = App\Task::find($id);
    return view ('tasks.show', compact('task')); //passes on all tasks as objects
});

