
<header class="header blue-bg">
    <!--logo start-->
    <a href="{{ URL::route('dcms.dashboard')}}" class="logo">
        <img src="{{ asset('assets/dcms/img/tu_logo.png')}}" alt="" height="35" width="30"></span>
    </a>
    <!--logo end-->
    <div class="top-nav ">
        <ul class="nav pull-right top-menu">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}" style="color:#fff;">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}" style="color:#fff;">{{ __('Register') }}</a>
                </li>
            @endif
        @else
         <!-- user login dropdown start-->
         <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="username">{{ Auth::user()->name }}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li>
                    <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-key"></i> Log Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
        <!-- user login dropdown end -->
        @endguest
        </ul>
    </div>

</header>
