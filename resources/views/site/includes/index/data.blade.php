<div class="abt-panel section-panel">
    <!---------------------------- Hero category ------------------------------->
    <div class="hero-category">
        <div class="st-wrapper">
            <div class="container-fluid">
                <div class="row">
                    @if(isset($featured_page[4]))
                    @if(Route::has('site.page.show'))
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="hero-category__box">
                            <a href="{{ route('site.page.show', $featured_page[4]->post_unique_id ) }}">
                                <span><img src="{{ asset('assets/site/images/img-icons/cen-rc-icon.png')}}"></span>
                                {{ $featured_page[4]->title }}
                            </a>
                        </div>
                    </div>
                    @endif
                    @endif

                    @if(isset($featured_page[5]))
                    @if(Route::has('site.page.show'))
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="hero-category__box">
                            <a href="{{ route('site.page.show', $featured_page[5]->post_unique_id ) }}">
                                <span><img src="{{ asset('assets/site/images/img-icons/cen-circ-icon.png')}}" style="width: 90px;"></span>
                                {{ $featured_page[5]->title }}
                            </a>
                        </div>
                    </div>

                    @endif
                    @endif

                    @if(isset($featured_page[6]))
                    @if(Route::has('site.page.show'))
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="hero-category__box">
                            <a href="{{ route('site.page.show', $featured_page[6]->post_unique_id ) }}">
                                <span><img src="{{ asset('assets/site/images/img-icons/Publication and Reports.png')}}" style="width: 110px;"></span>
                                {{ $featured_page[6]->title }}
                            </a>
                        </div>
                    </div>
                    @endif
                    @endif

                    @if(isset($featured_page[7]))
                    @if(Route::has('site.page.show'))
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="hero-category__box">
                            <a href="{{ route('site.page.show', $featured_page[7]->post_unique_id ) }}">
                                <span><img src="{{ asset('assets/site/images/img-icons/cen-press-rel-icon.png')}}" style="width: 120px;"></span>
                                {{ $featured_page[7]->title }}
                            </a>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--------------X-------------- Hero category ends -------------X------------------>
    <!---------------------------- About section ------------------------------->

    <!---------------------------- About section ------------------------------->
    <div class="about-section">
        <div class="st-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-7">
                        <div class="with-pttrns-box">
                            <div class="about-block">
                                <div class="category-heading"> राष्ट्रिय कृषिगणनाको बारेमा</div>
                                <h1 class="about-block__heading">
                                    राष्ट्रिय कृषिगणना नेपालको एकीकृत राष्ट्रिय तथ्यांक प्रणालीको एक हिस्सा
                                    हो।
                                </h1>
                                <p>
                                    यसले हरेक दश बर्षको अन्तरालमा राष्ट्रिय र स्थानीय स्तरमा आधारभुत
                                    जनसंख्या तथ्यांक तयार गर्दछ। यसले राष्ट्रिय आवधिक बिकाश लक्ष्य तथा दिगो
                                    बिकाश लक्ष्यका अनुगमन र मुल्यांकन संग सम्बन्धित केहि सामाजिक, जनसांख्यिक
                                    र आर्थिक सूचकहरुको लागि समेत सूचना प्रदान गर्दछ।
                                </p>
                                <a href="{{ route('site.page.show', ['id' => $data['featured_pages'][3]->post_unique_id]) }}" class="btn btn-outline btn-primary">थप जानकारी</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-12 col-md-5">
                        <!---------------------------- News slider ------------------------------->
                        <div class="news-slider-section">
                            <h2>{{$data['category'][0]->name}}</h2>
                            <div class="news-slider owl-carousel">
                                <div class="news-slider__box">
                                    @if(count($cat_post[0]) != 0)
                                    @foreach($cat_post[0] as $row)
                                    @if(route::has('site.post.show'))
                                    <div class="news-slider__item">
                                        <h4 class="news-slider__item-title card-title">
                                            <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">
                                                {{ mb_strimwidth($row->title, 0, 70, "...") }}
                                            </a>
                                        </h4>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>


                            </div>
                            <a href="{{ route('site.category.show', ['id'=>$cat[0]]) }}" class="btn btn-primary">सबै सूचना
                                हेर्नुहोस्</a>
                        </div>
                        <!---------------X------------- News slider ---------------X---------------->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------X--------------- About section ends ---------------X---------------->

    <!-------------X--------------- About section ends ---------------X---------------->
</div>