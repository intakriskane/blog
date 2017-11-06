@extends('layouts.app')

@section('title') 
    Profile
@endsection

@section('userStyle')
    <style>
       h4{
           margin-top: 15px;
           margin-left: 15px;
       }
        .postList{
            width: 70%;
            margin-left: 50px;
        }

        th{
            background: #dde4ff;
        }

        #titleCol{
            column-width: 300px;
        }

        #newPost {
            position: absolute;
            z-index: 10;
            top: -70px;
            right: 360px;
        }
        #newPost:hover {
            background-color: #0026bf;
        }
        ol {
            display: inline-block;
            position: relative;
            right: -160px;
            top: 15px;
        }

        #ctrl1, #ctrl2{
            margin: -15px;
        }
        hr{
            margin: 1px;
        }

    </style>
@endsection

@section('content')
    <div>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
                <li>{{ session('first_name') }}</li>
        </ul>
    </div>    
    <div class="container">
        <div class="row" style="margin-top: -40px">
            <div class="col-xs-6">
                @if(session('username'))
                    <h3>Hello, {{ session('first_name') }}!</h3>   
                @endif
            </div>
            <div class="col-xs-6">
                <ul class="use-controls">
                    <ol><a href="/articles/create">                        
                        <button class="btn btn-primary" id="ctrl1"> Create new post </button>
                    </a></ol> 
                    <ol><a href="">
                    <button class="btn btn-primary" id="ctrl2"> Settings </button>
                    </a></ol>          
                </ul>
            </div>
        </div>
        <hr>

        <div class="row">
            <h4>Your articles:</h4>
            <!-- articles -->
            <table class="postList">
                <tr>
                    <th>Article Title</th>
                    <th>Posted on</th> 
                    <th>Operations</th>
                </tr>
                @foreach ($userArticles as $post)
                <tr>
                    <td id="titleCol"><a href="/articles/{{ $post->id }}" style="color: #1D48EF">
                    <p><strong> {{ $post->title }}</strong></a></td>
                    <td>{{ $post->created_at->format('M j, Y \a\t g:iA') }}</td>
                    <td>
                        <a href="/articles/{{ $post->id }}/edit">edit </a>
                        &nbsp 
                        <a href="/articles/{{ $post->id }}/edit">delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            
        
        </div>

    </div>

@endsection
