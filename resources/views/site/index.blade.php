@extends('site.layouts.app')
@section('content')
    <section class="trending-news mb-3">
        <div class="container">
            @if (isset($data['tag']))
                <ul class="trending-news-list">
                    @foreach ($data['tag'] as $row)
                        <li><a href="{{ url($row['url']) }}">{{ $row['name'] }}</a></li>
                    @endforeach
                    {{-- <li><a href="trending-2.html">केपी शर्मा ओली</a></li>
            <li><a href="trending-3.html">प्रतिनिधिसभा बैठक</a></li>
            <li><a href="trending-4.html">पेरिस ओलम्पिक</a></li>
            <li><a href="trending-5.html">सङ्क्रमणकालीन न्याय</a></li>
            <li><a href="trending-6.html">सुनचाँदी</a></li>
            <li><a href="trending-7.html">अपराध</a></li> --}}
                </ul>
            @endif
        </div>
    </section>
    {{-- <div class="hightlight-news position-relative py-2">
    <div class="container ">
        <marquee>This text will scroll from right to left</marquee>
    </div>
    <span>
        <p>Hightlight</p>
    </span>
</div> --}}
    <section class="home-section">

        <div class="container">
            @if ($data['first_adv'])
                <!-- Check if the first advertisement exists -->
                <img src="{{ asset($data['first_adv']->image) }}" width="100%" alt="Advertisement">
            @else
                <img src="{{ asset('assets/frontend/images/900X1002.gif') }}" width="100%" alt="Default Ad">
            @endif
        </div>

    </section>

    {{-- Main News --}}
    @if (isset($data['latest_post']) && $data['latest_post']->count() > 0)
        <section class="banner mt-lg-4">
            <div class="container my-3">
                <a href="{{ route('site.post.show', ['post' => $data['latest_post']->post_unique_id]) }}">
                    <div class="banner-heading">
                        <h3 class="heading-all text-center">{{ $data['latest_post']->title }}</h3>
                    </div>
                </a>
                <div class="banner-icon d-flex justify-content-center align-items-center mb-1">
                    <div class="banner-social image-circle d-flex align-items-center justify-content-center"><img
                            src="{{ asset($all_view['setting']->logo) }}" alt="Person"> </div>
                    <div class="banner-social">
                        @if ($data['lang'] == 1)
                            Naya Press
                        @else
                        नयाँ प्रेस
                        @endif
                    </div>
                    <div class="banner-social"><i class="fa-regular fa-clock"></i>
                        @if ($data['lang'] == 1)
                            {{ date('F d, Y', strtotime($data['latest_post']->created_at)) }}
                        @else
                            {{ datenep($data['latest_post']->created_at, true) }}
                        @endif
                    </div>
                    @php
                        $startTime = \Carbon\Carbon::parse($data['latest_post']->created_at);
                        $endTime = \Carbon\Carbon::now(); // Current time
                        $diffInMinutes = $startTime->diffInMinutes($endTime);
                    @endphp
                    <div class="banner-social"><i class="fa-solid fa-hourglass-half"> </i>
                        @if ($data['lang'] == 1)
                            {{ timesAgoEn($data['latest_post']->created_at, true) }}
                        @else
                            {{ timesAgoNp($data['latest_post']->created_at, true) }}
                        @endif
                    </div>
                </div>
                <a href="{{ route('site.post.show', ['post' => $data['latest_post']->post_unique_id]) }}">
                    <div class="banner-image mt-3">
                        <a href="{{ route('site.post.show', ['post' => $data['latest_post']->post_unique_id]) }}">
                             @php
                                $image = \App\Model\Dcms\PostImage::where(
                                    'post_unique_id',
                                    $data['latest_post']->post_unique_id,
                                )->first();
                            @endphp
                             @if ($image)
                            <img src="{{ asset($image->images) }}" alt="Banner Image">
                            @endif
                        </a>
                    </div>
                    <div class="banner-info pt-3">
                        <p>
                            {!! \Illuminate\Support\Str::limit($data['latest_post']->content, 500) !!} <a
                                href="{{ route('site.post.show', ['post' => $data['latest_post']->post_unique_id]) }}"
                                class="read-more  text-danger"><small>Read More</small></a>
                            <hr>
                        </p>
                    </div>
                </a>
            </div>
        </section>
    @endif
    {{-- Main News complete --}}
    <div class="container">
        <section class="mb-1">

            <div class="container">
                @if ($data['second_adv'])
                    <!-- Check if the second advertisement exists -->
                    <img src="{{ asset($data['second_adv']->image) }}" width="100%" alt="Advertisement">
                @else
                    <img src="{{ asset('assets/frontend/images/900X1002.gif') }}" width="100%" alt="Default Ad">
                @endif
            </div>

        </section>
    </div>

    @if (isset($data['provinces']) && $data['provinces']->count() > 0)
 
        <section class="owl-slider bg-danger pb-lg-5 pb-3">
            <div class="container">
                
                <a href="{{ route('site.provinces') }}">
                    <h3 class="heading-all py-4 text-center text-white"> Province News</h3>
                </a>
               
                <div class="owl-carousel owl-theme">
                    @if (isset($data['provinces']))
                        @foreach ($data['provinces'] as $row)
                            @php
                                $image = \App\Model\Dcms\PostImage::where(
                                    'post_unique_id',
                                    $row->post_unique_id,
                                )->first();
                            @endphp
                            @if (route::has('site.province.post.show'))
                                @if ($image)
                                    <div class="slider-news">
                                        <div class="card">
                                            <img src="{{ $image->images }}" class="card-img-top" alt="News Image">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    @if (isset($row->title))
                                                        {{ mb_strimwidth($row->title, 0, 50, '...') }}
                                                    @endif
                                                </h5>
                                                <a href="{{ route('site.province.post.show', ['post' => $row->post_unique_id]) }}"
                                                    class="btn">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif
    {{-- Category 0 Complete --}}

    {{--   Aartha --}}
    @if (isset($data['aartha_post']) && $data['aartha_post']->isNotEmpty())
        <section class="pradesh-news">
            <div class="container">

                <h3 class="heading-all  my-3 py-2 text-center">अर्थ समाचार</h3>
                <div class="row gb-5 ">
                    <div class="col-12 col-sm-12 col-md-7 col-lg-8">
                        <section>

                            <div class="container">
                                @if ($data['third_adv'])
                                    <!-- Check if the second advertisement exists -->
                                    <img src="{{ asset($data['third_adv']->image) }}" width="100%" alt="Advertisement">
                                @else
                                    <img src="{{ asset('assets/frontend/images/900X1002.gif') }}" width="100%"
                                        alt="Default Ad">
                                @endif
                            </div>

                        </section>
                        <div class="row g-3 horizontal-row-1 pt-2">

                            @foreach ($data['aartha_post'] as $row)
                                @php
                                    $image = \App\Model\Dcms\PostImage::where(
                                        'post_unique_id',
                                        $row->post_unique_id,
                                    )->first();
                                @endphp
                                @if ($image)
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                        <div class="card h-100 border-0 vertical-cols-card-1">
                                            <img src="{{ asset($image->images) }}" class="card-img-top h-100 fixed-size"
                                                alt="...">
                                            <div class="card-body d-flex flex-column p-4">
                                             
                                                <a class="text-decoration-none" href="{{ route('site.post.show', ['post' => $row->post_unique_id]) }}"
                                                    class="link-underline"><h5 class="card-title">{{ $row->title }}</h5></a>
                                                {{-- <p><a href="{{ route('site.post.show', ['post' => $row->post_unique_id]) }}"
                                                        class="link-underline">पूरा पढ्नुहोस्</a></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    {{-- Vertical  --}}
                    <div class="col-12 col-sm-12 col-lg-4 col-md-5">
                        <div class="row g-3 vertical-col-5">
                            @foreach ($data['province_post'] as $post)
                                @php
                                    $image = \App\Model\Dcms\PostImage::where(
                                        'post_unique_id',
                                        $post->post_unique_id,
                                    )->first();
                                @endphp
                                @if ($image)
                                    <div class="col-6 col-md-12 col-lg-12 col-sm-6">
                                        <div class="card  h-100 border-0 vertical-cols-card-1">
                                            <div class="row g-0">
                                                <div class="col-md-4 image-fluid-container">
                                                    <a
                                                        href="{{ route('site.province.post.show', ['post' => $post->post_unique_id]) }}">
                                                        <img src="{{ $image->images }}"
                                                            class="img-fluid vertical-image-fluid" alt="...">
                                                    </a>
                                                </div>
                                                <div class="col-md-8">
                                                    <a
                                                        href="{{ route('site.province.post.show', ['post' => $post->post_unique_id]) }}">
                                                        <div class="card-body text-dark">
                                                            <h5 class="card-title" style="font-size: 18px;"> @if (isset($post->title))
                                                                {{ mb_strimwidth($post->title, 0, 50, '...') }}
                                                            @endif</h5>
                                                            <small >
                                                                @if ($data['lang'] == 1)
                                                                    {{ timesAgoEn($post->created_at, true) }}
                                                                @else
                                                                    {{ timesAgoNp($post->created_at, true) }}
                                                                @endif
                                                            </small>
                                                        </div>
                                                    </a>
                                                   
                                                </div>
                                            </div>
                                           

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    {{-- End vertical --}}
                </div>
            </div>
        </section>
    @endif

    {{-- पूर्वाधार विकास Start --}}

    @if (isset($data['purvadharvikash']) && $data['purvadharvikash']->isNotEmpty())
        <section class="sarkar">
            <div class="container">

                <h3 class="heading-all  my-3 pt-4 text-center border-top-line d-block">पूर्वाधार विकास</h3>

                <div class="row d-flex justify-content-center">

                    @foreach ($data['purvadharvikash']->take(8) as $row)
                        @php
                            $image = \App\Model\Dcms\PostImage::where('post_unique_id', $post->post_unique_id)->first();
                        @endphp
                        @if ($image)
                            <div class="col-md-3 col-sm-6 mt-4">
                                <a href="{{ route('site.post.show', ['post' => $row->post_unique_id]) }}">
                                    <div class="sarkar-image">
                                        <img src="{{ asset($image->images) }}" alt="Sarkar Image" class="img-fluid">
                                        <div class="sarkar-heading">
                                            <h4>{{ $row->title }}</h4>
                                        </div>
                                    </div>

                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>

        </section>
    @endif
    {{-- पूर्वाधार विकास End --}}

    {{-- तथ्याङक घर Start --}}
    @if (isset($data['tathyanka']) && $data['tathyanka']->isNotEmpty())
        <section class="headline">
            <div class="container bg-light mt-3">

                <h3 class="heading-all my-1 pt-4 text-center">तथ्याङक घर</h3>

                <section>

                    <div class="container">
                        @if ($data['fourth_adv'])
                            <!-- Check if the second advertisement exists -->
                            <img src="{{ asset($data['fourth_adv']->image) }}" width="100%" alt="Advertisement">
                        @else
                            <img src="{{ asset('assets/frontend/images/900X1002.gif') }}" width="100%"
                                alt="Default Ad">
                        @endif
                    </div>

                </section>
                <div class="row gy-1 mx-4 ">
                    @foreach ($data['tathyanka'] as $row)
                        @php
                            $image = \App\Model\Dcms\PostImage::where('post_unique_id', $post->post_unique_id)->first();
                        @endphp
                        @if ($image)
                            <div class="col-lg-3 col-md-6 pt-2 ">
                                <div class="headline-news d-flex my-4">
                                    <div class="headline-news-image">
                                        <img src="{{ asset($image->images) }}" alt="Row News">
                                    </div>
                                    <div class="headline-news-heading my-auto px-2">
                                        <a href="{{ route('site.post.show', ['post' => $row->post_unique_id]) }}">
                                            <h4>{{ \Illuminate\Support\Str::limit($row->title, 19) }}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
            
                </div>
            </div>
        </section>
    @endif
    {{-- तथ्याङक घर End --}}

    {{--   jaalmausam start --}}
    @if (isset($data['jaalmausam']) && $data['jaalmausam']->isNotEmpty())
        <section class="digital bg-danger pb-lg-5 pt-2 pb-3">
            <div class="container">
                <h3 class="heading-all my-3 py-2 text-center text-white">जल तथा मौसम</h3>
                <div class="owl-carousel owl-theme" id="digital-owl">
                    @foreach ($data['jaalmausam'] as $row)
                        @php
                            $image = \App\Model\Dcms\PostImage::where('post_unique_id', $post->post_unique_id)->first();
                        @endphp
                        @if ($image)
                            <div class="slider-news">
                                <div class="card">
                                    <img src="{{ asset($image->images) }}" class="card-img-top" alt="News Image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $row->title }}</h5>
                                        <a href="{{ route('site.post.show', ['post' => $row->post_unique_id]) }}"
                                            class="btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
            

                </div>
            </div>
        </section>
    @endif
    {{--   jaalmausam end --}}

    {{-- पर्यटक start --}}
    @if (isset($data['paryatan']) && $data['paryatan']->isNotEmpty())
        <section class="kanun">
            <div class="container">
                <h3 class="heading-all my-3 py-2 text-center">पर्यटक</h3>
                <div class="row">
                    @foreach ($data['paryatan'] as $row)
                        @php
                            $image = \App\Model\Dcms\PostImage::where('post_unique_id', $post->post_unique_id)->first();
                        @endphp
                        @if ($image)
                            <div class="col-lg-3 col-md-6 mt-2">
                                <a href="{{ route('site.post.show', ['post' => $row->post_unique_id]) }}">
                                    <div class="kanun-image">
                                        <img src="{{ asset($image->images) }}" alt="Kanun Image" class="img-fluid">
                                        <div class="kanun-heading">
                                            <h4>{{ $row->title }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- पर्यटक End --}}

    {{-- भ्रष्टाचार start --}}
    @if (isset($data['vastachar']) && $data['vastachar']->isNotEmpty())
        <section class="samaj">
            <div class="container">
                <h3 class="heading-all my-3 py-2 text-center">भ्रष्टाचार</h3>
                <div class="row">
                    @foreach ($data['vastachar'] as $row)
                        @php
                            $image = \App\Model\Dcms\PostImage::where('post_unique_id', $post->post_unique_id)->first();
                        @endphp
                        @if ($image)
                            <div class="col-lg-6">
                                <div class="card card-first mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-5">
                                            <img src="{{ asset($image->images) }}" class="img-fluid rounded-start"
                                                alt="...">
                                        </div>
                                        <div class="col-md-7">
                                            <a href="{{ route('site.post.show', ['post' => $row->post_unique_id]) }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $row->title }}
                                                    </h5>
                                                    <p class="card-text">{!! $row->content !!}
                                                    </p>
                                                    <p class="card-text"><small class="text-body-secondary">Last updated 3
                                                            mins
                                                            ago</small></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>

            </div>

        </section>
    @endif
    {{-- भ्रष्टाचार end --}}


    {{-- खाद्य सुरक्षा start --}}
    @if (isset($data['khadyasurukshya']) && $data['khadyasurukshya']->isNotEmpty())
        <section class="bipat">
            <div class="container">
                <h3 class="heading-all my-3 pt-4 text-center border-top-line ">खाद्य सुरक्षा</h3>
                <section>

                    <div class="container">
                        @if ($data['fifth_adv'])
                            <!-- Check if the second advertisement exists -->
                            <img src="{{ asset($data['fifth_adv']->image) }}" width="100%" alt="Advertisement">
                        @else
                            <img src="{{ asset('assets/frontend/images/900X1002.gif') }}" width="100%"
                                alt="Default Ad">
                        @endif
                    </div>

                </section>
                <div class="row">
                    @foreach ($data['khadyasurukshya'] as $row)
                        @php
                            $image = \App\Model\Dcms\PostImage::where('post_unique_id', $post->post_unique_id)->first();
                        @endphp
                        @if ($image)
                            <div class="col-md-6 col-12 mt-3">
                                <a href="{{ route('site.branch', ['branch' => $row->staff_unique_id]) }}">
                                    <div class="bipat-image">
                                        <img src="{{ asset($image->images) }}" alt="Bipat Image" class="img-fluid">
                                        <div class="bipat-heading">
                                            <h4>{{ $row->name }}</h4>
                                        </div>
                                    </div>

                                </a>

                            </div>
                        @endif
                    @endforeach
           
                </div>

            </div>
        </section>
    @endif
    {{-- खाद्य सुरक्षा End --}}


    {{-- विशेषाङ्क Start --}}
    {{-- {{ dd($data['special_words']) }} --}}
    @if (isset($data['special_words']) && $data['special_words']->isNotEmpty())
        <section class="aartha">
            <div class="container">
                <h3 class="heading-all my-3 py-2 text-center">विशेषाङ्क</h3>

                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            @foreach ($data['special_words'] as $row)
                                @php
                                    $image = \App\Model\Dcms\PostImage::where(
                                        'post_unique_id',
                                        $post->post_unique_id,
                                    )->first();
                                @endphp
                                @if ($image)
                                    <div class="col-lg-4 col-md-6">
                                        <a href="{{ route('site.post.show', ['post' => $row->post_unique_id]) }}">
                                            <div class="aartha-image">
                                                <img src="{{ asset($image->images) }}" alt="{{ $row->title }} Image"
                                                    class="img-fluid">
                                                <div class="aartha-heading">
                                                    <h4>{{ $row->title }}</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    {{-- Vertical  --}}
                    <div class="col-lg-3 col-md-12">
                        <div class="aartha-news d-flex justify-content-center  align-content-center my-3">
                            <div class="aartha-news-image">
                                <img src="{{ asset('assets/frontend/images/news6.jpg') }}" alt="Row News">
                            </div>
                            <div class="aartha-news-heading my-auto px-2">
                                <a href="#">
                                    <h4>नेपाली सेनामा महत्वकांक्षा बढ्दा व्यवस्थामाथि संकट पैदा हुनसक्छ: सांसद गुरुङ</h4>
                                </a>
                            </div>
                        </div>
                        <div class="aartha-news d-flex justify-content-center  align-content-center my-3">
                            <div class="aartha-news-image">
                                <img src="{{ asset('assets/frontend/images/news7.webp') }}" alt="Row News">
                            </div>
                            <div class="aartha-news-heading my-auto px-2">
                                <a href="#">
                                    <h4>नेपाली सेनामा महत्वकांक्षा बढ्दा व्यवस्थामाथि संकट पैदा हुनसक्छ: सांसद गुरुङ</h4>
                                </a>
                            </div>
                        </div>
                        <div class="aartha-news d-flex justify-content-center  align-content-center my-3">
                            <div class="aartha-news-image">
                                <img src="{{ asset('assets/frontend/images/news8.jpg') }}" alt="Row News">
                            </div>
                            <div class="aartha-news-heading my-auto px-2">
                                <a href="#">
                                    <h4>नेपाली सेनामा महत्वकांक्षा बढ्दा व्यवस्थामाथि संकट पैदा हुनसक्छ: सांसद गुरुङ</h4>
                                </a>
                            </div>
                        </div>
                        <div class="aartha-news d-flex justify-content-center  align-content-center my-3">
                            <div class="aartha-news-image">
                                <img src="{{ asset('assets/frontend/images/news9.jpg') }}" alt="Row News">
                            </div>
                            <div class="aartha-news-heading my-auto px-2">
                                <a href="#">
                                    <h4>नेपाली सेनामा महत्वकांक्षा बढ्दा व्यवस्थामाथि संकट पैदा हुनसक्छ: सांसद गुरुङ</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- End vertical --}}
                </div>
            </div>

        </section>
    @endif
    {{-- विशेषाङ्क End --}}

    <section class="video-section">
        <div class="container">
            <h3 class="heading-all my-3 py-2 text-center">भिडियो खण्ड</h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @if (isset($data['video']))
                            @foreach ($data['video'] as $row)
                                <div class="col-lg-3 col-md-6">
                                    <a href="#">
                                        <div class="aartha-video">
                                            <iframe width="100%" height="auto"
                                                src="https://www.youtube.com/embed/<?php echo $row->video_id; ?>"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-4">

        <div class="container">
            @if ($data['sixth_adv'])
                <!-- Check if the second advertisement exists -->
                <img src="{{ asset($data['sixth_adv']->image) }}" width="100%"
                    alt="Advertisement">
            @else
                <img src="{{ asset('assets/frontend/images/900X1002.gif') }}" width="100%"
                    alt="Default Ad">
            @endif
        </div>

    </section>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content position-relative">

                <button type="button" class="btn btn-danger position-absolute" data-bs-dismiss="modal"
                    style="right: 0; top: -50px;">skip this</button>
                    @if ($data['pop'] && isset($data['pop']) && count($data['pop']) > 0)
                    <div id="carouselPopup" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($data['pop'] as $index => $image)
                                <div class="modal-body carousel-item @if ($index == 0) active @endif">
                                    <img src="{{ asset($image->images) }}" alt="{{ $data['popup']->title }}" width="100%">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselPopup" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselPopup" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                @else
                    <div class="modal-body">
                        <p>No image available.</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection


@section('js')
    <!-- typed js start -->

    <!-- typed js end -->
@endsection
