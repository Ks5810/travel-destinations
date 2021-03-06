<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
          href="/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="/images/icons/favicon-16x16.png">

    <!-- maifest -->
    <link rel="manifest" href="/manifest.webmanifest">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script defer src="{{ asset('js/app.js') }}"></script>
    <script async
            src="https://maps.googleapis.com/maps/api/js?v=weekly&key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=geometry,drawing,places"
    ></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito"
          rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div>
    <nav class="header navbar navbar-default navbar-fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <b>Travel Destinations</b>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <li class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <ul class="nav flex-row">
                            <li class="navbar-text">
                                Hi, {{ Auth::user()->name }}
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}"
                                      method="POST">
                                    @csrf
                                    <input
                                            class="btn btn-link"
                                            type="submit"
                                            name="logout"
                                            value="Logout"/>
                                </form>
                            </li>
                        </ul>
                    @endguest
                </ul>
        </div>
    </nav>
</div>

<div id="app" class="content">
    @yield('content')
</div>

<div>
    @yield('scripts')
</div>

</body>
</html>
