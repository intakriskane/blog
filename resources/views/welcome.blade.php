@extends('layouts.app')

@section('title') 
    Home
@endsection

@section('homestyle')
        <style>
            /* html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            } */

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 10px;
                color: #1D48EF;
            }
            /* Three columns side by side */
            .column {
                float: left;
                width: 33.33%;
                margin-bottom: 30px;
                padding: 0 8px;
            }

            /* Display the columns below each other instead of side by side on small screens */
            @media (max-width: 650px) {
                .column {
                    width: 100%;
                    display: block;
                }
            }

            /* Add some shadows to create a card effect */
            .card {
                box-shadow: 0 4px 8px 0 #1D48EF;
                padding-top: 2px;
                padding-left: 10px;
                padding-right: 10px;
            }

            /* Some left and right padding inside the container */
            .col-container {
                display: table;
                width: 100%;
            }

            /* Clear floats */
            .container::after, .row::after {
                content: "";
                clear: both;
                display: table;
            }

            .btn{
                margin-bottom: 7px;
            }

            h2, h4{
                color: #1D48EF;
            }

            #flash-message {
                position: absolute;
                z-index: 10;
                top: 70px;
                right: 20px;
                font-size: 16px;
                font-weight: bold;
                animation: flash-message 3s forwards;
            }

            @keyframes flash-message {
                0%   {opacity: 1;}
                100% {opacity: 0; display:none;}
            }

        </style>
@endsection

@section('content')
    <div class="content">
        <!-- photo slides -->
        <div class="title m-b-md">
            C'est la Vie!
        </div>
        <!-- @if(session('username'))
            <div class="form-group" style="margin-top: 15px">
                <h4> {{ session('first_name') }} </h4>
            </div>@endif -->
            @if(session('message') != null)
                <div class="alert alert-success" id="flash-message">{{ session('message') }} </div>
            @endif
        

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                <!-- <img src="https://www.w3schools.com/howto/img_lights_wide.jpg" style="width:100%"> -->
                <img src="/media/img2.jpg" style="width:100%">
                </div>

                <div class="item">
                <!-- <img src="https://www.w3schools.com/howto/img_fjords_wide.jpg" style="width:100%"> -->
                <img src="/media/img1.jpg" style="width:100%">
                </div>

                <div class="item">
                <!-- <img src="https://www.w3schools.com/howto/img_nature_wide.jpg" style="width:100%"> -->
                <img src="/media/img3.jpg" style="width:100%">
                </div>

                <div class="item">
                <!-- <img src="https://www.w3schools.com/howto/img_mountains_wide.jpg" style="width:100%"> -->
                <img src="/media/img4.jpg" style="width:100%">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <!-- &#10094; -->
                <span class="glyphicon"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <!-- &#10095; -->
                <span class="glyphicon"></span>
                <span class="sr-only">Next</span>
            </a>
         </div>
            </br>
        <!-- 3 most recent articles -->
        <div class="row">
            @foreach ($latest3 as $latest)
                <div class="column">
                    <div class="card">
                        <!-- <img src="img1.jpg" alt="Jane" style="width:100%"> -->
                            <h4>{{ $latest->title }}</h4>
                            <p style="text-align: justify">{{ $latest->intro }}</p>
                            <p>
                                <a href="/articles/{{ $latest->id }}">
                                    <button class="btn btn-primary">
                                        Read more...
                                    </button>
                                </a>
                            </p>
                    </div>
                </div>
            @endforeach
        </div>



    </div>
</div>

@endsection
