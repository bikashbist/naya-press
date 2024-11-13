<!-- Start why choose section
		============================================= -->
        <section id="why-choose" class="why-choose-section version-four backgroud-style">
            <div class="container">
                @if(isset($data['category'][5]))
                <div class="section-title mb20 headline text-center">
                    <!-- <h2>Why Choose Khumjung</h2> -->
                    <h2>{{ $data['category'][5]->category_name }}</h2>
                </div>
                @endif
                <div class="extra-features-content">
                    @if(isset($data['cat_post_'.$data['category'][5]->name]))
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="extra-left">
                                @if($data['cat_post_'.$data['category'][5]->name]->count() > 0)
                                <div class="extra-left-content" data-aos="fade-right" data-aos-duration="500">
                                    <div class="extra-icon-text text-left">
                                        <div class="features-icon gradient-bg text-center">
                                            <img src="{{$data['cat_post_'.$data['category'][5]->name][0]->thumbnail}}" alt="{{$data['cat_post_'.$data['category'][5]->name][0]->title}}" style="height: 55px;">
                                            <div class="feat-tag">
                                                <span>@if($data['lang'] == 1) 01 @else ०१ @endif</span>
                                            </div>
                                        </div>
                                        <div class="features-text">
                                            <div class="features-text-title">
                                                <!-- <h3>Transpotation</h3> -->
                                                <h3>{{$data['cat_post_'.$data['category'][5]->name][0]->title}}</h3>
                                            </div>
                                            <div class="features-text-dec">
                                                <!-- <span>We provide comfortable and child friendly school transportation
                                                    facilities to our students in affordable price.</span> -->
                                                <span>{!! mb_strimwidth($data['cat_post_'.$data['category'][5]->name][0]->content, 0, 150) !!}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // extra-left-content -->
                                @endif
                                
                                @if($data['cat_post_'.$data['category'][5]->name]->count() > 2)
                                <div class="extra-left-content" data-aos="fade-right" data-aos-duration="1500">
                                    <div class="extra-icon-text text-left">
                                        <div class="features-icon gradient-bg text-center">
                                            <img src="{{$data['cat_post_'.$data['category'][5]->name][2]->thumbnail}}" alt="{{$data['cat_post_'.$data['category'][5]->name][2]->title}}" style="height: 55px;">
                                            <div class="feat-tag">
                                                <span>@if($data['lang'] == 1) 03 @else ०३ @endif</span>
                                            </div>
                                        </div>
                                        <div class="features-text pt25">
                                            <div class="features-text-title">
                                                <h3>{{$data['cat_post_'.$data['category'][5]->name][2]->title}}</h3>
                                            </div>
                                            <div class="features-text-dec">
                                                <span>{!! mb_strimwidth($data['cat_post_'.$data['category'][5]->name][2]->content, 0, 150) !!}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // extra-left-content -->
                                @endif
    
                                @if($data['cat_post_'.$data['category'][5]->name]->count() > 4)
                                <div class="extra-left-content" data-aos="fade-right" data-aos-duration="2500">
                                    <div class="extra-icon-text text-left">
                                        <div class="features-icon gradient-bg text-center">
                                            <img src="{{$data['cat_post_'.$data['category'][5]->name][4]->thumbnail}}" alt="{{$data['cat_post_'.$data['category'][5]->name][4]->title}}" style="height: 55px;">
                                            <div class="feat-tag">
                                                <span>@if($data['lang'] == 1) 05 @else ०५ @endif</span>
                                            </div>
                                        </div>
                                        <div class="features-text pt25">
                                            <div class="features-text-title">
                                                <h3>{{$data['cat_post_'.$data['category'][5]->name][4]->title}}</h3>
                                            </div>
                                            <div class="features-text-dec">
                                                <span>{!! mb_strimwidth($data['cat_post_'.$data['category'][5]->name][4]->content, 0, 150) !!}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // extra-left-content -->
                                @endif
                        </div>
                        <!-- /col-sm-3 -->
    
                        <div class="col-sm-4">
                            <div class="extra-pic text-center">
                                <img src="{{asset('assets/frontend/img/banner/5.png')}}" alt="img">
                            </div>
                        </div>
                        <!-- /col-sm-6 -->
    
                        <div class="col-md-4 col-sm-6">
                            <div class="extra-right">
                                @if($data['cat_post_'.$data['category'][5]->name]->count() > 1)
                                <div class="extra-left-content" data-aos="fade-left" data-aos-duration="500">
                                    <div class="extra-icon-text text-right">
                                        <div class="features-icon gradient-bg text-center">
                                            <img src="{{$data['cat_post_'.$data['category'][5]->name][1]->thumbnail}}" alt="{{$data['cat_post_'.$data['category'][5]->name][1]->title}}" style="height: 55px;">
                                            <div class="feat-tag">
                                                <span><span>@if($data['lang'] == 1) 02 @else ०२ @endif</span></span>
                                            </div>
                                        </div>
                                        <div class="features-text pt25">
                                            <div class="features-text-title text-right pb10">
                                                <h3>{{$data['cat_post_'.$data['category'][5]->name][1]->title}}</h3>
                                            </div>
                                            <div class="features-text-dec text-right">
                                                <span>{!! mb_strimwidth($data['cat_post_'.$data['category'][5]->name][1]->content, 0, 150) !!}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // extra-left-content -->
                                @endif
    
                                @if($data['cat_post_'.$data['category'][5]->name]->count() > 3)
                                <div class="extra-left-content" data-aos="fade-left" data-aos-duration="1500">
                                    <div class="extra-icon-text text-right">
                                        <div class="features-icon gradient-bg text-center">
                                            <img src="{{$data['cat_post_'.$data['category'][5]->name][3]->thumbnail}}" alt="{{$data['cat_post_'.$data['category'][5]->name][3]->title}}" style="height: 55px;">
    
                                            <div class="feat-tag">
                                                <span><span>@if($data['lang'] == 1) 04 @else ०४ @endif</span></span>
                                            </div>
                                        </div>
                                        <div class="features-text pt25">
                                            <div class="features-text-title text-right pb10">
                                                <h3>{{$data['cat_post_'.$data['category'][5]->name][3]->title}}</h3>
                                            </div>
                                            <div class="features-text-dec text-right">
                                                <span>{!! mb_strimwidth($data['cat_post_'.$data['category'][5]->name][3]->content, 0, 150) !!}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // extra-left-content -->
                                @endif
                                
                                @if($data['cat_post_'.$data['category'][5]->name]->count() > 5)
                                <div class="extra-left-content" data-aos="fade-left" data-aos-duration="2500">
                                    <div class="extra-icon-text text-right">
                                        <div class="features-icon gradient-bg text-center">
                                            <img src="{{$data['cat_post_'.$data['category'][5]->name][5]->thumbnail}}" alt="{{$data['cat_post_'.$data['category'][5]->name][5]->title}}" style="height: 55px;">
                                            <div class="feat-tag">
                                                <span><span>@if($data['lang'] == 1) 05 @else ०५ @endif</span></span>
                                            </div>
                                        </div>
                                        <div class="features-text pt25">
                                            <div class="features-text-title text-right pb10">
                                                <h3>{{$data['cat_post_'.$data['category'][5]->name][5]->title}}</h3>
                                            </div>
                                            <div class="features-text-dec text-right">
                                                <span>{!! mb_strimwidth($data['cat_post_'.$data['category'][5]->name][5]->content, 0, 150) !!}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // extra-left-content -->
                                @endif
                            </div><!-- /extra-left -->
                        </div>
                        <!-- /col-sm-3 -->
                    </div><!-- /row -->
                    @endif
                </div>
            </div>
        </section>
        <!-- End why choose section
            ============================================= -->