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
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-8 blog-main">
        <h3>Create a post</h3>
        <hr>
        <form method="POST" action="/articles">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="intro">Intro:</label>
                <textarea class="form-control" id="intro" name="intro"></textarea>
            </div>
            <div class="form-group">
                <label for="main">Main:</label>
                <textarea class="form-control" id="main" name="main"></textarea>
            </div>
            <div class="form-group">
              <button type="publish" class="btn btn-primary">Publish</button> 
            </div>

            @include ('layouts.errors')
        </form>



    </div>

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
