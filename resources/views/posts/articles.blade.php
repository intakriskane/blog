@extends('layouts.app')

@section('title') 
    Articles
@endsection

@section('articlesStyle')
    <style>
        /* Sidebar modules for boxing content */
        .sidebar-about {
            padding: 6px;
            text-align: justify;
            background-color: #ededed;
            border-radius: 5px;
            margin-bottom: 5px;
        }
        .sidebar-module {
            padding: 6px;
            border-radius: 5px;
            background-color: #ededed;
            margin-bottom: 5px; 
        }
        h4{
            color: #1D48EF;
            margin-left: 3px;
        }
        li{
            margin-left: 10px;
        }
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

        .pagination>.active>a,
        .pagination>.active>a:focus,
        .pagination>.active>a:hover,
        .pagination>.active>span,
        .pagination>.active>span:focus,
        .pagination>.active>span:hover {
            z-index: 3;
            color: #fff;
            cursor: default;
            background-color: #1D48EF;
            border-color: #1D48EF;
            margin-right: 5px; 
            border-radius: 5px;
        }

        .pagination a {
            margin: 0 5px; 
            border-radius: 5px;
        }

        .pagination > li > a:focus,
        .pagination > li > a:hover,
        .pagination > li > span:focus,
        .pagination > li > span:hover {
            z-index: 3;
            color: #1D48EF;
            font-weight: bold;
            background-color: #d3d3d3;
            border-radius: 5px;
        }

        .pages{
            float: left;
            margin-left: 40px;
        }


        #commentCount { 
            float:right;
            width:15%;
            margin-left: 30px;
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
                        <p class="meta_data" class="split-para"> 
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
                            <span id="commentCount">{{ $post->comments->count() }} comments </span>
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
            <div class="pages">
                {{ $allArticles->links() }}
            </div>
            
        </div>

        <aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-about">
                <h4>About</h4>
                <p>I've got an idea – an idea so smart that my head would explode if I even began to know what I'm talking about.</p>
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
                    <li><a href="https://github.com/intakriskane/blog">GitHub</a></li>
                    <li><a href="https://www.linkedin.com/">LinkedIn</a></li>
                    <li><a href="https://www.facebook.com/">Facebook</a></li>
                </ol>
            </div>
        </aside>

    </div>
   



@endsection




