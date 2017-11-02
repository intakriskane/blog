<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //get all articles
    public function index()
    {
        $allArticles = Post::Desc()->get();
        return view('posts.articles', compact('allArticles'));
    }

    //get specific article
    public function show($id)
    {
        $article = Post::find($id);
        return view('posts.article', compact('article'));
    }

    public function latest3()
    {
        $latest3 = Post::Latest()->get();
        return view('welcome', compact('latest3'));
    }
}
