@extends('site.layouts.app')
@section('content')
<section class="province-content mt-4 p-0">
    <div class="sangh-head-container">
        <div class="container">
            <div class="province-header d-flex flex-column justify-content-center align-items-center mb-4">
                <h3 class="province-h1 mb-0 pb-0 position-relative">संघीय सरकार</h3>
                <div class="loader mt-5"></div>
            </div>
        </div>
    </div>
</section>
<h3 class="purvadhar-heading text-secondary fs-4 text-center">{{ $data['cat']->category_name }}</h3>
<section class="sangh-section-1 pb-3">
    <div class="container">
        <div class="row">
            @if(count($data['rows']) != 0)
            @foreach($data['rows']->take(2) as $row)
            <a href="{{ route('site.post.show', ['post'=> $row->post_unique_id]) }}">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card h-100 border-0 sangh-card-width-full">
                    <div class="card-body sangh-card-1 text-light d-flex flex-column">
                    <p class="posted-date-p mt-0 text-end">@if($data['lang'] == 1) {{ date('F d, Y', strtotime($row->created_at)) }} @else {{datenep($row->created_at, true)}} @endif <span class="posted-date-p ms-2">|<i class="ri-account-circle-fill fs-5 me-1 ms-2"></i>सम्पादक नेपाल</span></p>
                    <h5 class="card-title">@if(isset($row->title)) {{ $row->title }}@endif</h5>
                    <p class="card-text flex-grow-1">@if(isset( $row->content )) {!! mb_strimwidth($row->content, 0, 100, "...") !!}@endif</p>

                    </div>
                    <?php
                      $image =  get_post_image($row->post_unique_id)

                    ?>
                    <img src="{{ $image }}" class="card-img-bottom" alt="...">
                </div>
            </div>
            </a>
            @endforeach
            @else
              <h2> @if($data['lang'] == 1) Updating. @else अपडेट हुदैछ ! @endif</h2>
            @endif
            
        </div>
    </div>
</section>

<section class="sangh-section-2 mt-2 mb-3">
    <div class="container">
        @if(count($data['rows']) != 0)
        <h3 class="bistrit-samachar-h1">ताजा खबर</h3>
        <div class="row g-3">
           
            @foreach($data['rows']->skip(2)->take(4) as $row)
            <a href="{{ route('site.post.show', ['post'=> $row->post_unique_id]) }}">
            <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                <div class="card text-bg-transparent col-image-bg">
                    <?php
                    $image =  get_post_image($row->post_unique_id)

                  ?>
                  <img src="{{ $image }}" class="sangh-card-img-filter" alt="...">
                    {{-- <img src="{{ $row->thumbnail }}" class="sangh-card-img-filter"> --}}
                    <div class="card-body position-absolute sangh-card-abs-text text-light text-start mt-0">
                    <p class="card-text">@if(isset($row->title)) {{ $row->title }}@endif</p>
                    </div>
                </div>  
            </div>
            </a>
            @endforeach
        </div>
        @endif
    </div>
</section>

<section class="province-second-class mt-3 pe-0 mb-5">
    <div class="container">
        @if(count($data['rows']) != 0)
        <h3 class="bistrit-samachar-h1">विस्तृत समाचार</h3>
        <div class="row gap-0 horizontal-row-1 pt-2">
            @foreach($data['rows']->skip(5) as $row)
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
        </div>
        @endif
    </div>
</section>
@endsection