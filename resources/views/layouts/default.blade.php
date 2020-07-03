<!doctype html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <a class="navbar-brand" href="{{ action("HomeController@index") }}">SkyShop</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item {{ Request::is("/") ? 'active' : ''}}">
                        <a class="nav-link" href="{{ action("HomeController@index") }}">Strona główna</a>
                    </li>
                    <li class="nav-item {{ Request::is("products*") ? 'active' : ''}}">
                        <a class="nav-link" href="{{ action("HomeController@products") }}">Produkty</a>
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0">
                    @guest
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user mr-2" aria-hidden="true"></i>Zaloguj się</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-key mr-2" aria-hidden="true"></i>Zarejestruj się</a>
                        </li>
                    @else
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-shopping-cart mr-2" aria-hidden="true"></i>Twój koszyk</a>
                        </li>    
                        <li class="nav-item active">
                            <form class="form-inline" method="POST" action="{{ route("logout") }}">
                                @csrf
                                <button type="submit" class="btn btn-primary"><i class="fa fa-key" aria-hidden="true"></i> Wyloguj się</button>
                            </form>
                        </li>
                    @endguest
                </ul>                
            </div>
        </nav>
    </div>
    @yield('content')
</body>
</html>