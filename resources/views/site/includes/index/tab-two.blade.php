<div class="educational-panel">
    <div class="container">
        @if(isset($data['featured_pages'][7]))
        <div class="main-title hero-panel-title">
            <!--<h2>{{ $data['featured_pages'][7]->title }}</h2>-->
            <!--<div class="center-intro-text">-->
            <!--        <p>{!! mb_strimwidth($data['featured_pages'][7]->content, 0, 700, "...") !!}</p>-->
            <!--</div>-->
        </div>
        @endif
        <div class="vtabnab-panel">
            <div class="tab-cover">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                @for($i= 4; $i < 8; $i++)
                @if(isset($data['category'][$i]))
                <li class="nav-item">
                    <a class="nav-link @if($i == 4) active @endif" id="{{$data['category'][$i]->slug}}-tab" data-toggle="tab" href="#{{$data['category'][$i]->slug}}" role="tab"
                        aria-controls="{{$data['category'][$i]->slug}}" aria-selected="@if($i == 0) true @else false @endif">{{$data['category'][$i]->category_name}}</a>
                </li>
                @endif
                @endfor
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"-->
                <!--        aria-controls="profile" aria-selected="false">Album</a>-->
                <!--</li>-->
            </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                @for($i= 4; $i < 8; $i++)
                <div class="tab-pane fade  @if($i==4) show active @endif" id="{{$data['category'][$i]->slug}}" role="tabpanel" aria-labelledby="{{$data['category'][$i]->slug}}-tab">
                    <div class="news-listings">
                        <ul>
                            @if(isset($data['cat_post'][$i]))
                            @foreach($data['cat_post'][$i] as $row)
                            <li>
                                <div class="news-left">
                                @if(isset($row->thumbnail))
                                    <img src="{{asset($row->thumbnail)}}" height="100" widht="100">
                                @elseif(isset($all_view['setting']->logo))
                                    <img src="{{ asset($all_view['setting']->logo) }}" height="100" widht="100">
                                @endif
                                </div>
                                <div class="news-desc-right">
                                    @if(route::has('site.post.show'))
                                    <h3>
                                        <a href="{{ route('site.post.show', $row->post_unique_id) }}">{{ $row->title }}</a>
                                    </h3>
                                    @endif
                                    <span class="date">{{ $row->created_at }}</span>
                                </div>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    @if(isset($data['category'][$i]))
                    @if(Route::has('site.category.show'))
                    <div class="view-all-news">
                        <a href="{{ route('site.category.show', $data['category'][$i]->id) }}" class="button button--primary button-small">View All</a>
                    </div>
                    @endif
                    @endif
                </div>
                @endfor
            {{-- album --}}
            <!--<div class="tab-pane fade" id="profile" role="tabpanel"-->
            <!--    aria-labelledby="profile-tab">-->
            <!--    <div class="news-listings news-listings--grid">-->
            <!--        <ul>-->
            <!--            @if(isset($data['album']))-->
            <!--            @foreach($data['album'] as $row)-->
            <!--            <li>-->
            <!--            @if(Route::has('site.album.show'))-->
            <!--                <a href="{{ route('site.album.show', $row->id ) }}">-->
            <!--                    <div class="news-left">-->
            <!--                    @if($row->cover_image)-->
            <!--                        <img src="{{ $row->cover_image }}">-->
            <!--                    @endif-->
            <!--                    </div>-->
            <!--                    <div class="news-desc-right">-->
            <!--                        <h3>{{ $row->title }}</h3>-->
            <!--                        <span class="date">{{ $row->created_at }}</span>-->
            <!--                    </div>-->
            <!--                </a>-->
            <!--                @endif-->
            <!--            </li>-->
            <!--            @endforeach-->
            <!--            @endif-->
            <!--        </ul>-->
            <!--    </div>-->
            <!--    @if(Route::has('site.album'))-->
            <!--    <div class="view-all-news">-->
            <!--        <a href="{{ Route('site.album') }}" class="button button--primary button--small">View All</a>-->
            <!--    </div>-->
            <!--    @endif-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </div>
</div>
