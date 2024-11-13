<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            @if(Route::has('dcms.dashboard'))
            <li><a class="{{ ($_panel == 'Home') ? 'active' : '' }}" href="{{ URL::route('dcms.dashboard') }}"><i class="fa fa-dashboard"></i><span>{{__('Dashboard')}}</span></a></li>
            @endif
            @if( Route::has('dcms.institute.get_page'))
            <li><a class="{{ ($_panel == 'Institute') ? 'active' : '' }}" href="{{ URL::route('dcms.institute.get_page') }}" ><i class="fa fa-file-o"></i><span>{{__('Institute')}}</span></a></li>
            @endif
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>