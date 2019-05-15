<!-- nav sidebar -->
<nav class="nav-container">
    <ul class="nav">
        <!-- logo to show on all -->
        <li class="nav-items">
            <a class="logo" href="/">
                <img src="{{ asset('images/sidebar_logo.png') }}" alt="Gymspiration Logo">
            </a>
        </li>        
        
        <!-- if user autheticated -->
        @if (Auth::user())

            <li class="nav-items">
                <a class="username" href="#">
                    {{ Auth::user()->username }}
                </a>
            </li>

        @endif

            <li class="nav-items">
                <a href="/" id="home">
                    <i class="fas fa-home"></i>Home
                </a>
            </li>

        <!-- user has role -->
        @if (Auth::user() && Auth::user()->hasRole('admin'))

            <li class="nav-items">
                <a href="{{ route('admin')}}" id="admin">
                    <i class="fas fa-tachometer-alt"></i>Dashboard
                </a>
            </li>
            
            <li class="nav-items">
                <div>
                    <a class="dropdown" id="dropdown">
                        <i class="fas fa-users-cog"></i>Member Management<i class="fas fa-caret-down"></i>
                    </a>
                </div>
                <div class="dropdown-content" id="myDropdown">
                    <a href="{{ route('createUser') }}" id="create"><i class="fas fa-user-plus"></i>Create User</a>
                    <a href="#" id="edit"><i class="fas fa-user-tag"></i>Edit Users</a>
                    <a href="#" id="deleteUser"><i class="fas fa-user-times"></i>Delete User</a>
                </div>
            </li>

            <li class="nav-items">
                <a href="{{ route('reports') }}" id="reports">
                    <i class="fas fa-paperclip"></i>Reports
                </a>
            </li>

        @endif

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