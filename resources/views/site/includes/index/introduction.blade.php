<!-- Start of about us section
		============================================= -->
        <section id="about-us" class="about-us-section home-secound popular-three">
            <div class="container">
                @if(isset($data['featured_pages'][0]))
                <div class="row">
                    <div class="col-md-6">
                        <div class="about-us-text">
                            <div class="section-title relative-position mb20 headline text-left">
                                <!-- <h1>About</h1> -->
                                <h1>@if($data['lang'] == 1)About Us @else हाम्रो बारेमा  @endif</h1>
                                <!-- <h2>Khumjung Secondary School</h2> -->
                                <h2>{{ $data['featured_pages'][0]->title  }}</h2>
                            </div>
                            <div class="about-content-text">
                                {!! mb_strimwidth($data['featured_pages'][0]->content, 0, 600) !!}
                                <div class="about-btn">
                                    <div class="genius gradient-bg text-center text-uppercase ul-li-block bold-font">
                                        @if(Route::has('site.page.show'))
                                            <a href="{{ route('site.page.show', $data['featured_pages'][0]->post_unique_id) }}"><i class="fas fa-caret-right"></i>
                                        @if($data['lang'] == 1)Read More @else थप पढ्नुहोस्  @endif
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="who-we-are-image" data-aos="fade-right" data-aos-duration="1500">
                            <img src="{{asset('assets/frontend/img/about/1.jpg')}}" alt="image">
                        </div>
                        <div class="about-image" data-aos="fade-left" data-aos-duration="1500">
                            <img src="{{asset('assets/frontend/img/about/2.jpg')}}" alt="image">
                        </div>
                    </div>
                    @endif    
                </div>
            </div>
        </section>
        <!-- End of about us section
            ============================================= -->