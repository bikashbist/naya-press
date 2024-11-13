@extends('dcms.layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                   <h3>{{ $_panel }}</h3>
                </header>
                <div class="panel-body">
                    @include('dcms.setting.includes.button-nav')
                    @include('dcms.includes.flash_message_error')                                        
                
                    <div class="stepy-tab">
                        <ul id="default-titles" class="stepy-titles clearfix">
                            <li id="default-title-0" class="current-step">
                                <div>First Footer Section</div>
                            </li>
                            <li id="default-title-1" class="">
                                <div>Second Footer Section</div>
                            </li>
                            <li id="default-title-2" class="">
                                <div>Third Footer Section</div>
                            </li>
                            <li id="default-title-3" class="">
                                <div>Forth Footer Section</div>
                            </li>
                        </ul>
                    </div>
                    <form class="form-horizontal" id="default" action="{{URL::route($_base_route.'.footer.store', 1)}}" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT') }} {{ csrf_field() }}
                        <fieldset title="First" class="step" id="default-step-0">
                            <legend> </legend>
                            <header class="panel-heading tab-bg-dark-navy-blue ">
                                    <ul class="nav nav-tabs">
                                        @if(isset($data['lang']))
                                            @foreach($data['lang'] as $row )
                                            <li class="@if($loop->iteration == 1){{ 'active' }} @endif">
                                                <a data-toggle="tab" href="#{{ $row->name }}">{{ $row->name }}</a>
                                            </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </header>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        @if(isset($data['lang']))
                                            @foreach($data['lang'] as $row )
                                                <div id="{{  $row->name }}" class="tab-pane @if($loop->iteration == 1){{ 'active' }} @endif">
                                                    <?php
                                                    if(isset($titles[$loop->index]['id'])){
                                                        $id = $titles[$loop->index]['id'];
                                                    }else {
                                                        $id = '';
                                                    }
                                                    if(isset($titles[$loop->index]['footer_first_title'])){
                                                        $footer_first_title = $titles[$loop->index]['footer_first_title'];
                                                    }else {
                                                        $footer_first_title = '';
                                                    }
                                                    if(isset($titles[$loop->index]['footer_first_description'])){
                                                        $footer_first_description = $titles[$loop->index]['footer_first_description'];
                                                    }else {
                                                        $footer_first_description = '';
                                                    }
                                                    dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                                                    dm_hidden('rows['.$loop->index.'][id]', $id);
                                                    dm_hidden('common_unique_id', 1);
                                                    dm_inputUpdate('text','rows['.$loop->index.'][footer_first_title]', "Site First Title (*)", $footer_first_title); 
                                                    dm_ckeditorUpdate($row->code.$loop->iteration."1", 'rows['.$loop->index.'][footer_first_description]', 'Description(*)', $footer_first_description);
            
                                                    ?>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                        </fieldset>
                        <fieldset title="Second" class="step" id="default-step-1" >
                            <legend> </legend>
                            <header class="panel-heading tab-bg-dark-navy-blue ">
                                    <ul class="nav nav-tabs">
                                        @if(isset($data['lang']))
                                            @foreach($data['lang'] as $row )
                                            <li class="@if($loop->iteration == 1){{ 'active' }} @endif">
                                                <a data-toggle="tab" href="#{{ $row->name }}-1">{{ $row->name }}</a>
                                            </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </header>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        @if(isset($data['lang']))
                                            @foreach($data['lang'] as $row )
                                                <div id="{{$row->name}}-1" class="tab-pane @if($loop->iteration == 1){{ 'active' }} @endif">
                                                    <?php
                                                  if(isset($titles[$loop->index]['footer_second_title'])){
                                                        $footer_second_title = $titles[$loop->index]['footer_second_title'];
                                                    }else {
                                                        $footer_second_title = '';
                                                    }
                                                    if(isset($titles[$loop->index]['footer_second_description'])){
                                                        $footer_second_description = $titles[$loop->index]['footer_second_description'];
                                                    }else {
                                                        $footer_second_description = '';
                                                    }
                        
                                                    dm_inputUpdate('text','rows['.$loop->index.'][footer_second_title]', "Site second Title (*)", $footer_second_title); 
                                                    dm_ckeditorUpdate($row->code.$loop->iteration."2", 'rows['.$loop->index.'][footer_second_description]', 'Description(*)', $footer_second_description);
                                                    ?>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                        </fieldset>
                        <fieldset title="Third" class="step" id="default-step-2" >
                            <legend> </legend>
                            <header class="panel-heading tab-bg-dark-navy-blue ">
                                    <ul class="nav nav-tabs">
                                        @if(isset($data['lang']))
                                            @foreach($data['lang'] as $row )
                                            <li class="@if($loop->iteration == 1){{ 'active' }} @endif">
                                                <a data-toggle="tab" href="#{{ $row->name }}-2">{{ $row->name }}</a>
                                            </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </header>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        @if(isset($data['lang']))
                                            @foreach($data['lang'] as $row )
                                                <div id="{{$row->name}}-2" class="tab-pane @if($loop->iteration == 1){{ 'active' }} @endif">
                                                    <?php
                                                    if(isset($titles[$loop->index]['footer_third_title'])){
                                                        $footer_third_title = $titles[$loop->index]['footer_third_title'];
                                                    }else {
                                                        $footer_third_title = '';
                                                    }
                                                    if(isset($titles[$loop->index]['footer_third_description'])){
                                                        $footer_third_description = $titles[$loop->index]['footer_third_description'];
                                                    }else {
                                                        $footer_third_description = '';
                                                    }
                                                    dm_inputUpdate('text','rows['.$loop->index.'][footer_third_title]', "Site third Title (*)", $footer_third_title); 
                                                    dm_ckeditorUpdate($row->code.$loop->iteration."3", 'rows['.$loop->index.'][footer_third_description]', 'Description(*)', $footer_third_description);
                                                    ?>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                        </fieldset>
                        <fieldset title="Forth" class="step" id="default-step-3" >
                            <legend> </legend>
                            <header class="panel-heading tab-bg-dark-navy-blue ">
                                    <ul class="nav nav-tabs">
                                        @if(isset($data['lang']))
                                            @foreach($data['lang'] as $row )
                                            <li class="@if($loop->iteration == 1){{ 'active' }} @endif">
                                                <a data-toggle="tab" href="#{{ $row->name }}-3">{{ $row->name }}</a>
                                            </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </header>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        @if(isset($data['lang']))
                                            @foreach($data['lang'] as $row )
                                                <div id="{{  $row->name }}-3" class="tab-pane @if($loop->iteration == 1){{ 'active' }} @endif">
                                                    <?php
                                                    if(isset($titles[$loop->index]['footer_fourth_title'])){
                                                        $footer_fourth_title = $titles[$loop->index]['footer_fourth_title'];
                                                    }else {
                                                        $footer_fourth_title = '';
                                                    }
                                                    if(isset($titles[$loop->index]['footer_fourth_description'])){
                                                        $footer_fourth_description = $titles[$loop->index]['footer_fourth_description'];
                                                    }else {
                                                        $footer_fourth_description = '';
                                                    }
                                        
                                                    dm_inputUpdate('text','rows['.$loop->index.'][footer_fourth_title]', "Site forth Title (*)", $footer_fourth_title); 
                                                    dm_ckeditorUpdate($row->code.$loop->iteration."4", 'rows['.$loop->index.'][footer_fourth_description]', 'Description(*)', $footer_fourth_description);
                                                    ?>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                        </fieldset>
                        <input type="submit" class="finish btn btn-danger" value="Finish"/>
                    </form>
                </div>
            </section>
        </div>
    </div>


@endsection

@section('js')
<!--Form Wizard-->
<script src="{{asset('assets/dcms/js/jquery.steps.min.js')}}" type="text/javascript"></script>
<!--script for this page-->
<script src="{{asset('assets/dcms/js/jquery.stepy.js')}}"></script>

    <script>

            //step wizard
      
            $(function() {
                $('#default').stepy({
                    backLabel: 'Previous',
                    block: true,
                    nextLabel: 'Next',
                    titleClick: true,
                    titleTarget: '.stepy-tab'
                });
            });
        </script>

@if(isset($data['lang']))
@foreach($data['lang'] as $row )
    <script>
        CKEDITOR.replace(<?=$row->code.$loop->iteration ?>1, options);
        CKEDITOR.replace(<?=$row->code.$loop->iteration ?>2, options);
        CKEDITOR.replace(<?=$row->code.$loop->iteration ?>3, options);
        CKEDITOR.replace(<?=$row->code.$loop->iteration ?>4, options);
    </script>
@endforeach
@endif 
      
@endsection