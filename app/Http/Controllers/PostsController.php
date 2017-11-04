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

    //show articles
    public function show(Post $post)
    {
        return view('posts.article', compact('post'));
    }

    //get last 3 articles
    public function latest3()
    {
        $latest3 = Post::Latest()->get();
        return view('welcome', compact('latest3'));
    }

    //create new article
    public function create()
    {
        return view('posts.create');
    }

    //save new article to database
    public function store()
    {     
        $this->validate(request(), [
            'title' => 'required',
            'intro' => 'required|max:400',
            'main' => 'required|min:400'
        ]);   
        Post::create(request(['title', 'intro', 'main']));
        return redirect('/');

    }


}
