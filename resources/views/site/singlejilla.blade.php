@extends('site.layouts.app')
@section('content')
<div class="line-container">
    <!-- Line before the box -->
    <div class="line"></div>
    <!-- Box with text -->
    <div class="box">{{ $data['province']->province_np }} </div>
    <!-- Line after the box -->
    <div class="line"></div>
</div>
<h3 class="text-center fs-4 mb-4 py-3 "> {{ $data['district']->district_np }}</h3>
<div class="container my-5">

<!-- Navigation Tabs -->
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
          <span class="reporter">@if($data['lang'] == 1) {{ date('F d, Y', strtotime($post->created_at)) }} @else {{datenep($post->created_at, true)}} @endif</span>
      </div>
  </div>
  </a>
</div>

@endforeach
@else
<h2> @if($data['lang'] == 1) Updating. @else अपडेट हुदैछ ! @endif</h2>
@endif
</div>

{{-- <!-- secondd row Cards -->
<div class="row">
<!-- Card 1 -->
<div class="col-md-3 mb-3">
<div class="card h-100">
  <img src="images/news5.webp" class="card-img-top" alt="Halesi Tuwachung Municipality">
  <div class="card-body">
      <h5 class="card-title">महादेव खिन्तिले लिपको ठेक्का ५ बर्षदेखि अलपत्र, हलेसी ‘पम्पिङ’ खानेपानी आयोजना अधुरे</h5>
  </div>
  <div class="card-footer text-muted">
      <span class="reporter">पालिका खबरदाता | भदौ २३, २०८०</span>
  </div>
</div>
</div>
<!-- Card 2 -->
<div class="col-md-3 mb-3">
<div class="card h-100">
    <img src="images/news4.webp" class="card-img-top" alt="News Image 2">
    <div class="card-body">
        <h5 class="card-title">कात्रो लिएर अनसन बस्नु : निवर्तमान मुख्यमन्त्री कार्की</h5>
    </div>
    <div class="card-footer text-muted">
        <span class="reporter">पालिका खबरदाता | भदौ २३, २०८०</span>
    </div>
</div>
</div>
<!-- Card 3 -->
<div class="col-md-3 mb-3">
<div class="card h-100">
    <img src="images/news3.jpeg" class="card-img-top" alt="News Image 3">
    <div class="card-body">
        <h5 class="card-title">दक्षिण एशियाकै दोश्रो ठूला राधाकृष्ण रथयात्रा आज, कोशी प्रदेश बिदा</h5>
    </div>
    <div class="card-footer text-muted">
        <span class="reporter">पालिका खबरदाता | भदौ २३, २०८०</span>
    </div>
</div>
</div>
<!-- Card 4 -->
<div class="col-md-3 mb-3">
<div class="card h-100">
    <img src="images/news2.jpg" class="card-img-top" alt="News Image 4">
    <div class="card-body">
        <h5 class="card-title">विराटनर महानगरपालिकाले पाउने चार अर्बको बजेट ल्याउँदै</h5>
    </div>
    <div class="card-footer text-muted">
        <span class="reporter">पालिका खबरदाता | असार १०, २०८०</span>
    </div>
</div>
</div> --}}

</div>
</div>
@endsection