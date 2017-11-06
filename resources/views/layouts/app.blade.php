<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('homestyle')
    @yield('postStyle')
    @yield('createStyle')
    @yield('articlesStyle')

    <style>
        .navbar{
            box-shadow: 0 4px 8px 0 #1D48EF;
        }

        .btn-primary{
            background: #1D48EF;
        }
        .btn-primary:hover{
            background-color: #0026bf;
            color: white;
        }

        .btn-dark{
            background: #343A40;
            color: white;
        }
        .btn-dark:hover{
            background-color: #545a60;
            color: white;
        }

        a{
            color: #1D48EF;
        }
        a:hover{
            color: #1D48EF;
            text-shadow: 1px 1px 1px #a8b9ff;
        }

        .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background: #fff;
                opacity: 0.8;
                color: #1D48EF;
                text-align: center;
                box-shadow: 0 5px 8px 0 #1D48EF;
            }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <img src="/media/blogo.jpg" height="40">                    
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('Blog', 'Blogly')}} 
                    </a>
                </div>
                
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::check())
                            <li><a href="#" ml-auto>{{ Auth::user()->username }}</a></li>
                        @endif
                        @if (Auth::guest())
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('articles') }}">Articles</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- footer -->
    <div class="footer">
        <p style="margin-top:3px">© Cake is a lie!</p>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <script src="https://unpkg.com/vue"></script>       
    <script src="main.js" type="text/javascript"></script>
</body>

</html>
