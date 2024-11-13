<nav class="navbar navbar-expand-lg sticky-top py-2">
    <div class="container-fluid">

        <button class="navbar-toggler nav-toggler-custom" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  " id="navbarTogglerDemo02">
            <ul
                class="navbar-nav mx-auto   mb-2 mb-lg-0 d-flex justify-content-end align-items-center  custom-navbar">

             
                @if(isset($data['menu']))
                <ul class="navbar-nav">
                    @foreach($data['menu'] as $row)
                        <li class="nav-item @if(array_key_exists('child', $row)) dropdown @endif">
                            <a class="nav-link @if(array_key_exists('child', $row)) dropdown-toggle @endif" 
                               href="{{ url($row['url']) }}" 
                               target="{{ $row['target'] }}" 
                               @if(array_key_exists('child', $row)) id="navbarDropdown{{ $loop->index }}" role="button" data-bs-toggle="dropdown" aria-expanded="false" @endif
                               style="color: #fff;">
                               {{ $row['menu_name'] }}
                            </a>
                            
                            @if(array_key_exists('child', $row))
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown{{ $loop->index }}">
                                    @foreach($row['child'] as $child)
                                        <li class="@if(array_key_exists('child', $child)) dropdown-submenu @endif">
                                            <a class="dropdown-item @if(array_key_exists('child', $child)) dropdown-toggle @endif" 
                                               href="{{ url($child['url']) }}" 
                                               target="{{ $child['target'] }}"
                                               @if(array_key_exists('child', $child)) id="navbarDropdownSub{{ $loop->parent->index }}{{ $loop->index }}" role="button" data-bs-toggle="dropdown" aria-expanded="false" @endif>
                                                {{ $child['menu_name'] }}
                                            </a>
                                            
                                            @if(array_key_exists('child', $child))
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownSub{{ $loop->parent->index }}{{ $loop->index }}">
                                                    @foreach($child['child'] as $subchild)
                                                        <li><a class="dropdown-item" href="{{ url($subchild['url']) }}" target="{{ $subchild['target'] }}">{{ $subchild['menu_name'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
         
                {{-- @if(isset($data['others']) && count($data['others']) > 0)
                <li class="nav-item dropdown dropdown-others">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ $data['others_label'] ?? 'अन्य' }}
                    </a>
                    <ul class="dropdown-menu bg-light">
                        <div class="container-fluid">
                            <div class="row d-flex flex-wrap">
                                @foreach(array_chunk($data['others'], 10) as $chunk)
                                    <div class="col line-1 ps-1">
                                        @foreach($chunk as $menu)
                                            <li><a class="dropdown-item" href="{{ $menu['url'] }}">{{ $menu['name'] }}</a></li>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </ul>
                </li>
            @endif --}}
            </ul>
        </div>
    </div>
</nav>