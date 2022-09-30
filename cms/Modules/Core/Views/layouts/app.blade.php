<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js')}}"></script>
    <script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js')}}"></script>
   <style>
       .wrapper {
           margin: 0 auto;
           border: 1px solid #678c89;
       }
       .todo-item {
           list-style-type: none;
           padding: 10px 15px;
           border-bottom: 1px solid #678c89;
       }

       .done-todo {
           background: #00ee00;
       }

       .header-container {
           background-color: #678c89;
           color: #fff;
           padding: 10px 15px;
       }
       .header-title {
           font-size: 25px;
           line-height: 1.447em;
           margin: 0px;
       }
       .btn-style {
           color: #fcfcfc;
           border: 1px solid #333;
           padding: 4px 8px;
           margin-left: 2px;
           border-radius: 100%;
           cursor: pointer;
           float: right;
           outline: none;
       }
       .btn-del {
           background-color: #ff0033;
           margin-right: 15px;
       }

       .btn-fix {
           background-color: #00ee00;
       }
       .form-container {
           display: flex;
           width: 100%;
       }
       .input-text {
           flex: 8;
           font-size: 14px;
           padding: 6px 15px;
           background: rgba(103, 140, 137, 0.65);
           border: none;
           color: #fff;
           outline: none;
           font-weight: 400;
           width: 80%;
       }
       .input-text::placeholder {
           color: #fff;
           opacity: 0.8;
       }
       .input-submit {
           flex: 2;
           border: none;
           background: #ff0033;
           color: #fcfcfc;
           text-transform: uppercase;
           cursor: pointer;
           font-weight: 600;
           width: 20%;
           outline: none;
           border: 1px solid #ff0033;
       }
   </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <a style="margin-right: 15px" href="{{route('todolist', ['user_id' => \Illuminate\Support\Facades\Auth::id()])}}">My TodosList</a>
                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                <a href="{{route('todolist-admin')}}">Admin TodosList</a>
                            @endif
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
