@extends('layouts.app')

@section('title') 
    Articles
@endsection

@section('postStyle')
    <style>
        #postTitle{
            width: 90%;
            text-align: justify;
            font-size: 16px;
            margin-left: -15px;
        }

        ol {
            display: inline-block;
            position: relative;
            right: -130px;
        }

        #ctrl1, #ctrl2{
            margin: -15px;
        }
        .container{
            padding: 5px;
        }

        #articleText{
            text-align: justify;
        }
        textarea{ 
            width: 700px; 
            min-width:100%; 
            max-width:100%; 
            resize: none;
        }
        #commentField{
            height:120px; 
            min-height:120px;  
            max-height:120px;
        }
        #commentField:focus{
            box-shadow: 0 1px 8px 0 #0026bf;
        }

        /* flash message & disappearing */
        #flash-message {
            position: absolute;
            z-index: 10;
            top: 120px;
            right: 320px;
            font-size: 16px;
            font-weight: bold;
            animation: flash-message 3s forwards;
        }
        @keyframes flash-message {
            0%   {opacity: 1;}
            100% {opacity: 0; display:none;}
        }


    </style>
@endsection

@section('content')

    <!-- breadcrumbs -->
    <div>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="/articles">Articles</a></li>
            <li> {{ $post->title }} </li>
        </ul>
    </div>

    <!-- flash message -->
    @if(session('message') != null)
        <div class="alert alert-success" id="flash-message">{{ session('message') }} </div>
    @endif

    <!-- article title & text -->
    <div class="container">
        <div class="col-xs-6">
            <p style="color: #1D48EF" id="postTitle"><strong>{{ $post->title }}</strong></p>
            <p class="meta_data"> 
                {{ $post->created_at->format('M j, Y \a\t g:iA') }} by 
                <a href="/author/{{ $post->user->id }}">
                    {{ $post->user->first_name }},
                </a> &nbsp 
                {{ $post->comments->count() }} comments
            </p>
        </div>
        @if($post->user->id === session('user_id'))
            <div class="col-xs-6">
                <ul class="use-controls">
                    <ol><a href="/articles/{{ $post->id }}/edit">                        
                        <button class="btn btn-primary" id="ctrl1"> Edit </button>
                    </a></ol> 
                    <ol><a href="/articles/{{ $post->id }}/edit">
                    <button class="btn btn-danger" id="ctrl2"> Delete </button>
                    </a></ol>          
                </ul>
            </div>
        @endif
    </div>
    <!-- image -->
    <div class="container">
        <img src="{{ $post->image }}" style="width:100%">
    </div>
    <!-- text -->
    <div class="container">
        <p id="articleText">{{ $post->main }}</p>
    </div>
    <hr>
    <!-- displaying comments -->
    <div class="container">
        <div><strong>Comments:</strong></div>
        
        <div class="comments">
            <ul class="list-group">
                @foreach ($post->comments as $comment)
                <li class="list-group-item">
                <strong> {{ $comment->created_at->diffForHumans() }} by {{ $comment->user->first_name }}: &nbsp </strong>
                    {{ $comment->body }}
                </li>
                @endforeach
            </ul>
        </div>

        <!-- field for adding comment -->
        <hr>
            <div class="card-block">
                <form method="POST" action="/articles/{{$post->id}}/comments">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" id="commentField" placeholder="Your comment here..." class="form-control" required>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add comment</button> 
                    </div>
                    
                </form>
            </div>
        </div>
        @include ('layouts.errors')

@endsection




