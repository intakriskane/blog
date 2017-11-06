<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class AuthorsController extends Controller
{
    //all articles by specific user
    public function index($id)
    {
        $authorArticles = Post::Desc()->where('user_id', '=', $id)->get();
        $author = User::find($id);
        return view('posts.author', compact('authorArticles'))->with('author', $author->first_name);
    }
}
