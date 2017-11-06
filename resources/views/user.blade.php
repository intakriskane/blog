@extends('layouts.app')

@section('title') 
    Profile
@endsection

@section('content')
    <div>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
                <li>username</li>
        </ul>
    </div>    
    <div class="container" id="app">
    <div class="row" style="margin-top: -25px">
        <div class="col">


            @if(session('username'))
                <h3>Hello, {{ session('first_name') }}!</h3>

             @endif
        </div>

    </div>

@endsection
