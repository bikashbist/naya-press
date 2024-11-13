@extends('dcms.layouts.app')

@section('content')
             <!--state overview start-->
             <div class="row state-overview">
                 @permission('user-list')
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol terques">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="value">
                                <h1 class="">
                                    {{ $data['count_user'] }}
                                </h1>
                                <p>{{ __('Users') }}</p>
                            </div>
                        </section>
                    </div>
                    @endpermission
                    @permission('post-list')
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol red">
                                <i class="fa fa-book"></i>
                            </div>
                            <div class="value">
                                <h1 class="">
                                    {{ $data['count_post'] }}
                                </h1>
                                <p>{{ __('Posts') }}</p>
                            </div>
                        </section>
                    </div>
                    @endpermission
                    @permission('page-list')
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol yellow">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <div class="value">
                                <h1 class="">
                                    {{ $data['count_page'] }}
                                </h1>
                                <p>{{ __('Pages') }}</p>
                            </div>
                        </section>
                    </div>
                    @endpermission

                    <div class="col-lg-3 col-sm-6 pull-right">
                        <section class="panel">
                            <div class="symbol blue">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="value">
                                <h4 class="">
                                    @php echo date("Y-m-d") @endphp
                                </h4>
                                <p> {{ __(date("l")) }} </p>
                            </div>
                        </section>
                    </div>
                </div>
                <!--state overview end-->
  
                <div class="row">
                    @permission('tracker-list')
                    <div class="col-lg-6">
                        <!--new earning start-->
                        <div class="panel terques-chart">
                            <div class="panel-body chart-texture">
                                <div class="chart">
                                    <div class="heading">
                                        <span>{{__('Last Twelve Months Website Visitor Graph( Line Graph )')}}</span>
                                    </div>
                                    <canvas id="myChartOne"  width="390" height="370" aria-label="Hello ARIA World" role="img"></canvas>
                                </div>
                            </div>
                        </div>
                        <!--new earning end-->
                    </div>
                    <div class="col-lg-6">
                        <!--new earning start-->
                        <div class="panel terques-chart">
                            <div class="panel-body chart-texture">
                                <div class="chart">
                                    <div class="heading">
                                        <span>{{__('Last Twelve Days Website Visitor Graph( Bar Graph )')}}</span>
                                    </div>
                                    <canvas id="myChart"  width="30" height="30" aria-label="Hello ARIA World" role="img"></canvas>
                                </div>
                            </div>
                        </div>
                        <!--new earning end-->
                    </div>
                    @endpermission
                </div>
@endsection

@section('js')
@include('dcms.includes.flash-message')
<script>
        var color = Chart.helpers.color;
        var barChartData = {
                labels: <?php echo json_encode($data['day_date'], JSON_NUMERIC_CHECK); ?>,
                datasets: [{
                    label: 'Number Of Visit',
                    data: <?php echo json_encode($data['day_count'], JSON_NUMERIC_CHECK); ?>,
                    backgroundColor:color(window.chartColors.red).alpha(0.5).rgbString(),
                    borderColor: window.chartColors.red,
                    borderWidth: 1
                }]
            }
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
</script>

<script>
var color = Chart.helpers.color;
var lineData = {
        labels: <?php echo json_encode($data['month_date'], JSON_NUMERIC_CHECK); ?>,
        datasets: [{
            steppedLine: false,
            label: 'Number Of Visit',
            data: <?php echo json_encode($data['month_count'], JSON_NUMERIC_CHECK); ?>,
            backgroundColor:color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            fill: false,
        }]
    }
var ctx = document.getElementById('myChartOne').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: lineData,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>	
        
@endsection