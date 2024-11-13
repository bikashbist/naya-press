<!-- graphical data -->
<div class="graphicaldata-panel">
    <div class="container">
        @if(isset($data['featured_pages'][4]))
        <div class="main-title hero-panel-title">
            <h2>{{ $data['featured_pages'][4]->title }}</h2>
            <div class="center-intro-text">
                    <p>{!! mb_strimwidth($data['featured_pages'][3]->content, 0, 700, "...") !!}</p>
            </div>
        </div>
        @endif
        <div class="row graphicaldata-row">
            <div class="col-lg-4">
                <div class="progress-bars">
                <h4 class="text-center">State Wise Student Numbe  <button id="download"><i class="fa fa-download"></i></button></h4>
                    <canvas id="myChartThree"  width="390" height="370" aria-label="Hello ARIA World" role="img"></canvas>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="students">
                    <h4 class="text-center">Total student Attend (F/Y-2075-76)</h4>
                    <div class="row students__data">
                        <canvas id="myChartFour"  width="390" height="370" aria-label="Hello ARIA World" role="img"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h4 class="text-center">State Wise School Data</h4>
                <canvas id="myChartFive"  width="390" height="370" aria-label="Hello ARIA World" role="img"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- end graphical data -->
