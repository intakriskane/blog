@extends('layouts.app')

@section('title') 
    Settings
@endsection

@section('content')
    <div>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Settings</li>
        </ul>
    </div>  
    <div class="container" id="app">
        <div class="row" style="margin-top: -25px">
            <div class="col">
                <h3>Change password</h3>
                
                <form method="POST" action="/user" >  
                    {{ method_field('PATCH') }}
                     {{ csrf_field() }}                       
                     <input type="password" placeholder="old password:" name="old password" style="border: 1px #1D48EF solid; margin-bottom: 5px" required><br>
                     <input type="password" placeholder="new password:" name="new password" style="border: 1px #1D48EF solid; margin-bottom: 5px" required><br>
                     <input type="password" placeholder="confirm new password:" name="new_password_confirmation" style="border: 1px #1D48EF solid; margin-bottom: 5px" required><br>

                    <input type="submit" class="btn btn-primary" value="Change password" style="margin-top: 5px"><br>
                </form>
            </div>



            @include ('layouts.errors')

        </div>
    </div>
@endsection




