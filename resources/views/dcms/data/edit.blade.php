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
                        dm_hpostform(URL::route($_base_route.'.update', ['data_unique_id' => $data['single']->data_unique_id]), 'PUT');
                        // dm_hselect_faicon('icon', 'Icon', $data['fa-icons'], $data['single']->icon);
                        ?>
                        @foreach($data['lang'] as $row)
                        <?php
                         if(isset($links[$loop->index]['id'])){
                            $id = $links[$loop->index]['id'];
                        }else {
                            $id = '';
                        }
                        if(isset($links[$loop->index]['title'])){
                            $title = $links[$loop->index]['title'];
                        }else {
                            $title = '';
                        }
                        dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                        dm_hidden('rows['.$loop->index.'][id]', $id);
                        dm_hidden('data_unique_id', $data['single']->data_unique_id);
                        dm_hinputUpdate('text','rows['.$loop->index.'][title]', "Name Of Data (<strong>$row->name</strong>)(<em style='color:red'>*</em>)", $title);
                        ?>
                        @endforeach
                        <?php
                        dm_hinputUpdate('number','data', "Enter Data(<em style='color:red'>*</em>)", $data['single']->data);
                        dm_hinputUpdate('number','order', "Order", $data['single']->order);
                        dm_hcheckbox('checkbox', 'status', 'Status' ,$data['single']->status);
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
