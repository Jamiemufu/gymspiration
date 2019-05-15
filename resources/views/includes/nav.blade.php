<!-- nav sidebar -->
<nav class="nav-container">
    <ul class="nav">

        <li class="nav-items">
            <a class="logo" href="#">
                <img src="../images/sidebar_logo.png" alt="">
            </a>
        </li>

        @if (Auth::user())

            <li class="nav-items">
                <a href="#">
                    <i class="fas fa-home"></i>Home
                </a>
            </li>

            <li class="nav-items">
                <a href="#">
                    <i class="fas fa-home"></i>
                    Search
                </a>
            </li>

            <li class="nav-items">
                <a href="#">
                    <i class="fas fa-home"></i>Map
                </a>
            </li>

            <li class="nav-items">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-home"></i>Logout                                            
                </a>
                    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>            
            </li>
        @else

            <li class="nav-items">
                <a href="#">
                    <i class="fas fa-home"></i>Login
                </a>
            </li>

        @endif
        

        

        

    </ul>
</nav>