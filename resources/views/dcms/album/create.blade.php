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
                        dm_hpostform(URL::route($_base_route.'.store'), 'POST');
                        dm_hinput('text','name', 'Album Name(<em style="color:red">*</em>)', 'name');
                        ?>
                        @csrf
                        @foreach($data['lang'] as $lang)
                        <?php
                        dm_hidden('rows['.$loop->index.'][lang_id]', $lang->id);
                        dm_hinput('text','rows['.$loop->index.'][name]', "Album Name (<strong>$lang->name</strong>)(<em style='color:red'>*</em>)", 'rows.'.$loop->index.'.name');
                        ?>
                        @endforeach
                        <?php
                        dm_hinput('file', 'image', 'Album Feature Image', '', '');
                        dm_hinput('number','order', "Order", 'order');
                        dm_hcheckbox('checkbox', 'status', 'Status');
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
