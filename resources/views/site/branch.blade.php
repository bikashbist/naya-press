@extends('site.layouts.app')
@section('css')
@endsection
@section('content')

<section class="province-content mt-4 p-0">
    <div class="container">
        <div class="province-header d-flex flex-column justify-content-center align-items-center mb-4">
            <h3 class="province-h1 mb-0 pb-0 position-relative">{{$data['cat']->name}}</h3>
            <div class="loader mt-5"></div>
        </div>
    </div>
</section>

<div class="province mt-5">
    <div class="container">
        @if($data['rows'])
        @foreach($data['rows']->take(1) as $row)
        <a href="{{ route('site.branch.post.show', ['id'=> $row->staff_unique_id]) }}">
        <div class="card mb-3 mt-2">
            
            <div class="row g-0 row-card-main">
                
                <div class="col-md-7 border-0">
                    <img src="{{ asset($row->image)}}" class="card-img-top bagmati-news-1-img" alt="...">
                </div>
                <div class="col-md-5 istaniya-taha-col-div-1  ">
                    <div class="card-body province-card-body-1 text-center">
                        <p class="posted-date-p mt-1">@if($data['lang'] == 1) {{ date('F d, Y', strtotime($row->created_at)) }} @else {{datenep($row->created_at, true)}} @endif<span class="posted-date-p ms-2">|<i
                                    class="ri-account-circle-fill fs-5 me-1 ms-2"></i>सम्पादक नेपाल</span></p>
                        <h5 class="card-title fs-2 mt-5 text-light">{{$row->name}}</h5>
                        <p class="card-text mt-4 text-white justify-text-istaniya-taha">@if(isset($row->description )) {!! mb_strimwidth($row->description, 0, 400, "...") !!}@endif</p>
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


<section class="new mb-5 mt-4">
    <div class="container">
        <div class="row">
            <div class="col col-sm-12 col-md-12 col-lg-3">
                <div class="row g-1">
                    @if($data['rows'])
                    @foreach($data['rows']->skip(1)->take(4) as $row)
                    <a href="{{ route('site.branch.post.show', ['id'=> $row->staff_unique_id]) }}">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-12">
                        <div class="card text-bg-transparent col-image-bg">
                            <img src="{{ asset($row->image)}}" class="sangh-card-img-filter">
                            <div class="card-body position-absolute sangh-card-abs-text text-light text-start mt-0">
                                <p class="card-text">{{$row->name}}</p>
                            </div>
                        </div>
                    </div>
                    </a>
                    @endforeach
                    @endif
                   
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                <div class="row">
                    @if($data['rows'])

                    @foreach($data['rows']->skip(5) as $row)
                    <a href="{{ route('site.branch.post.show', ['id'=> $row->staff_unique_id]) }}">
                    <div class="col-12 card-border-bottom">
                        <div class="card border-0 mb-3">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$row->name}}</h4>
                                        <p class="card-text justify-text-istaniya-taha">@if(isset($row->description )) {!! mb_strimwidth($row->description, 0, 400, "...") !!}@endif</p>
                                        <p class="card-text"><small class="text-body-secondary">@if($data['lang'] == 1) {{timesAgoEn($row->created_at, true)}} @else {{timesAgoNp($row->created_at, true)}} @endif</small></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="images/gaupalika.jpg" class="img-fluid rounded-start h-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>


@endsection