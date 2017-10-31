<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('welcome');
    }

    //get blog posts








    // public function user($userId)
    // {
    //     $user = User::find($userId);
        
    //     return view('articles', ['user' => $user, 'foo' => 'bar']);        
        
    // }

    // public function test2($some_id, $some_other_id = null)
    // {
    //     return view('articles');        
    // }
}
