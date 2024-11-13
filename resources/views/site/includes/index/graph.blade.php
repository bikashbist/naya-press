<div class="container text-center my-3">
    <div class="row mx-auto my-auto">
        <div id="myCarousel" class="carousel slide w-100" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item py-5 active">
                  <div class="graphicaldata-panel">
                    <div class="container">
                        @if(isset($data['featured_pages'][3]))
                        <div class="main-title hero-panel-title">
                            <h2>{{ $data['featured_pages'][3]->title }}</h2>
                            <div class="center-intro-text">
                                    <p>{!! mb_strimwidth($data['featured_pages'][3]->content, 0, 700, "...") !!}</p>
                            </div>
                        </div>
                        @endif
                        <div class="row graphicaldata-row">
                            <div class="col-lg-4">
                                <div class="progress-bars">
                                    <h4 class="text-center">Regional Scholership</h4>
                                    <canvas id="myChart"  width="390" height="370" aria-label="Hello ARIA World" role="img"></canvas>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="students">
                                    <h4 class="text-center">Total No. Of Student Get Scholership</h4>
                                    <div class="row students__data">
                                        <canvas id="myChartOne"  width="390" height="370" aria-label="Hello ARIA World" role="img"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h4 class="text-center">Regional Wise Scholership</h4>
                                <canvas id="myChartTwo"  width="390" height="370" aria-label="Hello ARIA World" role="img"></canvas>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item py-5">
                  @include('site.includes.index.graph-two')
                </div>
               
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a class="carousel-control-prev text-dark" href="#myCarousel" role="button" data-slide="prev">
                <span class="fa fa-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next text-dark" href="#myCarousel" role="button" data-slide="next">
                <span class="fa fa-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>




