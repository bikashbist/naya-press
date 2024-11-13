<div class="altranative-header ul-li-block">
    <div id="menu-container">
        <div class="menu-wrapper">
            <div class="row">
                <button type="button" class="alt-menu-btn float-left">
                    <span class="hamburger-menu"></span>
                </button>
                <div class="logo-area">
                    @if(isset($all_view['common']->logo))
                        @if(Route::has('site.index'))
                            <a href="{{ route('site.index') }}">
                                <img src="{{ asset($all_view['common']->logo) }}" alt="Logo_not_found" style="height: 30px;">
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <ul class="menu-list accordion active" style="left: 0%;">
            @if(isset($data['menu']))
            @foreach($data['menu'] as $row)
                @if(array_key_exists('child', $row))
                    <!-- about - start -->
                    <li class="card">
                        <div class="card-header" id="heading1">
                            <!-- <button class="menu-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"
                                aria-controls="collapse1">
                                About Us
                            </button> -->
                            <button class="menu-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"
                                aria-controls="collapse1">
                                {{ $row['menu_name'] }}
                            </button>
                        </div>
                        <ul id="collapse1" class="submenu collapse" aria-labelledby="heading1" data-parent="#accordion"
                            style="">
                            @foreach($row['child'] as $child)
                                <li><a href="{{ url($child['url']) }}">{{ $child['menu_name'] }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <!-- about - end -->
                @else
                    <li class="card">
                        <!-- <a class="menu-link" href="index.html">Home</a> -->
                        <a class="menu-link" href="{{ url($row['url']) }}" target="{{ $row['target'] }}">{{ $row['menu_name'] }}</a>
                    </li>
                @endif
            @endforeach
            @endif
        </ul>

    </div>
</div>
