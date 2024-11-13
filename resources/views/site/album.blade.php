@extends('site.layouts.app')
@section('content')
{{-- <div class="container-fluid">
    <div class="container">
        <div class="row">
            <h3 class="heading-all my-3 py-2 text-center">फोटो फिचर</h3>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row album-main">
            @if(isset($data['album']))
            @foreach($data['album'] as $row)
            @if(Route::has('site.album.show'))
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <a href="{{ route('site.album.show', $row->id) }}">
                    <img src="{{asset($row->cover_image)}}" class="pulse-image">
                    <h4> {{$row->title}}</h4>
                </a>
            </div>
            @endif
            @endforeach
            @endif
        </div>
    </div>
</div> --}}

<section class="video-section">
    <div class="container">
        <h3 class="heading-all my-3 py-2 text-center">फोटो फिचर</h3>
        <div class="row">
            
                    @if(isset($data['album']))
                    @foreach($data['album'] as $row)
                    @if(Route::has('site.album.show'))
                    <div class="col-lg-3">
                        <a class="d-block "  href="{{ route('site.album.show', $row->id) }}">
                            <div class="main-adds h-100 my-3">
                                <img src="{{asset($row->cover_image)}}" alt="" class="img-fluid" style="width: 100%; height:200px; object-fit:cover;">
                                <h4 class="text-dark"> {{$row->title}}</h4>
                            </div>
                        </a>
                        
                    </div>
               
                    @endif
                    @endforeach
                    @endif
                
        </div>
    </div>
</section>
@endsection
