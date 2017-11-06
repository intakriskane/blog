<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $this->validate(request(),[
            'username' => 'required',
            'password' => 'required',
        ]);

        // $validUser = DB::table('users')->where('username', request('username'))->first();
        $validUser = DB::table('users')->where('username', request('username', 'first_name'))->first();
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
                // dd($user);
                // dd(session());
                // dd($validUser);    
                $request->session()->put('username',$validUser->username);
                $request->session()->put('first_name',$validUser->first_name);     
                $request->session()->put('token', session('_token'));                     
                session()->flash('message', 'You are now logged in!');           
                // session(['message' => 'You are now logged in!']);
                // dd(session());
                // dd(session('message'));
                // dd(session()->token());
                //redirect to user profile/home page?
                return redirect('/');
            }
        //if combo not found
        else
        {
                //show error + redirect to login page
                return redirect ('/login')->with('loginError', 'No such username & password combo! Try again!');                
        }

    }

    //logout & destroy session
    public function destroy()
    {
        //logging out:
        session()->flush();
        //redirect to home page after logout
        return redirect('/');
    }


}
