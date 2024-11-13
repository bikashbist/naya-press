@extends('site.layouts.app')
@section('content')

<section class="province-content mt-4 p-0 pb-5">
    <div class="container">
        <div class="province-header d-flex flex-column justify-content-center align-items-center mb-4">
            <h3 class="province-h1 mb-0 pb-0 position-relative">उद्योग/व्यापार</h3>
            <div class="loader mt-5"></div>
        </div>
    </div>

    <div class="province">
        <div class="container">
            <h3 class="purvadhar-heading text-secondary fs-4 text-center mb-4">{{ $data['cat']->category_name }}</h3>
            @if(count($data['rows']) != 0)
            @foreach($data['rows']->take(1) as $row)
            <a href="{{ route('site.post.show', ['post'=> $row->post_unique_id]) }}">
            <div class="card mb-3 mt-4">
                <div class="row g-0 row-card-main">
                  <div class="col-md-6 border-0">
                    <?php
                    $image =  get_post_image($row->post_unique_id)

                  ?>
                    <img src="{{ $image }}" class="card-img-top bagmati-news-1-img" alt="...">
                  </div>
                  <div class="col-md-6 province-col-div-1  ">
                    <div class="card-body province-card-body-1 ms-2">
                      <p class="posted-date-p mt-1">@if($data['lang'] == 1) {{ date('F d, Y', strtotime($row->created_at)) }} @else {{datenep($row->created_at, true)}} @endif<span class="posted-date-p ms-2">|
                        <i class="ri-account-circle-fill fs-5 me-1 ms-2"></i>सम्पादक नेपाल</span></p>

                      <h5 class="card-title fs-2 mt-5 text-light text-center">@if(isset($row->title)) {{ $row->title }}@endif</h5>
                      <p class="card-text text-light">@if(isset( $row->content )) {!! mb_strimwidth($row->content, 0, 100, "...") !!}@endif</p>
                      <div class="read-more-btn-province-container text-center mt-2">
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            </a>
            @endforeach
            @else
            <h2> @if($data['lang'] == 1) Updating. @else अपडेट हुदैछ ! @endif</h2>
            @endif
        </div>
    </div>

    <section class="province-second-class mt-4 pe-0 mb-5">
        <div class="container">
            @if(count($data['rows']) != 0)
            <h3 class="bistrit-samachar-h1">विस्तृत समाचार</h3>
            <div class="row gap-0 horizontal-row-1 pt-2">
                @foreach($data['rows']->skip(1) as $row)
                <a href="{{ route('site.post.show', ['post'=> $row->post_unique_id]) }}">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="card h-100 border-0 no-bg-card">
                        <?php
                        $image =  get_post_image($row->post_unique_id)
    
                      ?>
                        <img src="{{ $image }}" class="card-img-top image-hoo" alt="...">
                        <div class="card-body d-flex flex-column ps-0">
                            <h5 class="card-title">@if(isset($row->title)) {{ $row->title }}@endif</h5>
                            <p class="card-text flex-grow-1 justify-text-istaniya-taha">@if(isset( $row->content )) {!! mb_strimwidth($row->content, 0, 100, "...") !!}@endif</p>
                        </div>
                    </div>
                </div>
                </a>
                @endforeach

                {{-- <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="card h-100 border-0 no-bg-card">
                        <img src="images/kp-oli-on-crash-spot.jpg" class="card-img-top image-hoo" alt="...">
                        <div class="card-body d-flex flex-column ps-0">
                            <h5 class="card-title">सौर्य एयरलाइन्स जहाज दुर्घटना</h5>
                            <p class="card-text flex-grow-1 justify-text-istaniya-taha">नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु | नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु | नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु | नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु | नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="card h-100 border-0 no-bg-card">
                        <img src="images/kp-oli-on-crash-spot.jpg" class="card-img-top image-hoo" alt="...">
                        <div class="card-body d-flex flex-column ps-0">
                            <h5 class="card-title">प्रधानमन्त्री केपी ओलीले दुर्घटनास्थलको निरीक्षण गरेका छन्</h5>
                            <p class="card-text flex-grow-1 justify-text-istaniya-taha">नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु | नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु | नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु | नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु | नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="card h-100 border-0 no-bg-card">
                        <img src="images/plane-crash-news-1.1.jpg" class="card-img-top image-hoo" alt="...">
                        <div class="card-body d-flex flex-column ps-0">
                            <h5 class="card-title">सौर्य एयरलाइन्स जहाज दुर्घटना</h5>
                            <p class="card-text flex-grow-1 justify-text-istaniya-taha">नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु | नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु | नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु | नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु | नागरिक उड्ययन प्राधिकरणका अधिकारीलाई भेटेर यसको कारण बुझ्न घटनास्थल आइपुगेको छु</p>
                        </div>
                    </div>
                </div> --}}
            </div>
            @endif
        </div>
    </section>
</section>
@endsection