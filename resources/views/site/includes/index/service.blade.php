{{-- service section start --}}
@if(isset($data['service']))
<div class="service-panel">
    <div class="container">
        @if(isset($data['featured_pages'][2]))
        <div class="main-title hero-panel-title">
            <h2>{{ $data['featured_pages'][2]->title }}</h2>
            <div class="center-intro-text">
                <p>{!! mb_strimwidth($data['featured_pages'][2]->content, 0, 700, "...") !!}</p>
            </div>
        </div>
        @endif

        <div class="services-carousel">
            @foreach($data['service'] as $row)
            <div class="service-items">
                <div class="service-inner">
                    <div class="vision-icon">
                        <i class="fa {{ $row->icon }}" style="color:{{ $row->color }};font-size:30px;"></i>
                    </div>
                    <a href="{{ $row->link }}" target="_blank">
                        <div class="vision-caption">
                            <h6>{{ $row->title }}</h6>
                            <p>{{ $row->description }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end section -->
@endif