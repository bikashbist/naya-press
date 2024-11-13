@extends('site.layouts.app')
@section('content')
<div class="line-container">
    <!-- Line before the box -->
    <div class="line"></div>

    <!-- Box with text -->
    <div class="box">{{ $data['province']->province_np }}</div>

    <!-- Line after the box -->
    <div class="line"></div>
</div>
<div class="container my-5">

<!-- Navigation Tabs -->
<div class="button-container ms-5">
  @foreach($data['districts'] as $district)
    @if(isset($district->province_id) && isset($district->id))
    <div class="btn-group" role="group">
      <a href="{{ route('site.singleDistrict', ['district_id' => $district->id]) }}" class="btn btn-outline-secondary">{{ $district->district_np }}</a>
    </div>
    @else
    <div class="btn-group" role="group">
      <button class="btn btn-outline-secondary" disabled>Invalid Data</button>
    </div>
  @endif
@endforeach
</div>
 
<!-- News Cards -->
<div class="row" ms -5>
<!-- Card 1 -->
@if(count($data['post_province']) != 0)
    @foreach($data['post_province'] as $post)
  
            <div class="col-md-3 mb-3">
              <a href="{{ route('site.province.post.show', ['post'=> $post->post_unique_id]) }}">
                <div class="card h-100">
                    <img src="{{ asset($post->thumbnail) }}" class="card-img-top" alt="Halesi Tuwachung Municipality">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                    </div>
                    <div class="card-footer text-muted">
                        <span class="reporter">@if($data['lang'] == 1) {{ date('F d, Y', strtotime($post->created_at)) }} @else {{datenep($post->created_at, true)}} @endif </span>
                    </div>
                </div>
               </a>
            </div>
   
    @endforeach
    @else
    <h2> @if($data['lang'] == 1) Updating. @else अपडेट हुदैछ ! @endif</h2>
@endif
</div>

</div>
</div>
</div>
@endsection