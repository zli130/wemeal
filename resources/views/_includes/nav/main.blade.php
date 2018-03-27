<nav class="navbar is-primary">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{route('manage.dashboard')}}">
      <img src="{{asset('images/_webs/wemeal-logo.png')}}" alt="WeMeal">
    </a>
  </div>
  <div class="navbar-start">
    <a class="navbar-item" href="{{route('manage.dashboard')}}">Manage</a>
  </div>
  <div class="navbar-end">
    @if (Auth::guest())
      <a class="navbar-item" href="{{route('login')}}">Login</a>
      <a class="navbar-item" href="{{route('register')}}">Join Us</a>
    @else 
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
           Hey {{ Auth::user()->name }}
        </a>
        <div class="navbar-dropdown is-right">
          <a class="navbar-item">
            Profile
          </a>
          <a class="navbar-item">
            Notifications
          </a>
          <a class="navbar-item" href="{{route('manage.dashboard')}}">
            Manage
          </a>
          <hr class="navbar-divider">
          <div class="navbar-item">
            <a href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <span class="icon">
                  <i class="fa fa-fw fa-sign-out m-r-5"></i>
                </span>
                Logout
              
              </a>
              @include('_includes.forms.logout')
          </div>
        </div>
      </div>
    @endif
  </div>
</nav>