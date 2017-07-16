<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WeMeal</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="nav has-shadow">
            <div class="container">
                <div class="nav-left">
                    <a class="nav-item" href="{{route('welcome')}}">
                        <img src="{{asset('images/_webs/wemeal-logo-sm.png')}}" alt="WeMeal Logo">
                    </a>
                    <a href="#" class="nav-item is-tab is-hidden-mobile m-l-10">Restaurants</a>
                    <a href="#" class="nav-item is-tab is-hidden-mobile m-l-10">Meals</a>
                    <a href="#" class="nav-item is-tab is-hidden-mobile m-l-10">Groups</a>
                </div>
                <div class="nav-right" style="overflow: visible;">
                    @if (Auth::guest())
                        <a href="{{route('login')}}" class="nav-item is-tab">Login</a>
                        <a href="{{route('register')}}" class="nav-item is-tab">Join WeMeal</a>
                    @else

                        <div class="navbar-item has-dropdown is-hoverable is-aligned-right">
                            <a class="navbar-link  is-active" href="/documentation/overview/start/">
                                Hey John
                            </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item " href="#">
                                Profile
                            </a>
                            <a class="navbar-item " href="#">
                                Notifications
                            </a>
                            <a class="navbar-item " href="#">
                                Settings
                            </a>
                            <hr class="navbar-divider">
                            <div class="navbar-item">
                                <div>
                                    Logout
                                </div>
                            </div>
                        </div>
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
