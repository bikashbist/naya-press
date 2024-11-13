<section class="padding-y-100">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-md-4">
                <h2 class="mb-4">
                    @if($data['lang'] == 1) Albums @else ग्यालरीहरु @endif
                </h2>
                <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
            </div>
        </div> <!-- END row-->
        <div class="row">
            @if(isset($data['album']))
            @foreach($data['album'] as $row)
            @if(Route::has('site.album.show'))
            @if(Route::has('site.album.show'))
            <div class="col-lg-4 marginTop-30">
                <a href="{{ route('site.album.show', $row->id ) }}">
                    <img class="w-100" src="{{asset($row->cover_image)}}" alt="">
                </a>
            </div>
            @else
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 marginTop-30">
                        <div class="position-relative">
                            <a href="{{ route('site.album.show', $row->id ) }}">
                                <img class="w-100" src="{{asset($row->cover_image)}}" alt="">

                            </a>
                        </div>
                    </div>

                </div>
            </div>
            @endif
            @endif
            @endforeach
            @endif
        </div>
    </div> <!-- END row-->
    </div> <!-- END container-->
</section>