<div class="col-md-4">
    <!-- Title -->
    <h5 class="card-header primary-color-dark text-center white-text">@if($data['lang'] == 1)  Informative videos @else जानकारी मूलक भिडियोहरू  @endif</h5>
    <!-- Example 2 -->
    <div class="card example-2">
        <div class="card-body">
            <div class="row">
                @if(isset($data['video']))
                @foreach($data['video'] as $row)
                <div class="col-md-12">                    
                    <iframe style="margin-bottom: 5px;" width="100%" height="190" src="https://www.youtube.com/embed/<?php echo $row->video_id; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <h6 style="margin-bottom: 25px; text-align: center;">
                        {{ $row->video_title}}
                    </h6>
                </div>
                @endforeach
                @endif
                @if(Route::has('site.video'))
                <div class="col-md-12 float-left">
                    <a href="{{ route('site.video')}}">
                        <button class="btn btn-sm blue-gradient btn-rounded"> @if($data['lang'] == 1)  View All @else सबै हेर्नुस  @endif</button>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Example 2 -->
</div>