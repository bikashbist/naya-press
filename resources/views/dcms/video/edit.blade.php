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
                        dm_hpostform(URL::route($_base_route.'.update', ['video' => $data['single']->video_unique_id]), 'PUT');
                        ?>
                        @foreach($data['lang'] as $row)
                        <?php
                         if(isset($videos[$loop->index]['id'])){
                            $id = $videos[$loop->index]['id'];
                        }else {
                            $id = '';
                        }
                        if(isset($videos[$loop->index]['video_title'])){
                            $video_title = $videos[$loop->index]['video_title'];
                        }else {
                            $video_url = '';
                        }
                        if(isset($videos[$loop->index]['location'])){
                            $location = $videos[$loop->index]['location'];
                        }else {
                            $location = '';
                        }
                        dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                        dm_hidden('rows['.$loop->index.'][id]', $id);
                        dm_hidden('video_unique_id', $data['single']->video_unique_id);
                        dm_hinputUpdate('text','rows['.$loop->index.'][video_title]', "Name Of Link (<strong>$row->name</strong>)(<em style='color:red'>*</em>)", $video_title);
                        // dm_hinputUpdate('text','rows['.$loop->index.'][location]', "Location  (<strong>$row->name</strong>)(<em style='color:red'>*</em>)", $location);
                        ?>
                        @endforeach
                        <?php
                        dm_hinputUpdate('video_url','video_url', "URL of Website(<em style='color:red'>*</em>)", $data['single']->video_url);
                        dm_hcheckbox('checkbox', 'status', 'Status', $data['single']->status);
                        dm_hcheckbox('checkbox', 'featured', 'Featured', $data['single']->featured);

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
