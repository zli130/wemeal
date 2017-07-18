<nav class="nav has-shadow manage-nav">
  <div class="container">
    <div class="nav-left">
      <a class="nav-item is-tab is-hidden-mobile m-l-10">Groups</a>
      <a class="nav-item is-tab is-hidden-mobile" href="{{route('manage.dashboard')}}">Manage</a>
    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu" style="overflow: visible">
        <!-- <a class="nav-item is-tab is-hidden-mobile m-l-10">Groups</a>
        <a class="nav-item is-tab is-hidden-mobile">Manage</a> -->
      @if (Auth::guest())
        <a href="{{route('login')}}" class="nav-item is-tab">Login</a>
        <a href="{{route('register')}}" class="nav-item is-tab">Join Us</a>
      @else
        <button class="dropdown is-aligned-right nav-item is-tab" >
          Hey {{ Auth::user()->name }}
          <ul class="dropdown-menu" style="overflow: visible;">
            <li><a href="#">
                  <span class="icon">
                    <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                  </span>Profile
                </a>
            </li>
            <li><a href="#">
                  <span class="icon">
                    <i class="fa fa-fw fa-bell m-r-5"></i>
                  </span>Notifications
                </a>
            </li>
            <li><a href="{{route('manage.dashboard')}}">
                  <span class="icon">
                    <i class="fa fa-fw fa-cog m-r-5"></i>
                  </span>Manage
                </a>
            </li>
            <li class="seperator"></li>
            <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                  <span class="icon">
                    <i class="fa fa-fw fa-sign-out m-r-5"></i>
                  </span>
                  Logout
                </a>
                @include('_includes.forms.logout')
            </li>
          </ul>
        </button>
      @endif
    </div>
  </div>
</nav>
<!-- <nav class="navbar has-shadow">
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
                </div>
            @endif
        </div>
    </div>
</nav> -->
