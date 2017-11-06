@extends('layouts.app')

@section('title') 
    Articles
@endsection

@section('articlesStyle')
    <style>
        /* Sidebar modules for boxing content */
        .sidebar-module {
            padding: 2px;
        }
        .sidebar-module-inset {
            padding: 2px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }
        #newPost {
            position: absolute;
            z-index: 10;
            top: 70px;
            right: 360px;
        }
        #newPost:hover {
            background-color: #0026bf;
        }
        .articleTitle{
            font-size: 17px;
            font-style: bold;
        }


    </style>
@endsection

@section('content')

    <!-- breadcrumbs -->
    <div>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Articles</li>
        </ul>
        @if(session('username'))
            <a href="/articles/create">
                <button type="newPost" class="btn btn-primary" id="newPost">Create new post</button> 
            </a>
        @endif
    </div>

    <div class="row">
        <div class="col-sm-8 blog-main">
            <!-- articles -->
            @foreach ($allArticles as $post)
                <ul>
                    <strong>
                        <a href="/articles/{{ $post->id }}" style="color: #1D48EF">
                           <p class="articleTitle"> {{ $post->title }} </p>
                        </a>
                        <p class="meta_data"> 
                            {{ $post->created_at->format('M j, Y \a\t g:iA') }} by 
                            <a href="/author/{{ $post->user->id }}">
                                {{ $post->user->first_name }}
                            </a>
                        </p>
                    </strong>
                </ul>
                <ul>{{ $post->intro }} </br>
                    <a href="/articles/{{ $post->id }}" class="right" style="float: right">
                        Read more...
                    </a>
                </ul>
                </br></br>
            @endforeach
        <div>
    </div>
@endsection




