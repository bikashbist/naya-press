@extends('dcms.layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                   <h3>{{ $_panel }}</h3>
                </header>
                <div class="panel-body">
                        @include('dcms.includes.buttons.button-back')
                        @include('dcms.includes.flash_message_error')
                    <div class=" form">
                        <?php
                        dm_hpostform(URL::route($_base_route.'.store'), 'POST');
                        ?>
                        @foreach($data['lang'] as $row)
                        <?php
                        dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                        dm_hinput('text','rows['.$loop->index.'][video_title]', "Video Name (<strong>$row->name</strong>)(<em style='color:red'>*</em>)", 'rows.'.$loop->index.'.video_title');
                        // dm_hinput('text','rows['.$loop->index.'][location]', "Location  (<strong>$row->name</strong>)(<em style='color:red'>*</em>)", 'rows.'.$loop->index.'.location');
                        ?>
                        @endforeach
                        <?php
                        dm_hinput('video_url','video_url', "URL of Youtube(<em style='color:red'>*</em>)", 'video_url');
                        
                        dm_hcheckbox('checkbox', 'status', 'Status');
                        dm_hcheckbox('checkbox', 'featured', 'Featured');

                        dm_hsubmit('Submit', URL::route($_base_route.'.index'), 'Cancel');
                        dm_closeform();
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php


    ?>

@endsection

@section('js')

@endsection
