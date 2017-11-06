<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('loggedIn', ['only' => ['create', 'store']]);
    }

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
    public function store(Post $post)
    {     
        $this->validate(request(), [
            'title' => 'required',
            'intro' => 'required|max:400',
            'main' => 'required|min:400'
        ]);   
        // Post::create(request(['title', 'intro', 'main']));
        Post::create([
            'title' => request('title'),
            'intro' => request('intro'),
            'main' =>  request('main'),
            'user_id' => session('user_id'),
        ]);    
        return redirect('/');
    }


}
