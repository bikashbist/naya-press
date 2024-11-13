@extends('site.layouts.app')
@section('content')


<section class="inner-panel-intro">
    <div class="container">
        <div class="content-intro">
            <div class="main-title hero-panel-title margin-no">
                <h2>Contact Us</h2>
                <p>Contact Us Page</p>
            </div>
        </div>
    </div>
</section>
<div class="single-page-content-wrapper">
    <div class="container">
        <div class="row main">
            <section class="contact-style-1">
                <div class="address">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="box">
                                    <i class="fa fa-map-marker address-color-1" aria-hidden="true"></i>
                                    <h3>Address</h3>
                                    @if( isset($all_view['setting']->contact_title) )
                                    <p>{{ $all_view['setting']->contact_title }}</p>
                                    @endif
                                    @if( isset($all_view['setting']->contact_address_1) )
                                    <p>{{ $all_view['setting']->contact_address_1 }}</p>
                                    @endif
                                    @if( isset($all_view['setting']->contact_address_2) )
                                    <p>{{ $all_view['setting']->contact_address_2 }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="box">
                                    <i class="fa fa-phone address-color-2" aria-hidden="true"></i>
                                    <h3>Phone</h3>
                                    @if( isset($all_view['setting']->contact_phone) )
                                    <p>{{ $all_view['setting']->contact_phone }}</p>
                                    @endif
                                    @if( isset($all_view['setting']->contact_fax) )
                                    <p>{{ $all_view['setting']->contact_fax }}</p>
                                    @endif
                                    @if( isset($all_view['setting']->contact_mobile) )
                                    <p>{{ $all_view['setting']->contact_mobile }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="box">
                                    <i class="fa fa-envelope address-color-3" aria-hidden="true"></i>
                                    <h3>Email Us</h3>
                                    <a href="mailto:">
                                        @if( isset($all_view['setting']->contact_email) )
                                        <p>{{ $all_view['setting']->contact_email }}</p>
                                        @endif
                                    </a>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="box">
                                    <i class="fa fa-clock-o address-color-4" aria-hidden="true"></i>
                                    <h3>Hours</h3>
                                    <p>Monday To Friday</p>
                                    <p>10:00am To 05:00pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="map-form-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="map-box-1">
                                    <div id="map_contact_1" class="map_canvas active">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14130.686272213728!2d85.32583!3d27.6965441!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3d401946e6c45e53!2sMinistry%20of%20Education%2C%20Science%20and%20Technology!5e0!3m2!1sen!2snp!4v1596004641262!5m2!1sen!2snp" width="100%" height="696" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                        {{-- @if( isset($all_view['setting']->contact_map) )
                                            {!! $all_view['setting']->contact_map !!}
                                        @endif --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="contact-form">
                                    <div class="heading-style-1">
                                        <h2>Get in
                                            <span>Touch</span>
                                        </h2>
                                    </div>
                                    <form action="{{ route('site.message') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Name" name="name" required>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Email" name="email" required>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Contact" name="number">
                                            </div>
                                            <div class="col-md-12">
                                                <textarea cols="10" rows="10" placeholder="Message" name="message" required></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="submit" value="Contact Now" class="button button--primary button--small">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


@endsection