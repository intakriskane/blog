<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('loggedIn', ['only' => ['create', 'store', 'delete', 'update', 'edit']]);
    }

    //get all articles
    public function index()
    {
        $allArticles = Post::Desc()->paginate(5);
        return view('posts.articles', compact('allArticles'));
    }

    //show article
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

    //edit  article
    public function edit(Post $post)
    {
        //check if post author_id is same as active user_id
        if($post->user_id !== session('user_id')){
            return back();
        }
        return view('posts.edit', compact('post'));
    }

    //save new article to database
    public function store(Post $post)
    {     
        $this->validate(request(), [
            'title' => 'required',
            'intro' => 'required|max:400',
            'main' => 'required|min:400'
        ]);   
        // dd(request());
        // Post::create(request(['title', 'intro', 'main']));
        Post::create([
            'title' => request('title'),
            'intro' => request('intro'),
            'main' =>  request('main'),
            'user_id' => session('user_id'),
            'image' => request('image'),
        ]);    
        session()->flash('message', 'Your post has been published!');                   
        return redirect('/');
    }

        //save new article to database
        public function update(Request $request, Post $post)
        {   
            // dd($request);
            $post->update($request->all());

            return redirect('/user');
        }

        //delete a post
        public function delete(Post $post)
        {
            // dd('delete?');

            $post->delete();
            
            return redirect('/user');
        }

}
