@extends('layouts.app')

@section('title') 
    Registration
@endsection

@section('content')
    <div>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Register</li>
        </ul>
    </div>  
    <div class="container" id="app">
        <div class="row" style="margin-top: -25px">
            <div class="col">
                <h3>Enter the data &amp; register!</h3>
                
                <form method="POST" action="/register" >  
                <!-- action="/user/{id}" ?? -->
                     {{ csrf_field() }}
                    <input type="text" placeholder="username:" name="username" style="border: 1px #1D48EF solid; margin-bottom: 5px" required><br>                        
                    <input type="text" placeholder="first name:" name="first_name" style="border: 1px #1D48EF solid; margin-bottom: 5px" required><br>                        
                    <input type="text" placeholder="last name:" name="last_name" style="border: 1px #1D48EF solid; margin-bottom: 5px" required><br>                        
                    <input type="password" placeholder="password:" name="password" style="border: 1px #1D48EF solid; margin-bottom: 5px" required><br>
                    <input type="password" placeholder="confirm password:" name="password_confirmation" style="border: 1px #1D48EF solid; margin-bottom: 5px" required><br>
                    <!-- html5 validation -->
                    <input type="email" placeholder="email:" name="email" style="margin-bottom: 5px"><br> 
                    <input type="submit" class="btn btn-primary" value="Register" style="margin-top: 5px"><br>
                </form>
            </div>

            <div class="col" style="margin-top: 30px">
                Already registered?
                <a href="login" style="color: #1D48EF">
                    <input type="submit" class="btn btn-dark" value="Login" id="loginBtn1"><br>
                </a>
            </div>   

            @include ('layouts.errors')

        </div>
    </div>
@endsection




