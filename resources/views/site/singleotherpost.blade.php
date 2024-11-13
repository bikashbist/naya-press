@extends('site.layouts.app')
@section('css')
<style>
    .detail-img1{
        width:800px;
        height: 500px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid mt-2">
    {{-- <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb" class="detail-heading">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="" style="color:#383e9a;" class="fw-bold"> <i class="fa-solid fa-house"></i> &nbsp;
                            गृह पृष्ठ / @if(isset($data['row']->title)) {{ $data['row']->title }} @endif</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div> --}}
    <div class="container p-0">
        <div class="row mt-4">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex gap-2 "
                style="color:#777; font-size:14px;">
                <span>@if($data['lang'] == 1) {{timesAgoEn($data['row']->created_at, true)}} @else {{timesAgoNp($data['row']->created_at, true)}} @endif </span>
                <i class="fa-solid fa-calendar pt-1"></i>
                <span> @if($data['lang'] == 1) {{ date('F d, Y', strtotime($data['row']->created_at)) }} @else {{datenep($data['row']->created_at, true)}} @endif</span>
                <i class="fa-solid fa-eye pt-1"></i>
                <span> @if($data['lang'] == 1) Visted:{{ $data['row']-> visit_no   }} @else हेरिएका:{{getUnicodeNumber($data['row']->visit_no, true)}} @endif </span>
            </div>
        </div>
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-5"
            style="color:#1c1ca1;">
            <h2 class="fw-bold detail-heading2 m-0"> @if(isset($data['row']->title)) {{ $data['row']->title }} @endif</h2>
        </div>
    </div>
    <hr class="container">
   
   <div class="container">
    <div class="row g-4">
        @if (isset($data['image']) && count($data['image']) > 0)
            @if (count($data['image']) == 1)
                <div class="col-lg-12">
                    <img src="{{ asset($data['image'][0]->images) }}" alt="img"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            @elseif($data['image']->count() == 2)
                <div class="col-lg-6">
                    <img src="{{ asset($data['image'][0]->images) }}" alt="img"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset($data['image'][1]->images) }}" alt="img"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            @elseif($data['image']->count() == 3)
                <div class="col-lg-6">
                    <img src="{{ asset($data['image'][0]->images) }}" alt="img"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center justify-content-center">
                        <div class="col-12">
                            <img src="{{ asset($data['image'][1]->images) }}" alt="img"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="col-12">
                            <img src="{{ asset($data['image'][2]->images) }}" alt="img"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                </div>
            @endif

            {{-- @else
        <p>No images available to display.</p> --}}
        @endif
    </div>
    </div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12  detail-para">
                <p>{!! $data['row']->content !!} </p>

            </div>
        </div>

    </div>
    @php
     $url =  route('site.other.post.show', ['post'=> $data['row']->post_unique_id]);
    @endphp
    <div class="news-detail-social-share-icons flex-row align-items-center" style="margin-left: 100px;">
        <h3 class="purvadhar-heading text-secondary text- fs-4 text-center mb-4" style="margin-top: 20px;">Share:</h3>
    
        <!-- Facebook Share -->
        <div class="news-detail-social-share-item news-detail-social-share-facebook">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" class="st-custom-button" target="_blank">
                <span><i class="fa-brands fa-facebook"></i></span>
            </a> 
        </div>
    
        <!-- Twitter Share -->
        <div class="news-detail-social-share-item news-detail-social-share-twitter">
            <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ $data['row']->title }}" class="st-custom-button" target="_blank">
                <span><i class="fa-brands fa-twitter"></i></span>
            </a>
        </div>
    
        <!-- Messenger Share -->
        <div class="news-detail-social-share-item news-detail-social-share-messenger">
            <a href="fb-messenger://share/?link={{ urlencode($url) }}" class="st-custom-button" target="_blank">
                <span><i class="fa-brands fa-facebook-messenger"></i></span>
            </a>
        </div>
    
        <!-- WhatsApp Share -->
        <div class="news-detail-social-share-item news-detail-social-share-whatsapp">
            <a href="https://api.whatsapp.com/send?text={{ urlencode($url) }}" class="st-custom-button" target="_blank">
                <span><i class="fa-brands fa-whatsapp"></i></span>
            </a>
        </div>
    </div>
    <section class="border-top-reaction">
        <div class="container">
            <div class="comment-box">
                <h3 class="mt-4 p-2 text-light pratikriya-text">प्रतिक्रिया</h3>
                <form action="{{ route('site.postreview') }}" method="post" class="mt-3" id="commentForm">
                    @csrf
                
                    <input type="hidden" name="post_id" value="{{ $data['row']->id ?? '' }}">
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <div class="mb-3">
                        <textarea class="form-control" name="comment" id="comment" rows="5" placeholder="यहाँ आफ्नो प्रतिक्रिया लेख्नुहोस्..."></textarea>
                    </div>
                    @auth
                    <button type="submit" class="btn pratikyriya-btn" style="margin-bottom: 10px;">प्रतिक्रिया दिनुहोस्</button>
                    @endauth
                </form>
                @guest
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="btn pratikyriya-btn" style="margin-bottom: 10px;">प्रतिक्रिया दिनुहोस्</button>
                @endguest
            </div>
        </div>
    </section>
    
    <!-- Login Modal -->
    <div class="modal fade" id="exampleModal1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-login-form modal-dialog-centered">
            <div class="modal-content login-modal-content">
                <div class="modal-header login-modal-header">
                    <h1 class="modal-title fs-5 modal-form-logo" id="exampleModalLabel">
                        {{-- <a class="nav-link" href="#">
                            <img src="images/Logo.png" width="120" alt="Logo">
                        </a> --}}
                    </h1>
                    <button type="button" class="btn-close login-modal-close-btn p-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0 ms-2">
                    <h3 class="login-title-text">Login</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="social-icons-login-modal d-flex justify-content-center align-items-center">
                        <!-- Facebook Login -->
                        <a href="{{ route('user.login.facebook') }}" class="social-box"><i class="fa-brands fa-facebook"></i> Facebook</a>
                        <!-- Google Login -->
                        <a href="{{ route('user.login.google') }}" class="social-box"><i class="fa-brands fa-google"></i> Google</a>
                    </div>
                    <form action="{{ route('login') }}" method="POST" id="loginForm" class="mt-4">
                        @csrf
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="eg. example@domain.com" required>
                        </div>
                        @if( $errors->has('email'))
                               <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        <div class="mb-3 mt-2">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="mb-0 border-bottom-modal">
                            <button type="submit" class="login-btn-modal py-2 px-4">लगइन</button>
                            <p class="sign-up-text mt-4">तपाईंको खाता छैन ? <a href="#" data-bs-toggle="modal"
                                 data-bs-target="#exampleModal2">साइन अप </a>गर्नुहोस् ।</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal2" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-login-form modal-dialog-centered">
            <div class="modal-content login-modal-content">
                <div class="modal-header login-modal-header">
                    <h1 class="modal-title fs-5 modal-form-logo" id="exampleModalLabel">
                        {{-- <a class="nav-link" href="#">
                            <img src="images/Logo.png" width="120" alt="Logo">
                        </a> --}}
                    </h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="button" class="btn-close login-modal-close-btn p-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0 ms-2">
                    <h3 class="login-title-text">Register</h3>
                    <form action="{{ route('signup-process') }}" method="POST" id="registerForm" class="mt-4">
                        @csrf
                        <div class="mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                            @if( $errors->has('name'))
                               <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="eg. example@domain.com" required>
                        </div>
                        <div class="mb-3 mt-2">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="mb-3 mt-2">
                            <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                        <div class="mb-0 border-bottom-modal">
                            <button type="submit" class="login-btn-modal py-2 px-4">साइन अप</button>
                            <p class="sign-up-text mt-4">तपाईंको खाता छ? <a href="#" data-bs-toggle="modal"
                                data-bs-target="#exampleModal1">लगइन </a>गर्नुहोस् ।</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection