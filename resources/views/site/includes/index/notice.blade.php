<div class="col-md-4">
    <div class="card kanunTabList">
        <ul class="nav nav-tabs" id="kanunTab" role="tablist">
            @for($i= 5; $i < 10; $i++) @if(isset($data['category'][$i])) <li class="nav-item">
                <a class="nav-link @if($i == 5) active @endif" id="{{$data['category'][$i]->name}}-tab" data-toggle="tab" href="#{{$data['category'][$i]->name}}" role="tab" aria-controls="{{$data['category'][$i]->name}}" aria-selected="true">{{$data['category'][$i]->category_name}}</a>
                </li>
                @endif
                @endfor
        </ul>
        <div class="tab-content" id="kanunTabContent">
            <!-- first -->
            @if(isset($data['category'][5]))
            <div class="tab-pane fade show active" id="{{ $data['category'][5]->name }}" role="tabpanel" aria-labelledby="{{ $data['category'][5]->name }}-tab">
                <ul class="demo" style="padding:0;">
                    @if(isset($data['cat_post_'.$data['category'][5]->name]))
                    @foreach($data['cat_post_'.$data['category'][5]->name] as $row)
                    @if(Route::has('site.post.show'))
                    <li>
                        <div class="media clearfix">
                            <div class="float-left mr-2">
                                <i class="fa fa-paperclip fa-1x" style="color:#dc3545;" aria-hidden="true"></i>
                            </div>
                            <div class="news-grid-info-bottom-text">
                                <a href="{{ route('site.post.show', $row->post_unique_id) }}">{{ mb_strimwidth($row->title, 0, 150, "...") }}</a>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                    @endif

                </ul>
                @if(isset($data['category'][5]))
                @if(Route::has('site.category.show'))
                <div class="float-left">
                    <a href="{{route('site.category.show', $data['category'][5]->id)}}">
                        <button class="btn btn-sm blue-gradient btn-rounded">@if($data['lang'] == 1) View All @else सबै
                            हेर्नुस @endif</button>
                    </a>
                </div>
                @endif
                @endif
            </div>
            @endif
            <!-- second -->
            @if(isset($data['category'][6]))
            <div class="tab-pane fade" id="{{ $data['category'][6]->name }}" role="tabpanel" aria-labelledby="two-tab">
                <ul class="demo" style="padding:0;">
                    @if(isset($data['cat_post_'.$data['category'][6]->name]))
                    @foreach($data['cat_post_'.$data['category'][6]->name] as $row)
                    @if(Route::has('site.post.show'))
                    <li>
                        <div class="media clearfix">
                            <div class="float-left mr-2">
                                <i class="fa fa-paperclip fa-1x" style="color:#dc3545;" aria-hidden="true"></i>
                            </div>
                            <div class="news-grid-info-bottom-text">
                                <a href="{{ route('site.post.show', $row->post_unique_id) }}">{{ mb_strimwidth($row->title, 0, 150, "...") }}</a>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                @if(isset($data['category'][6]))
                @if(Route::has('site.category.show'))
                <div class="float-left">
                    <a href="{{route('site.category.show', $data['category'][6]->id)}}">
                        <button class="btn btn-sm blue-gradient btn-rounded">@if($data['lang'] == 1) View All @else सबै
                            हेर्नुस @endif</button>
                    </a>
                </div>
                @endif
                @endif
            </div>
            @endif
            <!-- third -->
            @if(isset($data['category'][7]))
            <div class="tab-pane fade" id="{{ $data['category'][7]->name }}" role="tabpanel" aria-labelledby="three-tab">
                <ul class="demo" style="padding:0;">
                    @if(isset($data['cat_post_'.$data['category'][7]->name]))
                    @foreach($data['cat_post_'.$data['category'][7]->name] as $row)
                    @if(Route::has('site.post.show'))
                    <li>
                        <div class="media clearfix">
                            <div class="float-left mr-2">
                                <i class="fa fa-paperclip fa-1x" style="color:#dc3545;" aria-hidden="true"></i>
                            </div>
                            <div class="news-grid-info-bottom-text">
                                <a href="{{ route('site.post.show', $row->post_unique_id) }}">{{ mb_strimwidth($row->title, 0, 150, "...") }}</a>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                @if(isset($data['category'][7]))
                @if(Route::has('site.category.show'))
                <div class="float-left">
                    <a href="{{route('site.category.show',$data['category'][7]->id)}}">
                        <button class="btn btn-sm blue-gradient btn-rounded">@if($data['lang'] == 1) View All @else सबै
                            हेर्नुस @endif</button>
                    </a>
                </div>
                @endif
                @endif
            </div>
            @endif

            <!-- four -->
            @if(isset($data['category'][8]))
            <div class="tab-pane fade" id="{{ $data['category'][8]->name }}" role="tabpanel" aria-labelledby="four-tab">
                <ul class="demo" style="padding:0;">
                    @if(isset($data['cat_post_'.$data['category'][8]->name]))
                    @foreach($data['cat_post_'.$data['category'][8]->name] as $row)
                    @if(Route::has('site.post.show'))
                    <li>
                        <div class="media clearfix">
                            <div class="float-left mr-2">
                                <i class="fa fa-paperclip fa-1x" style="color:#dc3545;" aria-hidden="true"></i>
                            </div>
                            <div class="news-grid-info-bottom-text">
                                <a href="{{ route('site.post.show', $row->post_unique_id) }}">{{ mb_strimwidth($row->title, 0, 150, "...") }}</a>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                @if(isset($data['category'][8]))
                @if(Route::has('site.category.show'))
                <div class="float-left">
                    <a href="{{route('site.category.show', $data['category'][8]->id)}}">
                        <button class="btn btn-sm blue-gradient btn-rounded">@if($data['lang'] == 1) View All @else सबै
                            हेर्नुस @endif</button>
                    </a>
                </div>
                @endif
                @endif
            </div>
            @endif
            <!-- five -->
            @if(isset($data['category'][9]))
            <div class="tab-pane fade" id="{{ $data['category'][9]->name }}" role="tabpanel" aria-labelledby="five-tab">
                <ul class="demo" style="padding:0;">
                    @if(isset($data['cat_post_'.$data['category'][9]->name]))
                    @foreach($data['cat_post_'.$data['category'][9]->name] as $row)
                    @if(Route::has('site.post.show'))
                    <li>
                        <div class="media clearfix">
                            <div class="float-left mr-2">
                                <i class="fa fa-paperclip fa-1x" style="color:#dc3545;" aria-hidden="true"></i>
                            </div>
                            <div class="news-grid-info-bottom-text">
                                <a href="{{ route('site.post.show', $row->post_unique_id) }}">{{ mb_strimwidth($row->title, 0, 150, "...") }}</a>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
                @if(isset($data['category'][9]))
                @if(Route::has('site.category.show'))
                <div class="float-left">
                    <a href="{{route('site.category.show', $data['category'][9]->id)}}">
                        <button class="btn btn-sm blue-gradient btn-rounded">@if($data['lang'] == 1) View All @else सबै
                            हेर्नुस @endif</button>
                    </a>
                </div>
                @endif
                @endif
            </div>
            @endif
        </div>
    </div>
</div>