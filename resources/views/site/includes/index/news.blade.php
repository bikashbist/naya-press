<!-- Start latest activities
		============================================= -->
        <section id="popular-course" class="popular-course-section">
            <div class="container">
                <div class="section-popular mb20 headline text-left ">
                    @if(isset($data['category'][6]))
                        @if($data['lang'] == 1)
                        <h2><span>Latest</span> Activities.</h2>
                        @else
                        <h2><span>पछिल्लो</span> गतिविधिहरू</h2>
                        @endif
                    @endif
                </div>
                @if(isset($data['cat_post_'.$data['category'][6]->name]))
                <div id="course-slide-item" class="course-slide">
                    @foreach($data['cat_post_'.$data['category'][6]->name] as $row)
                    <div class="course-item-pic-text ">
                        <div class="course-pic relative-position mb25">
                            <img src="{{$row->thumbnail}}" alt="{{$row->title}}">
    
                            <div class="course-details-btn">
                                <a href="{{ route('site.post.show', $row->post_unique_id) }}">@if($data['lang'] == 1)DETAILS @else विवरण @endif  <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="course-item-text">
                            <div class="date-meta">
                                <i class="fas fa-calendar-alt"></i>{{ date('F d, Y', strtotime($row->created_at)) }}
                            </div>
                            <div class="course-title mt10 headline pb45 relative-position">
                                <h3><a href="{{ route('site.post.show', $row->post_unique_id) }}">{{$row->title}}</a></h3>
                                {!! mb_strimwidth($row->content, 0, 150) !!}
                            </div>
    
                        </div>
                    </div>
                    <!-- /item -->
                    @endforeach
                </div>
                @endif
            </div>
        </section>
        <!-- End popular course
            ============================================= -->