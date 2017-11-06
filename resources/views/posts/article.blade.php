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
        }
    </style>
@endsection

@section('content')

    <!-- breadcrumbs -->
    <div>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="/articles">Articles</a></li>
            <li>{{ $post->title }}</li>
        </ul>
    </div>

    <!-- article title & text -->

    <div class="container">
        <p style="color: #1D48EF" id="postTitle"><strong>{{ $post->title }}</strong></p>
        <p class="meta_data"> 
            {{ $post->created_at->format('M j, Y \a\t g:iA') }} by 

            <a href="/author/{{ $post->user->id }}">
                {{ $post->user->first_name }}
            </a>
        </p>
        <p>{{ $post->main }}</p>
    </div>
    <hr>
    <!-- displaying comments -->
    <div><strong>Comments:</strong></div>
    
    <div class="comments">
        <ul class="list-group">
            @foreach ($post->comments as $comment)
            <li class="list-group-item">
            <strong> {{ $comment->created_at->diffForHumans() }}: &nbsp </strong>
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
                    <textarea name="body" placeholder="Your comment here..." class="form-control" required>
                    </textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add comment</button> 
                </div>
                
            </form>
        </div>
        @include ('layouts.errors')

@endsection




