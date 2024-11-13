@extends('dcms.layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                   <h3>{{ $_panel }}</h3>
                </header>
                <div class="panel-body">
                        @include('dcms.includes.flash_message_error')
                    <div class=" form">
                        <?php
                        dm_hpostform(URL::route($_base_route.'.store'), 'POST');
                        // dm_hselect_faicon('icon', 'Icon', $data['fa-icons']);
                        ?>
                        @foreach($data['lang'] as $row)
                        <?php
                        dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                        dm_hinput('text','rows['.$loop->index.'][title]', "Name Of Data (<strong>$row->name</strong>)(<em style='color:red'>*</em>)", 'rows.'.$loop->index.'.title');
                        ?>
                        @endforeach
                        <?php
                        dm_hinput('number','data', "Enter Data(<em style='color:red'>*</em>)");
                        dm_hinput('number','order', "Order");
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
@include('dcms.includes.flash-message')

@endsection
