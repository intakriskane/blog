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
                @if(isset($_GET['error'])):
                    <div style="color:red;">fill all the required fields</div>
                @endif
                @if(isset($_GET['error2'])):
                <div style="color:red;">entered passwords do not match</div>
                @endif
                <form action="home.php" method="post">  
                    <!-- data is coming from registration form -->
                    <input type="hidden" name="source" value="registration_form" >
                    <input type="text" placeholder="username:" name="username" style="border: 1px #1D48EF solid; margin-bottom: 5px"><br>                        
                    <input type="text" placeholder="name:" name="name" style="border: 1px #1D48EF solid; margin-bottom: 5px"><br>                        
                    <input type="password" placeholder="password:" name="password"style="border: 1px #1D48EF solid; margin-bottom: 5px"><br>
                    <input type="password" placeholder="repeat password:" name="password2"style="border: 1px #1D48EF solid; margin-bottom: 5px"><br>
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
        </div>
    </div>
@endsection




