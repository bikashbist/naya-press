@extends('site.layouts.app')
@section('content')

    <section class="province-content mt-4 p-0">
        <div class="container">
            <div class="province-header d-flex flex-column justify-content-center align-items-center mb-4">
                <h3 class="province-h1 mb-0 pb-0 position-relative">समाचार</h3>
                <div class="loader mt-5"></div>
            </div>
        </div>
    </section>
    <h3 class="purvadhar-heading text-secondary fs-4 text-center mb-4">{{ $data['cat']->category_name }}</h3>
    @if (Request::segment(2) == 7)
        <div class="province">
            <div class="container">
                @if (count($data['rows']) != 0)
                    @foreach ($data['rows']->take(1) as $row)
                        @php
                            $image = \App\Model\Dcms\PostImage::where('post_unique_id', $row->post_unique_id)->first();
                        @endphp
                        <a href="{{ route('site.post.show', ['post' => $row->post_unique_id]) }}">
                            <div class="card mb-3 mt-4">
                                <div class="row g-0 row-card-main">
                                    <div class="col-md-7 border-0">
                                        @if ($images)
                                            <img src="{{ $image->images }}" class="card-img-top bagmati-news-1-img"
                                                alt="...">
                                        @endif
                                    </div>
                                    <div class="col-md-5 province-col-div-1  ">
                                        <div class="card-body province-card-body-1 ms-2">
                                            <p class="posted-date-p mt-1">
                                                @if ($data['lang'] == 1)
                                                    {{ date('F d, Y', strtotime($row->created_at)) }}
                                                @else
                                                    {{ datenep($row->created_at, true) }}
                                                @endif
                                                <span class="posted-date-p ms-2">|<i
                                                        class="ri-account-circle-fill fs-5 me-1 ms-2"></i>सम्पादक
                                                    नेपाल</span>
                                            </p>

                                            <h5 class="card-title fs-2 mt-5 text-light">
                                                @if (isset($row->title))
                                                    {{ $row->title }}
                                                @endif
                                            </h5>
                                            <p class="card-text text-light mt-2">
                                                @if (isset($row->content))
                                                    {!! mb_strimwidth($row->content, 0, 100, '...') !!}
                                                @endif
                                            </p>
                                            <div class="read-more-btn-province-container text-center mt-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <h2>
                        @if ($data['lang'] == 1)
                            Updating.
                        @else
                            अपडेट हुदैछ !
                        @endif
                    </h2>
                @endif
            </div>
        </div>

        <div class="province-second-class mt-5 pe-0 ms-lg-4">
            <div class="container-fluid">
                <div class="row row-cols-sm-2 row-cols-md-2 row-cols-lg-1">
                    <div class="col-12 col-sm-12 col-md-7 col-lg-8">
                        <div class="row gap-0 horizontal-row-1 pt-2">
                            @if (count($data['rows']) != 0)
                                @foreach ($data['rows']->skip(1)->take(6) as $row)
                                    @php
                                        $image = \App\Model\Dcms\PostImage::where(
                                            'post_unique_id',
                                            $row->post_unique_id,
                                        )->first();
                                    @endphp
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                        <div class="card h-100 border-0 vertical-cols-card-1">
                                            @if ($images)
                                                <img src="{{ $image->images }}" class="card-img-top h-100 fixed-size"
                                                    alt="...">
                                            @endif
                                            <div class="card-body d-flex flex-column ps-0">
                                                <h5 class="card-title">
                                                    @if (isset($row->title))
                                                        {{ $row->title }}
                                                    @endif
                                                </h5>
                                                <p class="card-text flex-grow-1">
                                                    @if (isset($row->content))
                                                        {!! mb_strimwidth($row->content, 0, 100, '...') !!}
                                                    @endif
                                                </p>
                                                <p><a href="#" class="link-underline">पूरा पढ्नुहोस्</a></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-4 col-md-5">
                        <div class="row gap-0 vertical-col-5">
                            @if (count($data['rows']) != 0)
                                @foreach ($data['rows']->skip(7) as $row)
                                    @php
                                        $image = \App\Model\Dcms\PostImage::where(
                                            'post_unique_id',
                                            $row->post_unique_id,
                                        )->first();
                                    @endphp
                                    <div class="col-6 mt-3 col-md-12 col-lg-12 col-sm-6">
                                        <div class="card mb-3 h-100 border-0 vertical-cols-card-1">
                                            <div class="row g-0">
                                                <div class="col-md-4 image-fluid-container">
                                                    @if ($image)
                                                        <img src="{{ $image->images }}"
                                                            class="img-fluid vertical-image-fluid" alt="...">
                                                    @endif
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <p class="card-text">
                                                            @if (isset($row->title))
                                                                {{ $row->title }}
                                                            @endif
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer vertical-card-ko-footer p-0 ps-1">
                                                <small class="text-body-sec minutes-ago-3">
                                                    @if ($data['lang'] == 1)
                                                        {{ timesAgoEn($row->created_at, true) }}
                                                    @else
                                                        {{ timesAgoNp($row->created_at, true) }}
                                                    @endif
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Request::segment(2) == 8 ||
            Request::segment(2) == 10 ||
            Request::segment(2) == 11 ||
            Request::segment(2) == 12 ||
            Request::segment(2) == 13 ||
            Request::segment(2) == 114 ||
            Request::segment(2) == 115 ||
            Request::segment(2) == 116)
        <section class="new mb-3 mt-0">
            <div class="container">

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                        <div class="row">
                            @if (count($data['rows']) != 0)
                                @foreach ($data['rows']->take(4) as $row)
                                    <a href="{{ route('site.post.show', ['post' => $row->post_unique_id]) }}">
                                        <div class="col-12 card-border-bottom">
                                            <div class="card border-0 mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h4 class="card-title">
                                                                @if (isset($row->title))
                                                                    {{ $row->title }}
                                                                @endif
                                                            </h4>
                                                            <p class="card-text justify-text-istaniya-taha">
                                                                @if (isset($row->content))
                                                                    {!! mb_strimwidth($row->content, 0, 100, '...') !!}
                                                                @endif
                                                            </p>
                                                            <p class="card-text"><small class="text-body-secondary">
                                                                    @if ($data['lang'] == 1)
                                                                        {{ timesAgoEn($row->created_at, true) }}
                                                                    @else
                                                                        {{ timesAgoNp($row->created_at, true) }}
                                                                    @endif
                                                                </small></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      @php
                                                      $image = \App\Model\Dcms\PostImage::where('post_unique_id', $row->post_unique_id)->first();
                                                  @endphp
                                                  @if($image)
                                                        <img src="{{ $image->images }}"
                                                            class="img-fluid rounded-start h-100" alt="...">
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <h2>
                                    @if ($data['lang'] == 1)
                                        Updating.
                                    @else
                                        अपडेट हुदैछ !
                                    @endif
                                </h2>
                            @endif
                        </div>
                    </div>

                    <div class="col col-sm-12 col-md-12 col-lg-3 mt-sm-4 mt-lg-0 mt-4">
                        @if (count($data['rows']) != 0)
                            <h4 class="bistrit-samachar-h1 text-center">ताजा खबर</h4>
                            <div class="row g-1">

                                @foreach ($data['rows']->skip(4)->take(6) as $row)
                                @php
                                $image = \App\Model\Dcms\PostImage::where('post_unique_id', $row->post_unique_id)->first();
                            @endphp
                                    <a href="{{ route('site.post.show', ['post' => $row->post_unique_id]) }}">
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-12">
                                            <div class="card text-bg-transparent col-image-bg">
                                              @if($image)
                                                <img src="{{ $image->images }}" class="sangh-card-img-filter">
                                                @endif
                                                <div
                                                    class="card-body position-absolute sangh-card-abs-text text-light text-start mt-0">
                                                    <p class="card-text">
                                                        @if (isset($row->title))
                                                            {{ $row->title }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="province-second-class mt-2 pe-0 mb-5">
            <div class="container">
                @if (count($data['rows']) != 0)
                    <h3 class="bistrit-samachar-h1">विस्तृत समाचार</h3>
                    <div class="row gap-0 horizontal-row-1 pt-2">

                        @foreach ($data['rows']->skip(6) as $row)
                        @php
                        $image = \App\Model\Dcms\PostImage::where('post_unique_id', $row->post_unique_id)->first();
                    @endphp
                            <a href="{{ route('site.post.show', ['post' => $row->post_unique_id]) }}">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                    <div class="card h-100 border-0 no-bg-card">
                                      @if($image)
                                        <img src="{{ $image->images }}" class="card-img-top image-hoo" alt="...">
                                        @endif
                                        <div class="card-body d-flex flex-column ps-0">
                                            <h5 class="card-title">
                                                @if (isset($row->title))
                                                    {{ $row->title }}
                                                @endif
                                            </h5>
                                            <p class="card-text flex-grow-1 justify-text-istaniya-taha">
                                                @if (isset($row->content))
                                                    {!! mb_strimwidth($row->content, 0, 100, '...') !!}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>
                @endif
            </div>
        </section>
    @elseif(Request::segment(2) == 9)
        <section class="province-content mt-4 p-0 pb-5">
            <div class="province">
                <div class="container">
                    @if (count($data['rows']) != 0)
                        @foreach ($data['rows']->take(1) as $row)
                        @php
                        $image = \App\Model\Dcms\PostImage::where('post_unique_id', $row->post_unique_id)->first();
                    @endphp
                            <div class="card mb-3 mt-4">

                                <div class="row g-0 row-card-main">
                                    <div class="col-md-6 border-0">
                                      @if($image)
                                        <img src="{{ $image->images }}" class="card-img-top bagmati-news-1-img"
                                            alt="...">
                                            @endif
                                    </div>
                                    <div class="col-md-6 province-col-div-1  ">
                                        <div class="card-body province-card-body-1 ms-2">
                                            <p class="posted-date-p mt-1">
                                                @if ($data['lang'] == 1)
                                                    {{ date('F d, Y', strtotime($row->created_at)) }}
                                                @else
                                                    {{ datenep($row->created_at, true) }}
                                                @endif
                                                <span class="posted-date-p ms-2">|<i
                                                        class="ri-account-circle-fill fs-5 me-1 ms-2"></i>सम्पादक
                                                    नेपाल</span>
                                            </p>

                                            <h5 class="card-title fs-2 mt-5 text-light text-center">
                                                @if (isset($row->title))
                                                    {{ $row->title }}
                                                @endif
                                            </h5>
                                            <p class="card-text text-light">
                                                @if (isset($row->content))
                                                    {!! $row->content !!}
                                                @endif
                                            </p>
                                            <div class="read-more-btn-province-container text-center mt-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @else
                        <h2>
                            @if ($data['lang'] == 1)
                                Updating.
                            @else
                                अपडेट हुदैछ !
                            @endif
                        </h2>
                    @endif
                </div>
            </div>

            <div class="province-second-class mt-5 pe-0 ms-lg-4">
                <div class="container">
                    <div class="row row-cols-sm-2 row-cols-md-2 row-cols-lg-1">
                        <div class="col-12 col-sm-12 col-md-7 col-lg-8">
                            <div class="row gap-0 horizontal-row-1 pt-2">
                                @if (count($data['rows']) != 0)
                                    @foreach ($data['rows']->skip(1)->take(6) as $row)
                                    @php
                                    $image = \App\Model\Dcms\PostImage::where('post_unique_id', $row->post_unique_id)->first();
                                @endphp
                                        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                            <div class="card h-100 border-0 vertical-cols-card-1">
                                              @If($image)
                                                <img src="{{ $image->images }}" class="card-img-top h-100 fixed-size"
                                                    alt="...">
                                                    @endif
                                                <div class="card-body d-flex flex-column ps-0">
                                                    <h5 class="card-title">
                                                        @if (isset($row->title))
                                                            {{ $row->title }}
                                                        @endif
                                                    </h5>
                                                    <p class="card-text flex-grow-1">
                                                        @if (isset($row->content))
                                                            {!! mb_strimwidth($row->content, 0, 100, '...') !!}
                                                        @endif
                                                    </p>
                                                    <p><a href="#" class="link-underline">पूरा पढ्नुहोस्</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col col-sm-12 col-md-5 col-lg-4">
                            <div class="row g-1">
                                @if (count($data['rows']) != 0)
                                    @foreach ($data['rows']->skip(7) as $row)
                                    @php
                                    $image = \App\Model\Dcms\PostImage::where('post_unique_id', $row->post_unique_id)->first();
                                @endphp
                                        <div class="col-12 col-sm-6 col-md-12 col-lg-12">
                                            <div class="card text-bg-transparent col-image-bg">@if($image)
                                                <img src="{{ $image->images }}" class="sangh-card-img-filter">@endif
                                                <div
                                                    class="card-body position-absolute sangh-card-abs-text text-light text-start mt-0">
                                                    <p class="card-text">
                                                        @if (isset($row->title))
                                                            {{ $row->title }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    @elseif(Request::segment(2) == 14 || Request::segment(2) == 15)
        @include('site.sangh')
    @elseif(Request::segment(2) == 16 ||
            Request::segment(2) == 17 ||
            Request::segment(2) == 18 ||
            Request::segment(2) == 19 ||
            Request::segment(2) == 20 ||
            Request::segment(2) == 21 ||
            Request::segment(2) == 22 ||
            Request::segment(2) == 23 ||
            Request::segment(2) == 24 ||
            Request::segment(2) == 25 ||
            Request::segment(2) == 26 ||
            Request::segment(2) == 27 ||
            Request::segment(2) == 28 ||
            Request::segment(2) == 29 ||
            Request::segment(2) == 30)
        @include('site.adalat')
    @elseif(Request::segment(2) == 31 ||
            Request::segment(2) == 32 ||
            Request::segment(2) == 33 ||
            Request::segment(2) == 34 ||
            Request::segment(2) == 35 ||
            Request::segment(2) == 36 ||
            Request::segment(2) == 37 ||
            Request::segment(2) == 38 ||
            Request::segment(2) == 39 ||
            Request::segment(2) == 40 ||
            Request::segment(2) == 41)
        @include('site.badijya')
    @elseif(Request::segment(2) == 42 ||
            Request::segment(2) == 43 ||
            Request::segment(2) == 44 ||
            Request::segment(2) == 45 ||
            Request::segment(2) == 46 ||
            Request::segment(2) == 47 ||
            Request::segment(2) == 48 ||
            Request::segment(2) == 49 ||
            Request::segment(2) == 50 ||
            Request::segment(2) == 51 ||
            Request::segment(2) == 52 ||
            Request::segment(2) == 53)
        @include('site.suchana')
    @elseif(Request::segment(2) == 105 ||
            Request::segment(2) == 120 ||
            Request::segment(2) == 55 ||
            Request::segment(2) == 56 ||
            Request::segment(2) == 57)
        @include('site.bipat')
    @elseif(Request::segment(2) == 58 ||
            Request::segment(2) == 59 ||
            Request::segment(2) == 60 ||
            Request::segment(2) == 61 ||
            Request::segment(2) == 62 ||
            Request::segment(2) == 111 ||
            Request::segment(2) == 63 ||
            Request::segment(2) == 64 ||
            Request::segment(2) == 65 ||
            Request::segment(2) == 66 ||
            Request::segment(2) == 67 ||
            Request::segment(2) == 68 ||
            Request::segment(2) == 69 ||
            Request::segment(2) == 70)
        @include('site.share-bazar')
    @elseif(Request::segment(2) == 71 ||
            Request::segment(2) == 72 ||
            Request::segment(2) == 73 ||
            Request::segment(2) == 74 ||
            Request::segment(2) == 75 ||
            Request::segment(2) == 76 ||
            Request::segment(2) == 77 ||
            Request::segment(2) == 78)
        @include('site.goreto-surungmarga')
    @elseif(Request::segment(2) == 79 ||
            Request::segment(2) == 80 ||
            Request::segment(2) == 81 ||
            Request::segment(2) == 82 ||
            Request::segment(2) == 121 ||
            Request::segment(2) == 83 ||
            Request::segment(2) == 84 ||
            Request::segment(2) == 85 ||
            Request::segment(2) == 86 ||
            Request::segment(2) == 88 ||
            Request::segment(2) == 89 ||
            Request::segment(2) == 90 ||
            Request::segment(2) == 91 ||
            Request::segment(2) == 92 ||
            Request::segment(2) == 93 ||
            Request::segment(2) == 94)
        @include('site.mansarobar-yatra')
    @elseif(Request::segment(2) == 95 ||
            Request::segment(2) == 96 ||
            Request::segment(2) == 97 ||
            Request::segment(2) == 98 ||
            Request::segment(2) == 99 ||
            Request::segment(2) == 100 ||
            Request::segment(2) == 101 ||
            Request::segment(2) == 102 ||
            Request::segment(2) == 103 ||
            Request::segment(2) == 110)
        @include('site.loksewa-tayari')
    @elseif(Request::segment(2) == 122 || Request::segment(2) == 123)
        @include('site.kirishi')
    @endif

@endsection
