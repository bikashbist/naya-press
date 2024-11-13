<aside class="profile-nav col-lg-3">
    <section class="panel">
        <div class="user-heading round">
            @if(Auth::user()->avatar)
                <a href="#">
                    <img alt="" src="{{ asset(Auth::user()->avatar) }}" >
                </a>
            @else 
                <a href="#">
                    <img alt="" src="{{ asset('assets/dcms/img/lochan.png') }}" >
                </a>
            @endif
            <h1>{{ Auth::user()->name }}</h1>
            <p>{{ Auth::user()->email }}</p>
        </div>

        <ul class="nav nav-pills nav-stacked">
            @if(route::has('dcms.user_profile.show'))
            <li class="{{ (Route::current()->getName() == 'dcms.user_profile.show') ? 'active' : '' }}"><a href="{{ URL::route('dcms.user_profile.show') }}"> <i class="fa fa-user"></i> Profile</a></li>
            @endif
            <li class="{{ (Route::current()->getName() == 'dcms.user_profile.edit') ? 'active' : ''  }}"><a href="{{ URL::route('dcms.user_profile.edit') }}"> <i class="fa fa-edit"></i> Edit profile</a></li>
        </ul>

    </section>
</aside>