<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;

class SessionsController extends Controller
{
    //login form
    public function create()
    {
        return view('login');
    }

    //checking if user is valid
    public function store()
    {
        $this->validate(request(),[
            'username' => 'required',
            'password' => 'required',
        ]);

        $validUser = DB::table('users')->where('username', request('username'))->first();
        
        //checking if any user record has been found with enteres username
        if($validUser == null)
        {
            return redirect ('/login')->with('loginError', 'Username not found!');
        }
        //checking if there is username & password combo in db
        elseif(
            (($validUser->username) === request('username')) && 
            (Hash::check((request('password')), ($validUser->password)))
        )
            { //if combo found
                dd(session());
                //keep session open
                $validUser->session()->reflash();
                //redirect to user profile/home page?
                return redirect('/')->with('activeUser', $validUser->username);
            }
        //if combo not found
        else
        {
                //show error + redirect to login page
                return redirect ('/login')->with('loginError', 'No such username & password combo! Try again!');                
        }

    }


    // public function destroy()
    // {
    //     //logging out:
    //     auth()->logout();
    //     return redirect('/');
    // }


}
