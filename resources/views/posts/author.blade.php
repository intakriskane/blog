@extends('layouts.app')

@section('title') 
    Articles by {{ $author }} 
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
        .fa-pencil:hover, .fa-trash:hover {
            color: #1D48EF;
        }
        .fa-pencil, .fa-trash {
            color: black;
        }
    </style>
@endsection

@section('content')

    <!-- breadcrumbs -->
    <div>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="/articles">Articles</a></li>
            <li>{{ $author }} </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-sm-8 blog-main">
            <!-- articles -->
            @foreach ($authorArticles as $post)
                <ul>
                    <strong>
                        <a href="/articles/{{ $post->id }}" style="color: #1D48EF">
                        <p class="articleTitle"> {{ $post->title }} </p>
                        </a>
                        <p class="meta_data"> 
                            <!-- {{ $post->created_at->toFormattedDateString() }} by  -->
                            <!-- {{ $post->created_at->toDayDateTimeString() }} by  -->
                            {{ $post->created_at->format('M j, Y \a\t g:iA') }} by 

                            <a href="">
                                {{ $post->user->first_name }}
                            </a>&nbsp &nbsp &nbsp
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
                <ul>{{ $post->intro }}</ul>
                <ul>
                    <a href="/articles/{{ $post->id }}" class="right" style="float: right">
                        Read more...
                    </a>
                </ul>
                </br>
            @endforeach
        <div>
    </div>
@endsection




