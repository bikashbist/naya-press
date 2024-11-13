@extends('site.layouts.app')

@section('css')
<style>
    #image {
        width: 200px;
        height: 200px;
        object-fit: cover;
    }
</style>
@endsection
@section('content')
<div class="padding-y-60 bg-cover" data-dark-overlay="6" style="background:url(../frontend/img/breadcrumb-bg.jpg)">
    <div class="container">
        <h1 class="text-white">
            @if($data['lang'] == 1) Members @else कर्मचारीहरु @endif
        </h1>

    </div>
</div>



<section class="padding-y-100 wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h4>
                    @if($data['lang'] == 1) Members @else कर्मचारीहरु @endif
                </h4>
            </div>
        </div>

        <div class="row">

            <div class="container">
                <section class="main-section__content">
                    <div>
                        
                        <!--<div class="col-md-12">-->
                        <!--    <ul class="members-row-panel2 members-row-panel2--large" style="margin-left:16%">-->
                        <div class="row" style="min-height:500px;">
                            <!--@if(isset($data['branch']))-->
                            <!--@foreach($data['branch'] as $row)-->
                            <!--@if(!empty($row->staff))-->
                            <!-- @foreach($row->staff as $staffs)   -->
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 home-sidebar">

                                <div class="sidebar-image-block  card">
                                    <div class="image-only">
                                        @if(isset($staffs->image))
                                        <img src="{{ asset($staffs->image)}}" alt="card background" class="">
                                        @else
                                        <img src="{{ asset('upload_file/avatar/lochan.png')}}" alt="img">
                                        @endif
                                    </div>
                                    <div class="sidebar-caption">
                                        <p> @if($data['lang'] == 1) Name @else नाम @endif : {{ $staffs->name }}<br>
                                            <span>@if($data['lang'] == 1) Designation @else पद @endif :
                                                {{ $staffs->designation }}<br>
                                                @if($data['lang'] == 1) Phone No. @else फोन @endif : {{ $staffs->phone }} <br>
                                                @if($data['lang'] == 1) Email @else ईमेल @endif : {{ $staffs->email }}
                                            </span>
                                            </p>
                                        <!-- Button trigger modal -->
                                    </div>
                                  
                                </div>

                            </div>
                            <!--@endforeach-->
                            <!--          @endif             -->
                            <!--@endforeach-->
                            <!--@endif-->
                        </div>
                        <!--    </ul>-->
                        <!--</div>-->

                    </div>
                </section>
            </div>




        </div>
    </div> <!-- END container-->
</section>


@endsection