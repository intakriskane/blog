@extends('layouts.app')

@section('title') 
    Articles
@endsection

@section('articlesStyle')
    <style>
        /* Sidebar modules for boxing content */
        /* .sidebar-module {
            padding: 2px;
        }
        .sidebar-module-inset {
            padding: 2px;
            background-color: #f5f5f5;
            border-radius: 5px;
        } */
        
        /* create new article button */
        #newPost {
            position: absolute;
            z-index: 10;
            top: 80px;
            right: 270px;
        }
        #newPost:hover {
            background-color: #0026bf;
        }
        /* .articleTitle{
            font-size: 17px;
            font-style: bold;
        } */
        .sidebar-module {
            padding: 2px;
        }
        .sidebar-module-inset {
            padding: 2px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }
        .blog-main{
            margin-left: 10px;
            /* margin-top: -30px; */
            width: 70%;
        }
        .fa-pencil:hover, .fa-trash:hover {
            color: #1D48EF;
        }
        .fa-pencil, .fa-trash {
            color: black;
        }
        #introText{
            text-align: justify;
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
                <button type="newPost" class="btn btn-primary" id="newPost">
                    Create new post
                </button> 
            </a>
        @endif
    </div>

    <div class="row">
        <div class="col-sm-8 blog-main">
            <!-- articles -->
            @foreach ($allArticles as $post)
                <ul>
                    <strong>
                        <a href="/articles/{{ $post->id }}">
                           <p class="articleTitle"> {{ $post->title }} </p>
                        </a>
                        <p class="meta_data"> 
                            {{ $post->created_at->format('M j, Y \a\t g:iA') }} by 
                            <a href="/author/{{ $post->user->id }}">
                                {{ $post->user->first_name }}
                            </a> &nbsp &nbsp &nbsp
                            <!-- if active user is author of the article, delete&edit will be displayed -->
                            @if($post->user->id === session('user_id'))
                                <a href="/articles/{{ $post->id }}/edit">
                                    <!-- <img src="/media/edit.ico" height='16'> -->
                                    <i class="fa fa-pencil" aria-hidden="true" style="font-size: 18px"></i>
                                </a> &nbsp
                                <a href="/articles/{{ $post->id }}/edit">
                                    <!-- <img src="/media/delete.ico" height='20'> -->
                                    <i class="fa fa-trash" aria-hidden="true" style="font-size: 18px"></i>
                                </a>
                            @endif
                        </p>
                    </strong>
                </ul>
                <ul id="introText">{{ $post->intro }} </br>
                    <a href="/articles/{{ $post->id }}" class="right" style="float: right">
                        Read more...
                    </a>
                </ul>
                </br></br>
            @endforeach
        <div>

        <aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>
            <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                    <li><a href="#">March 2014</a></li>
                    <li><a href="#">February 2014</a></li>
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </aside>

    </div>


@endsection




