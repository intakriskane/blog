@extends('layouts.app')

@section('title') 
    Articles
@endsection

@section('content')

    <!-- breadcrumbs -->
    <div>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Articles</li>
        </ul>
    </div>

    <!-- articles -->
    @foreach ($allArticles as $post)
        <ul style="color: #1D48EF"><strong>{{ $post->title }}</strong></ul>
        <ul>{{ $post->intro }}</ul>
        <ul>
            <a href="" class="right" style="float: right">
                Read more...
            </a>
        </ul>
        </br>
    @endforeach
    <div>




    </div>

@endsection




