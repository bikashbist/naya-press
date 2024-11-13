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

                    dm_hpostform(URL::route($_base_route . '.update', ['id' => $data['single']->id]), 'PUT');
                    dm_hinputUpdate('text','name', "Title(<em style='color:red'>*</em>)", $data['single']->name);
                    ?>
                    <?php
                    dm_hinput('file', 'file', 'Audio', '', '');

                    dm_hcheckbox('checkbox', 'status', 'Status', $data['single']->status);

                    dm_hsubmit('Submit', URL::route($_base_route . '.index'), 'Cancel');
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