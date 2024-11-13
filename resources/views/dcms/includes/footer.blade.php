<footer class="site-footer">
        <div class="text-center">
            {{ date('Y') }} &copy; @if(isset($all_view['setting']->site_name)) {{ $all_view['setting']->site_name }} @endif. Page rendered in {{ date('s', $_SERVER['REQUEST_TIME_FLOAT']) }} Seconds.@if(isset(Auth::user()->last_login_at)) Your IP Address is {{ Auth::user()->last_login_ip }} & Login Time is {{ Auth::user()->last_login_at }}<strong>[{{ Auth::user()->last_login_at->diffForHumans() }}]</strong>@endif
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
</footer>
<!-- THIS DCMS Content Managment System is Dedicated To Deepmala Ranabhat -->
