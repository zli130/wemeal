<nav class="navbar has-shadow">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item" href="{{route('welcome')}}">
                <img src="{{asset('images/_webs/wemeal-logo-sm.png')}}" alt="WeMeal Logo">
            </a>
            <a href="#" class="nav-item is-tab is-hidden-mobile m-l-10">Groups</a>
        </div>
        <div class="nav-right" style="overflow: visible;">
            @if (Auth::guest())
                <a href="{{route('login')}}" class="nav-item is-tab">Login</a>
                <a href="{{route('register')}}" class="nav-item is-tab">Join WeMeal</a>
            @else

                <div class="navbar-item has-dropdown is-hoverable is-aligned-right">
                    <a class="navbar-link  is-active" href="/documentation/overview/start/">
                        Hey {{Auth::user()->name}}
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item " href="#">
                            Profile
                        </a>
                        <a class="navbar-item " href="#">
                            Notifications
                        </a>
                        <a class="navbar-item " href="{{route('manage.dashboard')}}">
                            Management
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
