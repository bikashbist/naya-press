@extends('site.layouts.app')
@section('content')
<div class="line-container">
    <!-- Line before the box -->
      <div class="line"></div>
     <!-- Box with text -->
      <div class="box">प्रदेश</div>
    <!-- Line after the box -->
      <div class="line"></div>
    </div>
    <div class="container my-5">
    {{-- ms-5 --}}
      <!-- Navigation Tabs -->
      <div class="button-pradesh">
        @foreach($data['provinces'] as $key=>$items)
        <div class="btn-group" role="group">
          <a href="{{ route('site.jilla', ['province_id' => $items->id]) }}" class="btn btn-outline-secondary">{{$key+1}} .{{$items->province_np}}</a>
        </div>
        @endforeach
      </div>
        
    
      <!-- News Cards -->
      <div class="row" ms -5>
        @if(count($data['province']) !=0)
          @foreach($data['province'] as $post) 
              
          <div class="col-md-3 mb-3">
            <a href="{{ route('site.province.post.show', ['post'=> $post->post_unique_id]) }}">
            <div class="card h-100">
                @php
                   $image =  \App\Model\Dcms\PostImage::where('post_unique_id',$post->post_unique_id)->first();
                @endphp
                @if($image)
                <img src="{{asset($image->images)}}" class="card-img-top" alt="Halesi Tuwachung Municipality">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
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
        <!-- Card 2 -->
      </div>
    
    <!-- secondd row Cards -->
    {{-- <div class="row">
      <!-- Card 1 -->
      <div class="col-md-3 mb-3">
        <div class="card h-100">
            <img src="images/news6.jpg" class="card-img-top" alt="Halesi Tuwachung Municipality">
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
              <img src="images/news8.jpg" class="card-img-top" alt="News Image 2">
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
              <img src="images/news7.webp" class="card-img-top" alt="News Image 3">
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
              <img src="images/news5.webp" class="card-img-top" alt="News Image 4">
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