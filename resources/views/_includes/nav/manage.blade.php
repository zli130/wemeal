
<div class="side-menu p-l-10">
  <aside class="menu m-t-30">
      <ul class="menu-list">
        <li>
            <a class="nav-item is-paddingless" href="{{route('manage.dashboard')}}">
              <img src="{{asset('images/_webs/wemeal-logo-sm.png')}}" alt="WeMeal">
            </a>
        </li>
      </ul>
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li><a href="{{route('manage.dashboard')}}">Dashboard</a></li>
    </ul>
    <p class="menu-label">
      Promotions
    </p>
    <ul class="menu-list">
      <li><a href="{{route('promotions.index')}}">Promotions</a></li>
    </ul>
    <p class="menu-label">
      Administration
    </p>
    <ul class="menu-list">
      <li><a href="{{route('users.index')}}">Manage Users</a></li>
      <li><a href="#">Roles &amp; Permissions</a></li>
    </ul>

    <p class="menu-label">
      Providers
    </p>
    <ul class="menu-list">
        <li><a href="{{route('providers.index')}}">Manage Providers</a></li>
    </ul>
  </aside>
</div>
