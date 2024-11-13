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
                        dm_hinput('text','rows['.$loop->index.'][name]', "Name (<strong>$row->name</strong>)(<em style='color:red'>*</em>)", 'rows.'.$loop->index.'.name');
                        dm_hinput('text','rows['.$loop->index.'][location]', "Location  (<strong>$row->name</strong>)(<em style='color:red'>*</em>)", 'rows.'.$loop->index.'.location');
                        ?>
                        @endforeach
                        <?php
                        dm_hinput('url','url', "URL of Website(<em style='color:red'>*</em>)", 'url');
                        dm_hinput('number','order', "Order", 'order');
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
