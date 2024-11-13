<header class="header white-bg">
        <div class="sidebar-toggle-box">
            <i class="fa fa-bars"></i>
        </div>
      <!--logo start-->
      <a href="{{ URL::route('dcms.dashboard')}}" class="logo"><span>@if(isset($all_view['setting']->site_name)) {{ $all_view['setting']->site_name }} @endif</span></a>
      <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <li class="">
                    <a href="{{ route('site.index') }}" target="_blank">
                        <i class="fa fa-home"></i>
                        <span class="">{{__('View Site')}}</span>
                    </a>
                </li>
                @if(Route::has('dcms.message.index'))
                <!-- inbox dropdown start-->
                <li class="">
                    <a href="{{ URL::route('dcms.message.index') }}">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-important">@if(isset($all_view['contact_count'])){{ $all_view['contact_count'] }} @endif</span>
                    </a>
                </li>
                @endif
                <!-- inbox dropdown end -->
                {{-- @if(Route::has('dcms.file.index'))
                <!-- inbox dropdown start-->
                <li class="">
                    <a href="{{ URL::route('dcms.file.index') }}">
                        <i class="fa fa-file-o"></i>
                        <span class="badge bg-important">@if(isset($all_view['file_count'])){{ $all_view['file_count'] }} @endif</span>
                    </a>
                </li>
                <!-- inbox dropdown end -->
                @endif --}}
                {{-- @if(Route::has('dcms.gallery.index')) --}}
                <!-- inbox dropdown start-->
                {{-- <li class="">
                    <a href="{{ URL::route('dcms.gallery.index') }}">
                        <i class="fa fa-picture-o"></i>
                        <span class="badge bg-important">@if(isset($all_view['photo_count'])){{ $all_view['photo_count'] }} @endif</span>
                    </a>
                </li> --}}
                <!-- inbox dropdown end -->
                {{-- @endif --}}
                <li class="">
                    @include('dcms.includes.breadcrumb')
                </li>
            </ul>
        </div>

      <div class="top-nav ">
          <!--search & user info start-->
          <ul class="nav pull-right top-menu">
              {{-- <li>
                  <input type="text" class="form-control search" placeholder="Search">
              </li> --}}

              {{-- language change  --}}
              <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="username"><?php use App\Http\Controllers\Dcms\HomeController; echo HomeController::langName(); ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <div class="log-arrow-up"></div>
                        @if(isset($all_view['lang']))
                            @foreach($all_view['lang'] as $lang)
                                <li><a href="{{ route('dcms.swap_language', ['lang_id'=>$lang->id])}}">&nbsp;{{ $lang->name }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>
              <!-- user login dropdown start-->
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      @if(Auth::user()->avatar)
                      <img alt="" src="{{ asset(Auth::user()->avatar) }}" height="29" width="29">
                      @else
                      <img alt="" src="{{ asset('assets/dcms/img/lochan.png') }}" height="29" width="29">
                      @endif
                      <span class="username">{{ Auth::user()->name }}</span>
                      <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu extended logout">
                      <div class="log-arrow-up"></div>
                      @if(route::has('dcms.user_profile.show'))
                      <li><a href="{{ route('dcms.user_profile.show') }}"><i class=" fa fa-user"></i>Profile</a></li>
                      @endif
                      {{-- <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li> --}}
                      {{-- <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li> --}}
                      <li><a href="{{ route('logout') }}"><i class="fa fa-key"></i> Log Out</a></li>
                  </ul>
              </li>
              <!-- user login dropdown end -->
          </ul>
          <!--search & user info end-->
      </div>
  </header>
