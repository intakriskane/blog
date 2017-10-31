@extends('layouts.app')

@section('title') 
    Articles
@endsection

@section('content')

    <div>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Articles</li>
        </ul>
    </div>

    <div>some bunch of articles </div>
    <div>
    @foreach($tasks as $task)
        <li>{{ $task->body }}</li>
    @endforeach
    </div>

@endsection




