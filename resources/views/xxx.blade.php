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
    @foreach ($allArticles as $xxx)
        <ul style="color: #1D48EF"><strong>{{ $xxx->title }}</strong></ul>
        <ul>{{ $xxx->intro }}</ul>
        </br>
    @endforeach
    <div>




    </div>

@endsection




