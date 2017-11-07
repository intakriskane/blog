@extends('layouts.app')

@section('title') 
    Create post
@endsection

@section('createStyle')
    <style>
        h3, h5{
            color: #1D48EF;
        }
        h4{
            color: #1D48EF;
            margin-left: 3px;
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
                <label for="intro">Intro (max 400 characters):</label>
                <textarea class="form-control" id="intro" name="intro" onkeyup="counter()" maxlength="400"> {{ $post->intro }} </textarea>
                <strong><h5 class="pull-right" id="count_message"></h5></strong>
            </div>
            <div class="form-group">
                <label for="main">Main (min 400 characters):</label>
                <textarea class="form-control" id="main" name="main"onkeyup="minCounter()" minlength="400"> {{ $post->main }} </textarea>
                <strong><h5 class="pull-right" id="target"></h5></strong>
            </div>
            <div class="form-group">
                <label for="image">Image (enter URL of the image):</label>
                <input type="text" class="form-control" id="title" name="image">
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
