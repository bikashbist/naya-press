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
                        dm_hpostform(URL::route($_base_route.'.update', $row->id), 'PUT');
                        dm_hinputUpdate('file', 'image', 'Language Flag', '', '');
                        dm_hinputUpdate('text','name', "Language Name(<em style='color:red'>*</em>)", $row->name);
                        dm_hinputUpdate('text','code', "Language Code(<em style='color:red'>*</em>)", $row->code);
                        // dm_hinput('number','order', "Order", $row->sort_order);
                        dm_hcheckbox('checkbox', 'status', 'Public', $row->status);
                        // dm_hcheckbox('checkbox', 'default', 'Default', $row->default);
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
@include('dcms.includes.flash-message')

@endsection
