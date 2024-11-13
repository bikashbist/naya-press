<section class="marginTop-100 wow fadeIn">
    <div class="container">
        <div class="col-12 text-center mb-5">
            <h4>Give Us A Visit <span class="text-primary">{{ $all_view['setting']->contact_title }}</span></h4>
        </div>
    </div> <!-- END container-->
    <div class="position-relative">
        @if( isset($all_view['setting']->contact_map) )
        {!! $all_view['setting']->contact_map !!}
        @endif <div class="card card-body position-absolute absolute-center-y right-50 shadow-v3">
            <h6>Where to find us</h6>
            <div class="media mt-3 align-items-center">
                <i class="ti-location-pin mr-2"></i>
                <div class="media-body">
                    @if( isset($all_view['setting']->contact_address_1) )
                    {{ $all_view['setting']->contact_address_1 }}
                    @endif
                    @if( isset($all_view['setting']->contact_address_2) )
                    {{ $all_view['setting']->contact_address_2 }}
                    @endif
                </div>
            </div>
            <ul class="list-unstyled mt-3">
                <li><i class="ti-headphone mr-3"></i><a href="tel:+97715151411"> {{ $all_view['setting']->contact_phone }} </a></li>
                <li><i class="ti-email mr-3"></i><a href="mailto:info@cosmoscollege.edu.np">{{ $all_view['setting']->contact_email }}</a></li>
            </ul>
        </div>
    </div>
</section>