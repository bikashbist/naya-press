@extends('site.layouts.app')
@section('content')
<section class="province-content mt-4 p-0">
    <div class="container">
        <div class="province-header d-flex flex-column justify-content-center align-items-center mb-4">
            <h3 class="province-h1 mb-0 pb-0 position-relative">अन्य</h3>
            <div class="loader mt-5"></div>
        </div>
    </div>
</section>

<section class="new mb-3 mt-0">
    <div class="container">
        <h3 class="purvadhar-heading text-secondary fs-4 text-center mb-4">{{ $data['cat']->name }}</h3>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                <div class="row">

                    @if(count($data['rows']) != 0)
                    @foreach($data['rows']->take(3) as $row)
                    <a href="{{ route('site.other.post.show', ['post'=> $row->post_unique_id]) }}">
                    <div class="col-12 card-border-bottom">
                        <div class="card border-0 mb-3">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">@if(isset($row->title)) {{ $row->title }}@endif</h4>
                                        <p class="card-text justify-text-istaniya-taha">@if(isset( $row->content )) {!! mb_strimwidth($row->content, 0, 100, "...") !!}@endif</p>
                                        <p class="card-text"><small class="text-body-secondary">@if($data['lang'] == 1) {{timesAgoEn($row->created_at, true)}} @else {{timesAgoNp($row->created_at, true)}} @endif</small></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <?php
                                    $image =  get_post_image($row->post_unique_id)
                
                                  ?>
                                    <img src="{{ $image }}" class="img-fluid rounded-start h-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    @endforeach
                    @else
                    <h2> @if($data['lang'] == 1) Updating. @else अपडेट हुदैछ ! @endif</h2>
                    @endif
                    {{-- <div class="col-12 mt-4 card-border-bottom">
                        <div class="card border-0 mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="images/gaupalika-2.jpg" class="img-fluid rounded-start h-100"
                                        alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">गाउँपालिकाहरुले स्थानिय स्तरमा सेवा</h4>
                                        <p class="card-text justify-text-istaniya-taha">गाउँपालिका नेपालमा ग्रामिण
                                            नगरपालिका अथवा स्थानिय प्रशासनिक इकाई हो। यो २०१५ को नेपालको संविधान
                                            अनुसार देशको संघीय पुनर्संरचनाको हिस्साको रूपमा स्थापित भएको हो। यसले
                                            सरकारको सेवा ग्रामिण जनसंख्यामा नजिक पुर्याउने उद्देश्य राखेको छ।
                                            गाउँपालिकाको बारेमा केहि महत्वपूर्ण कुराहरु यसप्रकार छन्</p>
                                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                                ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4 card-border-bottom">
                        <div class="card border-0 mb-3">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">गाउँपालिकाहरुले स्थानिय स्तरमा सेवा</h4>
                                        <p class="card-text justify-text-istaniya-taha">गाउँपालिका नेपालमा ग्रामिण
                                            नगरपालिका अथवा स्थानिय प्रशासनिक इकाई हो। यो २०१५ को नेपालको संविधान
                                            अनुसार देशको संघीय पुनर्संरचनाको हिस्साको रूपमा स्थापित भएको हो। यसले
                                            सरकारको सेवा ग्रामिण जनसंख्यामा नजिक पुर्याउने उद्देश्य राखेको छ।
                                            गाउँपालिकाको बारेमा केहि महत्वपूर्ण कुराहरु यसप्रकार छन्</p>
                                        <p class="card-text"><small class="text-body-secondary h-100">Last updated 3
                                                mins ago</small></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="images/gaupalika.jpg" class="img-fluid rounded-start" alt="...">
                                </div>

                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="col col-sm-12 col-md-12 col-lg-3 mt-sm-4 mt-lg-0 mt-4">
                @if(count($data['rows']) != 0)
                <h4 class="bistrit-samachar-h1 text-center">ताजा खबर</h4>
                <div class="row g-1">
                    
                    @foreach($data['rows']->skip(3)->take(3) as $row)
                    <a href="{{ route('site.other.post.show', ['post'=> $row->post_unique_id]) }}">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-12">
                        <div class="card text-bg-transparent col-image-bg">
                            <img src="{{ $row->thumbnail }}" class="sangh-card-img-filter">
                            <div class="card-body position-absolute sangh-card-abs-text text-light text-start mt-0">
                                <p class="card-text">@if(isset($row->title)) {{ $row->title }}@endif</p>
                            </div>
                        </div>
                    </div>
                    </a>
                    @endforeach
                    {{-- <div class="col-12 col-sm-6 col-md-4 col-lg-12">
                        <div class="card text-bg-transparent col-image-bg">
                            <img src="images/news5.webp" class="sangh-card-img-filter">
                            <div class="card-body position-absolute sangh-card-abs-text text-light text-start mt-0">
                                <p class="card-text">प्रधानमन्त्री केपी ओलीले दुर्घटनास्थलको निरीक्षण गरेका छन्</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-12">
                        <div class="card text-bg-transparent col-image-bg">
                            <img src="images/news5.webp" class="sangh-card-img-filter">
                            <div class="card-body position-absolute sangh-card-abs-text text-light text-start mt-0">
                                <p class="card-text">प्रधानमन्त्री केपी ओलीले दुर्घटनास्थलको निरीक्षण गरेका छन्</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
                @endif
            </div>

        </div>
    </div>
</section>

<section class="province-second-class mt-2 pe-0 mb-5">
    <div class="container">
        @if(count($data['rows']) != 0)
        <h3 class="bistrit-samachar-h1">विस्तृत समाचार</h3>
        <div class="row gap-0 horizontal-row-1 pt-2">
            @foreach($data['rows']->skip(6) as $row)
            <a href="{{ route('site.other.post.show', ['post'=> $row->post_unique_id]) }}">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="card h-100 border-0 no-bg-card">
                    <img src="{{ $row->thumbnail }}" class="card-img-top image-hoo" alt="...">
                    <div class="card-body d-flex flex-column ps-0">
                        <h5 class="card-title">@if(isset($row->title)) {{ $row->title }}@endif</h5>
                        <p class="card-text flex-grow-1 justify-text-istaniya-taha">@if(isset( $row->content )) {!! mb_strimwidth($row->content, 0, 100, "...") !!}@endif</p>
                    </div>
                </div>
            </div>
            </a>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection