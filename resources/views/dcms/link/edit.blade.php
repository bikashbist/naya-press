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
                        dm_hpostform(URL::route($_base_route.'.update', ['link_unique_id' => $data['single']->link_unique_id]), 'PUT');
                        ?>
                        @foreach($data['lang'] as $row)
                        <?php
                         if(isset($links[$loop->index]['id'])){
                            $id = $links[$loop->index]['id'];
                        }else {
                            $id = '';
                        }
                        if(isset($links[$loop->index]['name'])){
                            $name = $links[$loop->index]['name'];
                        }else {
                            $name = '';
                        }
                        if(isset($links[$loop->index]['location'])){
                            $location = $links[$loop->index]['location'];
                        }else {
                            $location = '';
                        }
                        dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                        dm_hidden('rows['.$loop->index.'][id]', $id);
                        dm_hidden('link_unique_id', $data['single']->link_unique_id);
                        dm_hinputUpdate('text','rows['.$loop->index.'][name]', "Name Of Link (<strong>$row->name</strong>)(<em style='color:red'>*</em>)", $name);
                        // dm_hinputUpdate('text','rows['.$loop->index.'][location]', "Location  (<strong>$row->name</strong>)(<em style='color:red'>*</em>)", $location);
                        ?>
                        @endforeach
                        <?php
                        dm_hinputUpdate('url','url', "URL of Website(<em style='color:red'>*</em>)", $data['single']->url);
                        dm_hinputUpdate('number','order', "Order", $data['single']->order);
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
