@extends('layouts.app')

@section('title') 
    Articles
@endsection

@section('postStyle')
    <style>
        .container{
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
            <li>{{ $article->title }}</li>
        </ul>
    </div>

    <!-- articles -->

    <div class="container">
    <p style="color: #1D48EF"><strong>{{ $article->title }}</strong></p>
    <p>{{ $article->main }}</p>
    </div>

@endsection




