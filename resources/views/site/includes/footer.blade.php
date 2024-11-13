
<section class="footer">
    <div class="container py-3">
        <div class="footer-list  pt-4  ">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-12">
                    <div class="newsportal-info mt-3">
                        <div class="newsportal-info-pic text-center">
                            <img src="@if( isset($all_view['setting']->logo) ) {{ asset($all_view['setting']->logo) }}@endif" alt="Newsportal LOGO">
                            <p class="footer-slogan mt-2">@if( isset($all_view['setting']->site_description) ) {!! $all_view['setting']->site_description !!}@endif</p>
                        </div>
                        <div class="newsportal-info-text mt-1 fs-6">
                            <p class="pan-number d-flex flex-column">@if( isset($all_view['setting']->pan_no) )
                                प्यान नम्बर: {{$all_view['setting']->pan_no}}
                                @endif
                                <span>
                                    @if( isset($all_view['setting']->vat_no) )
                                     पञ्जीकरण नम्बर:
                                     {{$all_view['setting']->vat_no}}
                                    @endif
                                </span></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-12">
                    <div class="popular-cities mt-4">
                        @if(isset($data['common']->footer_second_title))
                        <h5>{{$data['common']->footer_second_title}}</h5>
                        @endif
                        <ul>
                            @if(isset($data['common']->footer_second_description))
                              {!! $data['common']->footer_second_description !!}
                            @endif
                            {{-- <a href="#">
                                <li>योजना तथा कार्यक्रम</li>
                            </a>
                            <a href="#">
                                <li>सामाजिक विकास</li>
                            </a>
                            <a href="#">
                                <li>घरजग्गा</li>
                            </a>
                            <a href="#">
                                <li>तीन तहको सरकार</li>
                            </a>
                            <a href="#">
                                <li>कानुनका कुरा</li>
                            </a>
                            <a href="#">
                                <li>समाज</li>
                            </a> --}}
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-2 col-12">
                    <div class="quick-links mt-4">
                        @if(isset($data['common']->footer_third_title))
                         <h5>{{$data['common']->footer_third_title}}</h5>
                        @endif
                        <ul>
                            @if(isset($data['common']->footer_third_description))
                              {!! $data['common']->footer_third_description !!}
                            @endif
                            {{-- <a href="#">
                                <li>आमा समूह</li>
                            </a>
                            <a href="#">
                                <li>घरजग्गा</li>
                            </a>
                            <a href="#">
                                <li>जेष्ठ नागरिक मञ्च</li>
                            </a>
                            <a href="#">
                                <li>सामाजिक विकास</li>
                            </a>
                            <a href="#">
                                <li>हाम्रो नगर राम्रो नगर</li>
                            </a>
                            <a href="#">
                                <li>हाम्रो वडा हाम्रो काम टोलटोलमा</li>
                            </a> 
                        </ul>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-md-2 col-12">
                    <div class="contact-us mt-4">
                        <h5>सम्पर्क</h5>
                        <ul>
                            <li> <i class="fa-solid fa-phone pe-2"></i>
                                @if(isset($all_view['setting']->contact_mobile))
                                 {{$all_view['setting']->contact_mobile}}
                                @endif
                            </li>
                             
                            <li> <i class="fa-solid fa-envelope pe-2">
                              </i>
                               @if(isset($all_view['setting']->contact_email))
                                   {{$all_view['setting']->contact_email}}
                               @endif
                                </li>
                            <li> <i class="fa-solid fa-location-dot pe-2">
                               </i>
                                  @if(isset($all_view['setting']->contact_address_1))
                                      {{$all_view['setting']->contact_address_1}}
                                  @endif
                                </li>
                        </ul>
                        <div class="icons d-flex">
                            @if( isset($all_view['setting']->social_profile_fb) ) 
                                <a href=" {{ asset($all_view['setting']->social_profile_fb) }}">
                                    <div class="contact-icon">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </div>
                                </a>
                            @endif

                            @if( isset($all_view['setting']->social_profile_twitter) )
                            <a href="{{ asset($all_view['setting']->social_profile_twitter) }}">
                            <div class="contact-icon">
                                 <i class="fa-brands fa-google"></i>
                            </div>
                            </a>
                            @endif
                            @if( isset($all_view['setting']->	social_profile_insta) )
                            <a href="{{ asset($all_view['setting']->	social_profile_insta) }}">
                            <div class="contact-icon">
                               
                                 <i class="fa-regular fa-envelope"></i>
                               
                            </div>
                            </a>
                            @endif
                            @if( isset($all_view['setting']->social_profile_youtube) )
                            <a href="{{ asset($all_view['setting']->social_profile_youtube) }}">
                            <div class="contact-icon">
                               
                                 <i class="fa-brands fa-youtube"></i>
                                
                            </div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-12">
                    <div class="contact-us mt-4">
                        <h5>हाम्रो 
                   टिम </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-text text-center pb-1">
        <hr>
        <p>© 2024 Mansarobar All rights reserved.</p>
    </div>

</section>
