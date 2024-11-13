@extends('site.layouts.app')
@section('content')
<section class="trending-news">
    <div class="container">
        <ul class="trending-news-list">
            @foreach($data['tag'] as $row)
            <li><a href="{{ url($row['url']) }}">{{ $row['name'] }}</a></li>
            @endforeach
        </ul>
    </div>
</section>

<section class="province-content mt-4 p-0">
    <div class="container">
        <div class="province-header d-flex flex-column justify-content-center align-items-center mb-4">
            <h3 class="province-h1 mb-0 pb-0 position-relative">{{ $data['cat']->name }}</h3>
            <div class="loader mt-5"></div>
        </div>
    </div>
</section>

    <div class="province mt-5">
        <div class="container">
            @if(count($data['rows']) != 0)
            @foreach($data['rows']->take(1) as $row)
            <a href="{{ route('site.tag.post.show', ['post'=> $row->post_unique_id]) }}">
            <div class="card mb-3 mt-0">
                <div class="row g-0 row-card-main">
                  <div class="col-md-6 border-0">
                    <img src="{{ $row->thumbnail }}" class="card-img-top bagmati-news-1-img" alt="...">
                  </div>
                  <div class="col-md-6 province-col-div-1  ">
                    <div class="card-body province-card-body-1 ms-2">
                      <p class="posted-date-p mt-1">@if($data['lang'] == 1) {{ date('F d, Y', strtotime($row->created_at)) }} @else {{datenep($row->created_at, true)}} @endif <span class="posted-date-p ms-2">|<i class="ri-account-circle-fill fs-5 me-1 ms-2"></i>सम्पादक नेपाल</span></p>

                      <h5 class="card-title fs-4 mt-5 text-light">@if(isset($row->title)) {{ $row->title }}@endif</h5>
                      <p class="card-text text-light mt-2">@if(isset( $row->content )) {!! mb_strimwidth($row->content, 0, 100, "...") !!}@endif</p>
                      <div class="read-more-btn-province-container text-center mt-2">
                        <button class="read-more-btn-province px-3 py-2 mt-2">पूरा समाचार पढ्नुहोस्</button>
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

    <div class="province-second-class mt-5 pe-0 ms-lg-4">
        <div class="container-fluid">
            <div class="row row-cols-sm-2 row-cols-md-2 row-cols-lg-1">
                <div class="col-12 col-sm-12 col-md-8 col-lg-9">
                    <div class="row gap-0 horizontal-row-1 pt-2">
                        @if(count($data['rows']) != 0)
                        @foreach($data['rows']->skip(1)->take(6) as $row)
                        <a href="{{ route('site.tag.post.show', ['post'=> $row->post_unique_id]) }}">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="card h-100 border-0 vertical-cols-card-1">
                                <img src="{{ $row->thumbnail }}" class="card-img-top h-100 fixed-size" alt="...">
                                <div class="card-body d-flex flex-column ps-0">
                                  <h5 class="card-title flex-grow-1">@if(isset($row->title)) {{ $row->title }}@endif</h5>
                                  <p><a href="#" class="link-underline">पूरा पढ्नुहोस्</a></p>
                                </div>
                            </div>
                        </div>
                        </a>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-lg-3 col-md-4">
                    <div class="row gap-0 vertical-col-5">
                        <div class="col-12 mt-0 col-md-12 col-lg-12 col-sm-12">
                            <div class="card mb-0 h-100 border-0 vertical-cols-card-1">
                                <div class="row g-0">
                                  <div class="col-md-12">
                                    <div class="card-body">
                                        @if(count($data['rows']) != 0)
                                        <h3 class="trending-head text-center mb-3">
                                        <i class="ri-time-line me-2"></i>भर्खरै</h3>
                                        
                                        @foreach($data['rows']->skip(7) as $row)
                                        
                                        <li class="card-text-trend">@if(isset($row->title)) {{ $row->title }}@endif</li>
                                        <hr class="newwww text-dark mb-3">
                                        @endforeach
                                        @endif
                                        {{-- <li class="card-text-trend">सौर्य जहाज दुर्घटना : १८ जनाको मृत्यु, पाइलटको उद्धार</li>
                                        <hr class="newwww text-dark mb-3">
                                        <li class="card-text-trend">सौर्य जहाज दुर्घटना : १८ जनाको मृत्यु, पाइलटको उद्धार</li>
                                        <hr class="newwww text-dark mb-3">
                                        <li class="card-text-trend">सौर्य जहाज दुर्घटना : १८ जनाको मृत्यु, पाइलटको उद्धार</li>
                                        <hr class="newwww text-dark mb-3">
                                        <li class="card-text-trend">सौर्य जहाज दुर्घटना : १८ जनाको मृत्यु, पाइलटको उद्धार</li>
                                        <hr class="newwww text-dark mb-3">
                                        <li class="card-text-trend">सौर्य जहाज दुर्घटना : १८ जनाको मृत्यु, पाइलटको उद्धार</li>
                                        <hr class="newwww text-dark mb-3">
                                        <li class="card-text-trend">सौर्य जहाज दुर्घटना : १८ जनाको मृत्यु, पाइलटको उद्धार</li>
                                        <hr class="newwww text-dark mb-3"> --}}
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<section class="new">
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
        </div>
    </div>
</section>
@endsection