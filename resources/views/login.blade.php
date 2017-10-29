@extends('layouts.app')

@section('title') 
    Login
@endsection

@section('content')
    <div>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Login</li>
        </ul>
    </div>    
    <div class="container" id="app">
    <div class="row" style="margin-top: -25px">
        <div class="col">
            <h3>Log in and start writing!</h1>
            @if (isset ($_GET['error'])):
            <div style="color:red;"> username / password combination is invalid</div>
            @endif
            <form action="home.php" method="post">  
                <!-- data coming from login form -->
                <input type="hidden" name="source" value="login_form" >
                <input type="text" placeholder="username:" name="username" style="margin-bottom: 5px"><br>                        
                <input type="password" placeholder="password:" name="password" style="margin-bottom: 5px"><br>
                <input type="submit" class="btn btn-primary" value="Login" style="margin-top: 5px"><br>
            </form>
        </div>
        <div class="col" style="margin-top: 30px">
            Not registered yet?
            <a href="register" style="color: #1D48EF">
            <input type="submit" class="btn btn-dark" value="Register" id="registerBtn1"><br>
            </a>
        </div> 
    </div>
    <div class="row">
        <div class="col">
            @if(isset($message)){
                    echo '<label class="text-danger">'.$message.'</label>';
                }
           @endif
        </div>
    </div>
@endsection




