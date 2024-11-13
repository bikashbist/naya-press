@extends('dcms.layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                   {{ $_panel }}
                </header>
                <div class="panel-body">
                        @include('dcms.includes.buttons.button-back')
                        @include('dcms.includes.flash_message_error')
                    <div class=" form">
                        <?php
                        dm_hpostform(URL::route($_base_route.'.update', $data['albums']), 'PUT');
                        dm_hinputUpdate('text','name', 'Album Name(<em style="color:red">*</em>)', $data['albums']->name);

                        ?>
                        @foreach($data['lang'] as $lang)
                        <?php
                        if(isset($albums_name[$loop->index]->title)){
                            $albums_title = $albums_name[$loop->index]->title;
                        }
                        else {
                        $albums_title = '';
                        }
                        dm_hidden('rows['.$loop->index.'][lang_id]', $lang->id);
                        dm_hinputUpdate('text','rows['.$loop->index.'][name]', "Album Name (<strong>$lang->name</strong>)(<em style='color:red'>*</em>)", $albums_title);
                        ?>
                        @endforeach
                        <?php
                        dm_hinputUpdate('file', 'image', 'Album Feature Image', '', '');

                        dm_hinputUpdate('number','order', "Order", $data['albums']->order);
                        dm_hcheckbox('checkbox', 'status', 'Status', $data['albums']->status);
                        if(isset($data['albums']->cover_image)){
                              dm_thumbImage($data['albums']->cover_image);
                        }
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
