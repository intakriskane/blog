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


    </style>
@endsection

@section('content')

    <!-- breadcrumbs -->
    <div>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Articles</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-sm-8 blog-main">
            <!-- articles -->
            @foreach ($allArticles as $post)
                <ul>
                    <strong>
                        <a href="/articles/{{ $post->id }}" style="color: #1D48EF">
                            {{ $post->title }}
                        </a>
                        <p class="meta_data"> 
                            <!-- {{ $post->created_at->toFormattedDateString() }} by  -->
                            <!-- {{ $post->created_at->toDayDateTimeString() }} by  -->
                            {{ $post->created_at->format('M j, Y \a\t g:iA') }} by 

                            <a href="">
                                {{ $post->user->first_name }}
                            </a>
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




