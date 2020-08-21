<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('img/fav-icon.png')}}" type="image/x-icon"/>
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/all.css')}}" rel="stylesheet">
    @yield('styles')
</head>
<body>

<header class="header_menu_area">
    <nav class="navbar navbar-expand-lg  navbar-default">
        <a class="navbar-brand" href="{{route('home')}}"><strong>MCC</strong>Dating</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse main_nav" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="{{ Route::getCurrentRoute()->uri() == '/' ? 'active' : ''}}"><a
                        href="{{route('home')}}">Home</a></li>
                @auth
                    <li class="{{ Route::getCurrentRoute()->uri() == 'find/my/matches' ? 'active' : ''}}"><a
                            href="{{route('find_my_matches')}}">Find My Match</a></li>
                    <li class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth()->user()->name}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('my_matches')}}"><i
                                    class="fa fa-heart"></i>Matches</a>
                            <a class="dropdown-item" href="{{route('user_profile', auth()->user()->username)}}"><i
                                    class="fa fa-user"></i>Profile</a>
                            <a class="dropdown-item" href="{{route('my_settings')}}"><i
                                    class="fa fa-cogs"></i>Settings</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="fa fa-sign-out"></i>Logout</a>
                        </div>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <li class="{{ Route::getCurrentRoute()->uri() == '/login' ? 'active' : ''}}"><a
                            href="{{route('login')}}"><i class="fa fa-key"></i>Login</a></li>
                    <li class="{{ Route::getCurrentRoute()->uri() == '/register' ? 'active' : ''}}"><a
                            href="{{route('register')}}"><i class="fa fa-user-plus"></i>Registration</a></li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
