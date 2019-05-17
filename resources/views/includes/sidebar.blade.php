<!-- nav sidebar -->
<nav class="nav-container" id="nav-container">
    <ul class="nav">
        {{-- toggles will show via js --}}
        {{-- open toggle icon --}}
        <div class="sidebar-toggle-open" id="toggle-open">
            <i class="fas fa-bars"></i>
        </div>
        {{-- close toggle icon --}}
        <div class="sidebar-toggle-close" id="toggle-close">
            <i class="fas fa-times"></i>
        </div>
        {{-- sidebar logo --}}
        <li class="nav-items">
            <a class="sidebar-logo">
                <img src="{{ asset('images/sidebar_logo.png') }}" alt="Gymspiration Logo">
            </a>
        </li>
        {{-- if authorised show username --}}
        @if (Auth::user())
            <li class="nav-items">
                <a class="username" href="#">
                    {{ Auth::user()->username }}
                </a>
            </li>
        @endif
        {{-- show for all --}}
            <li class="nav-items">
                <a href="/" id="home">
                    <i class="fas fa-home"></i><span>Home</span>
                </a>
            </li>
        {{-- admin only links --}}
        @if (Auth::user() && Auth::user()->hasRole('admin'))
            {{-- dashboard --}}
            <li class="nav-items">
                <a href="{{ route('dashboard') }}" id="admin">
                    <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
                </a>
            </li>
            {{-- member management --}}
            <li class="nav-items">
                {{-- dropdown via JS --}}
                <div>
                    <a class="dropdown" id="dropdown">
                        <i class="fas fa-users-cog"></i></span>Member Management</span><i class="fas fa-caret-down"></i>
                    </a>
                </div>
                {{-- drop down menu --}}
                <div class="dropdown-content" id="myDropdown">
                    <a href="{{ route('viewMember') }}" id="view">
                        <i class="fas fa-users"></i></span>Manage Members</span>
                    </a>
                    <a href="{{ route('createMember') }}" id="create">
                        <i class="fas fa-user-plus"></i></span>Create Member</span>
                    </a>
                </div>
            </li>
            {{-- reports --}}
            <li class="nav-items">
                <a href="{{ route('reports') }}" id="reports">
                    <i class="fas fa-paperclip"></i><span>Reports</span>
                </a>
            </li>
        @endif
        {{-- if authorised show logout else show login --}}
        @if (Auth::user())
            <li class="nav-items">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i><span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        @else
            <li class="nav-items">
                <a href="/login">
                    <i class="fas fa-sign-in-alt"></i>Login
                </a>
            </li>
        @endif
    </ul>
</nav>
