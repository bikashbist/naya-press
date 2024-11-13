<div class="row mt-3">
    <!-- Grid column -->
    <div class="col-md-10">
        <!--Nav Tab Panels -->
        <div class="tabs-list" >
            <!--Container -->
            <div>
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav md-pills nav-justified pills-primary mb-2" role="tablist">
                        @for($i= 0; $i < 4; $i++) 
                        @if(isset($data['category'][$i])) 
                        <li class="nav-item">
                            <a class="nav-link @if($i == 0) active @endif" data-toggle="tab" href="#{{$data['category'][$i]->name}}" role="tab">
                                <strong>{{$data['category'][$i]->category_name}}</strong>
                            </a>
                            </li>
                            @endif
                            @endfor


                    </ul>
                    <!-- Nav tabs -->

                    <!-- Tab panels -->
                    <div class="tab-content" style="text-align:justify; position:relative; height: 292px; overflow-y: auto;">
                        <!--Panel 1-->
                        @if(isset($data['category'][0]))
                        <div class="tab-pane active" id="{{ $data['category'][0]->name }}">
                            <div class="panel panel-default" style="padding:0; margin:0; background:none; border:none; box-shadow:none;">
                                <div class="panel-body" style="padding:0; margin:0; background:none; border:none; box-shadow:none; overflow:hidden;">
                                    <ul class="demo" style="padding:0;">
                                        @if(isset($data['cat_post_'.$data['category'][0]->name]))
                                        @foreach($data['cat_post_'.$data['category'][0]->name] as $row)
                                        @if(Route::has('site.post.show'))
                                        <?php
                                            $date = date('Y-m-d',strtotime('-7 days'));
                                        ?>
                                        <li>
                                            <div class="media clearfix">
                                                <div class="float-left mr-2">
                                                    <i class="fa fa-paperclip fa-1x" style="color:#dc3545;" aria-hidden="true"></i>
                                                </div>
                                                <div class="news-grid-info-bottom-text">
                                                    <a href="{{ route('site.post.show', $row->post_unique_id) }}">{{ mb_strimwidth($row->title, 0, 150, "...") }} <sup> <?php if ($row->created_at >=  $date) echo 'New'; false ?> </sup></a>
                                                </div>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                                @if(isset($data['category'][0]))
                                @if(Route::has('site.category.show'))
                                <div class="float-left">
                                    <a href="{{route('site.category.show', $data['category'][0]->id)}}">
                                        <button class="btn btn-sm blue-gradient btn-rounded">@if($data['lang'] == 1)  View All @else सबै हेर्नुस  @endif</button>
                                    </a>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                        @endif

                        @if(isset($data['category'][1]))
                        <div class="tab-pane" id="{{ $data['category'][1]->name }}">
                            <div class="panel panel-default" style="padding:0; margin:0; background:none; border:none; box-shadow:none;">
                                <div class="panel-body" style="padding:0; margin:0; background:none; border:none; box-shadow:none;overflow:hidden;">
                                    <ul class="list" style="padding:0; list-style: none;">
                                        @if(isset($data['cat_post_'.$data['category'][1]->name]))
                                        @foreach($data['cat_post_'.$data['category'][1]->name] as $row)
                                        @if(Route::has('site.post.show'))
                                        <li style="list-style: none;">
                                            <div class="media clearfix">
                                                <div class="float-left mr-2">
                                                    <i class="fa fa-paperclip fa-1x" style="color:#dc3545;" aria-hidden="true"></i>
                                                </div>
                                                <div class="news-grid-info-bottom-text">
                                                    <a href="{{ route('site.post.show', $row->post_unique_id) }}">{{ mb_strimwidth($row->title, 0, 120, "...") }}</a>
                                                </div>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                                @if(isset($data['category'][1]))
                                @if(Route::has('site.category.show'))
                                <div class="float-left">
                                    <a href="{{route('site.category.show', $data['category'][1]->id)}}">
                                        <button class="btn btn-sm blue-gradient btn-rounded">@if($data['lang'] == 1)  View All @else सबै हेर्नुस  @endif</button>
                                    </a>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                        @endif


                        @if(isset($data['category'][2]))
                        <div class="tab-pane" id="{{ $data['category'][2]->name }}">
                            <div class="panel panel-default" style="padding:0; margin:0; background:none; border:none; box-shadow:none;">
                                <div class="panel-body" style="padding:0; margin:0; background:none; border:none; box-shadow:none; overflow:hidden;">
                                    <ul class="list" style="padding:0; list-style: none;">
                                        @if(isset($data['cat_post_'.$data['category'][2]->name]))
                                        @foreach($data['cat_post_'.$data['category'][2]->name] as $row)
                                        @if(Route::has('site.post.show'))
                                        <li style="list-style: none;">
                                            <div class="media clearfix">
                                                <div class="float-left mr-2">
                                                    <i class="fa fa-paperclip fa-1x" style="color:#dc3545;" aria-hidden="true"></i>
                                                </div>
                                                <div class="news-grid-info-bottom-text">
                                                    <a href="{{ route('site.post.show', $row->post_unique_id) }}">{{ mb_strimwidth($row->title, 0, 120, "...") }}</a>
                                                </div>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                                @if(isset($data['category'][2]))
                                @if(Route::has('site.category.show'))
                                <div class="float-left">
                                    <a href="{{route('site.category.show', $data['category'][2]->id)}}">
                                        <button class="btn btn-sm blue-gradient btn-rounded">@if($data['lang'] == 1)  View All @else सबै हेर्नुस  @endif</button>
                                    </a>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                        @endif
                        <!--/.Panel 4-->
                        @if(isset($data['category'][3]))
                        <div class="tab-pane" id="{{ $data['category'][3]->name }}">
                            <div class="panel panel-default" style="padding:0; margin:0; background:none; border:none; box-shadow:none;">
                                <div class="panel-body" style="padding:0; margin:0; background:none; border:none; box-shadow:none; overflow:hidden;">
                                    <ul class="list" style="padding:0; list-style: none;">
                                        @if(isset($data['cat_post_'.$data['category'][3]->name]))
                                        @foreach($data['cat_post_'.$data['category'][3]->name] as $row)
                                        @if(Route::has('site.post.show'))
                                        <li style="list-style: none;">
                                            <div class="media clearfix">
                                                <div class="float-left mr-2">
                                                    <i class="fa fa-paperclip fa-1x" style="color:#dc3545;" aria-hidden="true"></i>
                                                </div>
                                                <div class="news-grid-info-bottom-text">
                                                    <a href="{{ route('site.post.show', $row->post_unique_id) }}">{{ mb_strimwidth($row->title, 0, 120, "...") }}</a>
                                                </div>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                                @if(isset($data['category'][3]))
                                @if(Route::has('site.category.show'))
                                <div class="float-left">
                                    <a href="{{route('site.category.show', $data['category'][3]->id)}}">
                                        <button class="btn btn-sm blue-gradient btn-rounded">@if($data['lang'] == 1)  View All @else सबै हेर्नुस  @endif</button>
                                    </a>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- Tab panels -->
                </div>
            </div>
            <!--/ .Container -->
        </div>
        <!--/ .Nav Tab Panels -->
    </div>
    <!-- Grid column -->

    <!-- संसोधन भएका कानूनहरु -->
    @include('site.includes.index.amended-laws')

    <!-- संसोधन भएका कानूनहरु -->
</div>