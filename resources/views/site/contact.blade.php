@extends('site.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb" class="contact-heading">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="" style="color:#383e9a;" class="fw-bold">
                            <i class="fa-solid fa-house"></i> &nbsp;
                            गृह पृष्ठ / सम्पर्क</a>
                    </li>
                </ol>
            </nav>
        </div>

    </div>
</div>
<div class="container-fluid mt-5">
    <div class="container">

        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12"
                style="color:black; font-weight:600;">
                <h2 style="color:#383e9a; font-weight:800;"> सम्पर्क</h2>
                <p class="mt-3 ">Phone no. :- 9851334035 </p>
                <p> Email :- maoistbagmati@gmail.com , bagmaticpnmc@gmail.com</p>
                <p>Location :- Babarmahal Kathmandu बबरमहल काठमाडौं</p>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12  contact-side ps-5">
                <div class="contact-form">
                    <div class="d-flex gap-1">
                        <h3 style="color:red; font-weight:700;"> GET IN</h3>
                        <h3 style="color: #383e9a; font-weight:700;"> TOUCH</h3>
                    </div>
                    @if (session('message'))
                            <div class="alert alert-success bg-primary" style="background-color: #ceb7c4 !important;">
                                {{ session('message') }}
                            </div>
                        @endif
                    <form action="{{ route('site.message') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="d-flex flex-column gap-4 contact-inner">
                            <input type="text" name="name" placeholder="Name" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="text" name="number" placeholder="Contact">
                        </div>
                        <div class="mt-5">
                            <textarea class=" footer-textarea" name="message" placeholder="Message" required></textarea>
                        </div>
                        <div class="mt-3">
                            <input type="submit" value="Contact Now"  class="btn btn-light text-white" style="background-color:#383e9a;">
                            {{-- <button type="button" class="btn btn-light" style="background-color:#383e9a;">
                                <span style="color:white; font-weight:bold;"> CONTACT NOW </span> </button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-5 contact-map">
                @if( isset($all_view['setting']->contact_map) )
                    {!! $all_view['setting']->contact_map !!}
                    @endif
            </div>
        </div>

    </div>
</div>
</div>
@endsection