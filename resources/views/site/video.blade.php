@extends('site.layouts.app')
@section('content')

{{-- <section class="main-section__content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="contact-info-box">

                    <h4 class="contact-title"> @if($data['lang'] == 1) All Video @else जानकारी मूलक भिडियोहरू @endif </h4>


                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div>

    <div class="album-container">
        <div class="album">
            @if(isset($data['video']))
            @foreach($data['video'] as $row)
            {{-- <a href="{{ route('site.album.show', ['id'=> $row->id ]) }}"> --}}
              {{--  <iframe src="https://www.youtube.com/embed/<?php echo $row->video_id; ?>" width="100%" height="200px" frameborder="0" allowfullscreen=""></iframe>
                <p>{{$row->video_title}}</p>
            {{-- </a> 
            @endforeach
            @endif
        </div>
    </div>


    </div>
</section> --}}

<section class="video-section">
    <div class="container">
        <h3 class="heading-all my-3 py-2 text-center">भिडियोहरु</h3>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @if(isset($data['video']))
                    @foreach($data['video'] as $row)
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
@endsection