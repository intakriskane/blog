@extends('layouts.app')

@section('title') 
    Create post
@endsection

@section('createStyle')
    <style>
        h3{
            color: #1D48EF;
        }
        .sidebar-module {
            padding: 2px;
        }
        .sidebar-module-inset {
            padding: 2px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }
        .blog-main{
            margin-left: 20px;
            margin-top: -30px;
        }

        textarea{ 
            width: 700px; 
            min-width:100%; 
            max-width:100%; 
            resize: none;
        }
        #intro{
            height:120px; 
            min-height:120px;  
            max-height:120px;
        }
        #intro:focus{
            box-shadow: 0 1px 8px 0 #0026bf;
        }
        #main{
            height:300px; 
            min-height:300px;  
            max-height:300px;
        }
        #main:focus{
            box-shadow: 0 1px 8px 0 #0026bf;
        }
        form{
            margin-top: -10px;
        }
        #submitChanges{
            float: right;
        }
        #deletePost{
            position: absolute;
            z-index: 10;
            top: 20px;
            right: 15px;
        }
    </style>
@endsection

@section('content')
<ul class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li><a href="/articles">Articles</a></li>
    <li>Create new article</li>
</ul>
<div class="row">
    <div class="col-sm-8 blog-main">
        <h3>Edit a post</h3>
        <hr>
        <form method="POST" action="/articles/{{ $post->id }} ">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="intro">Intro:</label>
                <textarea class="form-control" id="intro" name="intro"> {{ $post->intro }} </textarea>
            </div>
            <div class="form-group">
                <label for="main">Main:</label>
                <textarea class="form-control" id="main" name="main"> {{ $post->main }} </textarea>
            </div>
            <div class="form-group">
              <button type="sumbit" class="btn btn-primary" id="submitChanges">Submit changes</button> 
            </div>
            <!-- <div class="form-group">
              <button type="delete" class="btn btn-danger" id="deletePost">Delete post</button> 
            </div> -->
            @include ('layouts.errors')
        </form>
        <!-- delete post -->
        <form method="POST" action="/articles/{{ $post->id }}" >
            {{ method_field('DELETE') }} 
            {{ csrf_field() }}
            <div class="form-group">
                <button type="delete" class="btn btn-danger" id="deletePost">Delete post</button> 
            </div>
        </form>






    </div>

        <!-- put a gallery here or pic upload -->
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
