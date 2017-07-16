<div class="side-menu m-t-3 m-l-10 p-l-10">
    <aside class="menu">
        <p class="menu-label">
            <a href="{{route('welcome')}}">
                <img src="{{asset('images/_webs/wemeal-logo-sm.png')}}" alt="WeMeal Logo">
            </a>
        </p>

        <p class="menu-label">
            General
        </p>

        <ul class="menu-list">
            <li><a href="{{route('manage.dashboard')}}">Dashboard</a></li>
        </ul>

        <p class="menu-label">
            Administration
        </p>

        <ul class="menu-list">
            <li><a href="#">Manage Users</a></li>
            <li><a href="#">Roles &amp; Permissions</a></li>
        </ul>

        <p class="menu-label">
            Settings
        </p>

        <ul class="menu-list">
            <li><a href="#">Profile</a></li>
            <li><a href="#">Notifications</a></li>
            <li><a href="#">Logout</a></li>
            <li><span>Hey {{Auth::user()->name}}</span></li>
        </ul>

    </aside>
</div>
