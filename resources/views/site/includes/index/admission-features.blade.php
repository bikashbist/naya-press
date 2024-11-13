<section class="steps-area">
    <div class="container">
        <div class="section-steps mb20 headline text-left ">
            @if ($data['lang'] == 1)
            <h2><span>Admission</span> Features.</h2>
            @else
            <h2><span>भर्ना </span>विशेषताहरु</h2>
            @endif
        </div>

        <div class="row">
            @if(isset($data['featured_pages'][7]))
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6" data-aos="fade-down" data-aos-easing="linear"
                data-aos-duration="1500">
                <div class="steps-box text-center mb-30">
                    <div class="steps-box__icon gradient-bg text-center">
                        <img src="{{asset($data['featured_pages'][7]->thumbnail)}}" alt="" style="height: 55px;">

                    </div>
                    <div class="steps-box__content">
                        <h4 class="mb-25"><a href="#">{{$data['featured_pages'][7]->title}}</a></h4>
                        
                        {!! mb_strimwidth($data['featured_pages'][7]->content, 0, 400) !!}
                    </div>
                </div>
            </div>
            @endif

            @if(isset($data['featured_pages'][8]))
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6" data-aos="fade-up" data-aos-easing="linear"
                data-aos-duration="1500">
                <div class="steps-box text-center mb-30">
                    <div class="steps-box__icon gradient-bg text-center">
                        <img src="{{asset($data['featured_pages'][8]->thumbnail)}}" alt="" style="height: 55px;">

                    </div>
                    <div class="steps-box__content">
                        <h4 class="mb-25"><a href="#">{{$data['featured_pages'][8]->title}}</a></h4>
                        
                        {!! mb_strimwidth($data['featured_pages'][8]->content, 0, 400) !!}
                    </div>
                </div>
            </div>
            @endif

             @if(isset($data['featured_pages'][9]))
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6" data-aos="fade-down" data-aos-easing="linear"
                data-aos-duration="1500">
                <div class="steps-box text-center mb-30">
                    <div class="steps-box__icon gradient-bg text-center">
                        <img src="{{asset($data['featured_pages'][9]->thumbnail)}}" alt="" style="height: 55px;">

                    </div>
                    <div class="steps-box__content">
                        <h4 class="mb-25"><a href="#">{{$data['featured_pages'][9]->title}}</a></h4>
                        
                        {!! mb_strimwidth($data['featured_pages'][9]->content, 0, 400) !!}
                    </div>
                </div>
            </div>
            @endif

            @if(isset($data['featured_pages'][10]))
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6" data-aos="fade-up" data-aos-easing="linear"
                data-aos-duration="1500">
                <div class="steps-box text-center mb-30">
                    <div class="steps-box__icon gradient-bg text-center">
                        <img src="{{asset($data['featured_pages'][10]->thumbnail)}}" alt="" style="height: 55px;">

                    </div>
                    <div class="steps-box__content">
                        <h4 class="mb-25"><a href="#">{{$data['featured_pages'][10]->title}}</a></h4>
                        
                        {!! mb_strimwidth($data['featured_pages'][10]->content, 0, 400) !!}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>