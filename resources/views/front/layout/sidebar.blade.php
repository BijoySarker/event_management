<ul class="list-group list-group-flush">
    <li class="list-group-item {{ Route::is('user_dashboard') ? 'active-item' : '' }}"><a href="{{ route('user_dashboard') }}">Dashboard</a></li>
    <li class="list-group-item"><a href="user-tickets.html">My Tickets</a></li>
    <li class="list-group-item"><a href="user-messages.html">Messages</a></li>
    <li class="list-group-item {{ Route::is('user_profile') ? 'active-item' : '' }}"><a href="{{ route('user_profile') }}">Profile</a></li>
    <li class="list-group-item"><a href="{{ route('logout') }}">Logout</a></li>
</ul>
