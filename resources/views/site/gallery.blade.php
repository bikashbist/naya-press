@extends('site.layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('assets/frontend/plugins/lightgallery/css/lightgallery.css')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
		integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css"
        integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection
@section('content')
{{-- <div class="container-fluid">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb" class="detail-heading">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="" style="color:#383e9a;" class="fw-bold"> <i class="fa-solid fa-house"></i> &nbsp;
                            गृह पृष्ठ / फोटो ग्यालरी</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <h2 class="mt-5  p-0 " style="color:#383e9a; font-weight:800;">फोटो ग्यालरी</h2>
        </div>
        <div class="row gallery-main mt-5  lightgallery" id="lightgallery">
            @foreach($data['album']->photos as $row)
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 gallery-inner ">
                <a href="{{ $row->image }}" data-lg-size="1024-800">
                    <img alt="{{ $row->title }}" src="{{ $row->image }}" class="pulse-image" />
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div> --}}
{{-- <section class="video-section">
    <div class="container">
        <h3 class="heading-all my-3 py-2 text-center">फोटो फिचर</h3>
        <div class="row gallery-main mt-5  lightgallery" id="lightgallery">
            @foreach($data['album']->photos as $row)
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 gallery-inner ">
                <a href="{{ $row->image }}" data-lg-size="1024-800">
                    <img alt="{{ $row->title }}" src="{{ $row->image }}" class="pulse-image" />
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}

<section class="video-section pt-30 pb-70 my-5">
    <div class="container">
        
            <div class="row">
                @foreach($data['album']->photos as $row)
                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3 " >
                    <div class="h-product-item h-100 ">
                       
                            <a href="{{ $row->image }}" class="fancybox h-100 d-block" data-fancybox="gallery1">
                                <img src="{{ $row->image }}" alt="{{ $row->title }}" style="max-width: 100%; height: 100%; object-fit: cover; ">
                            </a>
                        
                    </div>
                </div>
                @endforeach
            </div>
        
    </div>
</section>

@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{asset('assets/frontend/plugins/lightgallery/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('assets/frontend/plugins/lightgallery/js/jquery.mousewheel.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#lightgallery').lightGallery({
            selector: 'a',
            thumbnail: true,
            fullScreen: true,
            download: false
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
        getSortData: {
            name: function(element) {
                return $(element).text();
            }
        }
    });
    $('.filter button').on("click", function() {
        var value = $(this).attr('data-name');
        $grid.isotope({
            filter: value
        });
        $('.filter button').removeClass('active');
        $(this).addClass('active');
    })
    $('.sort button').on("click", function() {
        var value = $(this).attr('data-name');
        $grid.isotope({
            sortBy: value
        });
        $('.sort button').removeClass('active');
        $(this).addClass('active');
    })
</script>
@endsection