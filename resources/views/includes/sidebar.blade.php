<!-- nav sidebar -->
<nav class="nav-container" id="nav-container">
    <ul class="nav">
                  
        <div class="sidebar-toggle-open" id="toggle-open">
            <i class="fas fa-bars"></i>
        </div>     

        <div class="sidebar-toggle-close" id="toggle-close">
            <i class="fas fa-times"></i>
        </div>    

        <!-- logo to show on all -->
        <li class="nav-items">
            <a class="sidebar-logo">
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
                    <i class="fas fa-home"></i><span>Home</span>
                </a>
            </li>

        <!-- user has role -->
        @if (Auth::user() && Auth::user()->hasRole('admin'))

            <li class="nav-items">
                <a href="{{ route('dashboard')}}" id="admin">
                    <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
                </a>
            </li>
            
            <li class="nav-items">
                <div>
                    <a class="dropdown" id="dropdown">
                        <i class="fas fa-users-cog"></i></span>Member Management</span><i class="fas fa-caret-down"></i>
                    </a>
                </div>

                <div class="dropdown-content" id="myDropdown">
                    <a href="{{ route('viewMember') }}" id="view">
                        <i class="fas fa-users"></i><span>View Members</span>
                    </a>

                    <a href="{{ route('createMember') }}" id="create">
                        <i class="fas fa-user-plus"></i></span>Create Member</span>
                    </a>                   
                    
                </div>
            </li>

            <li class="nav-items">
                <a href="{{ route('reports') }}" id="reports">
                    <i class="fas fa-paperclip"></i><span>Reports</span>
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