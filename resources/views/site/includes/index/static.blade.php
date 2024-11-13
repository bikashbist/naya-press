<!-- Start why choose section
		============================================= -->
        <section id="why-choose" class="why-choose-section version-four backgroud-style">
            <div class="container">
                <div class="section-title mb20 headline text-center">
                    <!-- <h2>Why Choose Khumjung</h2> -->
                    <h2>@if($data['lang'] == 1) Why Choose Khumjung @else किन खुम्जुङ  @endif </h2>
                </div>
                <div class="extra-features-content">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="extra-left">
                                @if(isset($data['featured_pages'][1]))
                                <div class="extra-left-content" data-aos="fade-right" data-aos-duration="500">
                                    <div class="extra-icon-text text-left">
                                        <div class="features-icon gradient-bg text-center">
                                            <!-- <i class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i> -->
                                            <img src="{{asset($data['featured_pages'][1]->thumbnail)}}" alt="" style="height: 55px;">
                                            <div class="feat-tag">
                                                <!-- <span>01</span> -->
                                                <span> @if($data['lang'] == 1) 01 @else  ०१ @endif</span>
                                            </div>
                                        </div>
                                        <div class="features-text">
                                            <div class="features-text-title">
                                                <!-- <h3>Transpotation</h3> -->
                                                <h3>{{$data['featured_pages'][1]->title}}</h3>
                                            </div>
                                            <div class="features-text-dec">
                                                {!! mb_strimwidth($data['featured_pages'][1]->content, 0, 400) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // extra-left-content -->
                                @endif

                                @if(isset($data['featured_pages'][2]))
                                <div class="extra-left-content" data-aos="fade-right" data-aos-duration="1500">
                                    <div class="extra-icon-text text-left">
                                        <div class="features-icon gradient-bg text-center">
                                            <!-- <i class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i> -->
                                            <img src="{{asset($data['featured_pages'][2]->thumbnail)}}" alt="" style="height: 55px;">
                                            <div class="feat-tag">
                                                <!-- <span>01</span> -->
                                                <span> @if($data['lang'] == 1) 02 @else  ०२ @endif</span>
                                            </div>
                                        </div>
                                        <div class="features-text">
                                            <div class="features-text-title">
                                                <!-- <h3>Transpotation</h3> -->
                                                <h3>{{$data['featured_pages'][2]->title}}</h3>
                                            </div>
                                            <div class="features-text-dec">
                                                {!! mb_strimwidth($data['featured_pages'][2]->content, 0, 400) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // extra-left-content -->
                                @endif
    
                                @if(isset($data['featured_pages'][3]))
                                <div class="extra-left-content" data-aos="fade-right" data-aos-duration="2500">
                                    <div class="extra-icon-text text-left">
                                        <div class="features-icon gradient-bg text-center">
                                            <!-- <i class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i> -->
                                            <img src="{{asset($data['featured_pages'][3]->thumbnail)}}" alt="" style="height: 55px;">
                                            <div class="feat-tag">
                                                <!-- <span>01</span> -->
                                                <span> @if($data['lang'] == 1) 03 @else  ०३ @endif</span>
                                            </div>
                                        </div>
                                        <div class="features-text">
                                            <div class="features-text-title">
                                                <!-- <h3>Transpotation</h3> -->
                                                <h3>{{$data['featured_pages'][3]->title}}</h3>
                                            </div>
                                            <div class="features-text-dec">
                                                {!! mb_strimwidth($data['featured_pages'][3]->content, 0, 400) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // extra-left-content -->
                                @endif
                            </div><!-- /extra-left -->
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
                                @if(isset($data['featured_pages'][4]))
                                <div class="extra-left-content" data-aos="fade-left" data-aos-duration="500">
                                    <div class="extra-icon-text text-right">
                                        <div class="features-icon gradient-bg text-center">
                                            <!-- <i class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i> -->
                                            <img src="{{asset($data['featured_pages'][4]->thumbnail)}}" alt="" style="height: 55px;">
                                            <div class="feat-tag">
                                                <!-- <span>01</span> -->
                                                <span> @if($data['lang'] == 1) 04 @else  ०४ @endif</span>
                                            </div>
                                        </div>
                                        <div class="features-text">
                                            <div class="features-text-title">
                                                <!-- <h3>Transpotation</h3> -->
                                                <h3>{{$data['featured_pages'][4]->title}}</h3>
                                            </div>
                                            <div class="features-text-dec text-right">
                                                {!! mb_strimwidth($data['featured_pages'][4]->content, 0, 400) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // extra-left-content -->
                                @endif
                               
                                @if(isset($data['featured_pages'][5]))
                                <div class="extra-left-content" data-aos="fade-left" data-aos-duration="1500">
                                    <div class="extra-icon-text text-right">
                                        <div class="features-icon gradient-bg text-center">
                                            <!-- <i class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i> -->
                                            <img src="{{asset($data['featured_pages'][5]->thumbnail)}}" alt="" style="height: 55px;">
                                            <div class="feat-tag">
                                                <!-- <span>01</span> -->
                                                <span> @if($data['lang'] == 1) 05 @else  ०५ @endif</span>
                                            </div>
                                        </div>
                                        <div class="features-text">
                                            <div class="features-text-title">
                                                <!-- <h3>Transpotation</h3> -->
                                                <h3>{{$data['featured_pages'][5]->title}}</h3>
                                            </div>
                                            <div class="features-text-dec text-right">
                                                {!! mb_strimwidth($data['featured_pages'][5]->content, 0, 400) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // extra-left-content -->
                                @endif
    
                                @if(isset($data['featured_pages'][6]))
                                <div class="extra-left-content" data-aos="fade-left" data-aos-duration="500">
                                    <div class="extra-icon-text text-right">
                                        <div class="features-icon gradient-bg text-center">
                                            <!-- <i class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i> -->
                                            <img src="{{asset($data['featured_pages'][6]->thumbnail)}}" alt="" style="height: 55px;">
                                            <div class="feat-tag">
                                                <!-- <span>01</span> -->
                                                <span> @if($data['lang'] == 1) 06 @else  ०६ @endif</span>
                                            </div>
                                        </div>
                                        <div class="features-text">
                                            <div class="features-text-title">
                                                <!-- <h3>Transpotation</h3> -->
                                                <h3>{{$data['featured_pages'][6]->title}}</h3>
                                            </div>
                                            <div class="features-text-dec text-right">
                                                {!! mb_strimwidth($data['featured_pages'][6]->content, 0, 400) !!}
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
                </div>
            </div>
        </section>
        <!-- End why choose section
            ============================================= -->