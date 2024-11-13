<div class="media-section section-panel">
    <div class="st-wrapper">
        <div class="container-fluid">
            <div class="row row-cards">
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <div class="hero-category__box">
                        <a href="{{ route('site.category.show', $cat[1]) }}" style="background-color: rgb(0 96 48); color:white;">
                            <span><img src="{{ asset('assets/site/images/img-icons/icons8-thanksgiving-64.png')}}" style="width: 100px;"></span></span>
                            {{$data['category'][1]->name}}
                            <p style="font-size:smaller">
                            </p>
                        </a>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <div class="hero-category__box">
                        <a href="{{ route('site.category.show', $cat[2]) }}" style="background-color: rgb(0 96 48); color:white;">
                            <span><img src="{{ asset('assets/site/images/img-icons/3-03 copy.png')}}" style="width: 100px;"></span>
                            {{$data['category'][2]->name}}
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <div class="hero-category__box">
                        <a href="{{ route('site.category.show', $cat[3]) }}" style="background-color: rgb(0 96 48); color:white;">
                            <span style="margin-bottom: 0;"><img src="{{ asset('assets/site/images/img-icons/3-24 copy.png')}}" style="width: 140px;"></span>
                            {{$data['category'][3]->name}}
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <div class="hero-category__box">
                        <a href="{{ route('site.category.show', $cat[4]) }}" style="background-color: rgb(0 96 48); color:white;">
                            <span>
                                <img src="{{ asset('assets/site/images/img-icons/icons8-abundance-64.png')}}" style="width: 100px;">
                            </span>
                            {{$data['category'][4]->name}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>