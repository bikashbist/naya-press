<section class="header ">
    <div class="header-top py-2 bg-white ">
     <div class="container d-flex justify-content-between align-itmes-center" style="height: auto">
        <div class="d-flex align-items-center ">
            {{-- <p><i class="fa-solid fa-globe"></i> English</p> --}}
            <div class="lang d-flex" >
                
                @if(isset($all_view['lang']))
                @foreach($all_view['lang'] as $lang)
                    @if(Route::has('site.swap_language'))
                    
                         <a class="me-2 d-block"   href="{{ route('site.swap_language', ['lang_id'=>$lang->id])}}">@if(isset($lang->image))<img src="{{ $lang->image}}" alt="" />@endif</a>
                    
                    @endif
                @endforeach
                @endif
            </div>

            <div class="date d-flex align-items-center">
                &nbsp; @if($data['lang'] == 1)
                {{ date('l, F d, Y', strtotime(now()->toDateTimeString())) }}
            @else 
               {{ datenep(now()->toDateTimeString(), true) }}
            @endif</li>
            </div>
        </div>
       
        <div class="middle-logo ">
            <img width="300px" src="{{asset('man-sarobar.jpg')}}" alt="logo">
        </div>
   
        <div class="d-flex align-items-center ">
            <div class="date-changer">
                <a class="me-3" href="{{route('site.unicode')}}" target="blank">
                    <i class="fa-regular fa-keyboard"></i> युनिकोड
                 </a>
                 <a href="https://www.ratopati.com/date-converter" target="blank">
                     <i class="ri-calendar-schedule-fill"></i> मिति रूपान्तरण
                 </a>
            </div>
            <div class="user-icon pb-0 ms-3">
                <button type="button" class="btn user-icon-btn mb-0" data-bs-toggle="modal"
                    data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap" style=" height: 20px; padding-bottom: 27px; "> <i
                        class="ri-user-fill" ></i></button>
                <!-- modal for user login start -->
                <div class="modal fade" id="exampleModal"  aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-login-form modal-dialog-centered">
                        <div class="modal-content login-modal-content">
                            <div class="modal-header login-modal-header">
                                <h1 class="modal-title fs-5 modal-form-logo" id="exampleModalLabel">
                                    <a class="nav-link" href="index.html">
                                        <img src="images/Logo.png" width="120" alt="Logo">
                                    </a>
                                </h1>
                                <button type="button" class="btn-close login-modal-close-btn p-2"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body pt-0 ms-2">
                                <h3 class="login-title-text">Login</h3>
                                <form>
                                    <div class="mb-3">
                                        <div class="input-container">
                                            <label for="recipient-name" class="col-form-label mb-2">If you are
                                                having trouble accessing your account, click <a
                                                    href="forgot-password-modal"><span>Forgot Password</span></a>
                                                below.</label>
                                            <input type="text" class="form-control" id="recipient-name"
                                                placeholder="eg. example@domain.com">
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-2">
                                        <div class="input-container">
                                            <input type="text" class="form-control" id="message-text"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="mb-0 border-bottom-modal">
                                        <button class="login-btn-modal py-2 px-4" href="index.html">लगइन</button>
                                        <p class="sign-up-text mt-4">तपाईंको खाता छैन ? <a href="sign-up.html">साइन
                                                अप </a>गर्नुहोस् ।</p>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer d-flex flex-column mt-0 pt-0">
                                <p class="signin-with-text">Signin with</p>
                                <div
                                    class="social-icons-login-modal d-flex justify-content-center align-items-center">
                                    <div class="social-box"><i class="fa-brands fa-google"></i></div>
                                    <div class="social-box"><i class="ri-facebook-fill"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal for user login end -->
            </div>
        </div>
     </div>
    </div>
  
    {{-- <div class="container-fluid">
      
        
        <div class="head-info d-flex flex-wrap justify-content-between align-items-center py-2 text-center">
            
           
            <div class="advertisment">
                @if($data['seventh_adv'])  
                  <img src="{{ asset($data['seventh_adv']->image) }}" height="100px" alt="Logo">
                @else
                  <img src="{{ asset('assets/frontend/images/advertisment/900-x-100.gif') }}" width="100%" alt="Default Ad">
                @endif
            </div>
           
           

        </div>
      
    </div>--}}
</section> 
{{-- <section class="position-relative d-flex justify-content-center">
   
</section> --}}