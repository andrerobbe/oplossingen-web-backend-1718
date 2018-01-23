<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
        [class^='bg-'] {
            padding:12px;
            border-radius:4px;
            border:1px solid rgba(0,0,0,0.1);
            margin:12px 0;
        }
        button
        {
            margin:0;
            padding:0;
            background-color:transparent;
            border-width:0;
            display: inline-block;
            text-align: center;
        }
        .comments
        {
            padding:32px 0;
        }
        .comment-body {
            white-space: pre-wrap;
        }
        .comments li {
            margin: 16px 0 32px 0;
        }
        .comment-info {
            border-top: 1px solid #eee;
            margin-top:6px;
            padding-top:6px;
            font-size:10px;
        }
        .article-overview .fa-btn {
            margin-left:6px;
        }
        .form-inline { display:block;height:24px; }
        .article-overview {
            list-style-type: none;
            padding: 0px;
        }
        .article-overview li
        {
            padding: 8px 0;
        }
        .urlTitle {
            font-size: 24px;
        }
        .disabled {
            color:lightgrey;
        }
        .vote {
            float:left;
            height:48px;
            margin-right:4px;
            position: relative;
        }
        .vote .fa-btn {
            font-size:18px;
        }
        .downvote i, .downvote button
        {
            display: block;
            position:absolute;
            bottom:0;
        }
        .breadcrumb {
            padding-left:0;
            margin-bottom: 16px;
            background-color:transparent;
        }
        .panel-content {
            padding:32px;
        }
        .edit-btn
        {
            margin-left:8px;
            padding:0 4px;
        }
        .info {
            font-size:10px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('http://oplossingen2.web-backend.local/hackernews.int/public/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="http://oplossingen2.web-backend.local/hackernews.int/public/home">Home</a></li>
                        @guest
                        @else
                        <li><a href="http://oplossingen2.web-backend.local/hackernews.int/public/article/add">Add article</a></li>
                        @endguest
                        <li><a href="http://oplossingen2.web-backend.local/hackernews.int/public/instructies">Instructies</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
