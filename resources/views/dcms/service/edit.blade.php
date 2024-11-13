@extends('dcms.layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/dcms/assets/bootstrap-colorpicker/css/colorpicker.css')}}" />
@endsection

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
                        dm_hpostform(URL::route($_base_route.'.update', ['service_unique_id' => $data['single']->service_unique_id]), 'PUT');
                        dm_hselect_faicon('icon', 'Icon', $data['fa-icons'], $data['single']->icon);
                        dm_hcolor_picker('color', "Pick the color", $data['single']->color);
                        ?>
                        @foreach($data['lang'] as $row)
                        <?php
                         if(isset($links[$loop->index]['id'])){
                            $id = $links[$loop->index]['id'];
                        }else {
                            $id = '';
                        }
                        if(isset($links[$loop->index]['title'])){
                            $name = $links[$loop->index]['title'];
                        }else {
                            $name = '';
                        }
                        if(isset($links[$loop->index]['description'])){
                            $description = $links[$loop->index]['description'];
                        }else {
                            $description = '';
                        }
                        dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                        dm_hidden('rows['.$loop->index.'][id]', $id);
                        dm_hidden('service_unique_id', $data['single']->service_unique_id);
                        dm_hinputUpdate('text','rows['.$loop->index.'][title]', "Name(<strong>$row->name</strong>)(<em style='color:red'>*</em>)", $name);
                        dm_hinputUpdate('text','rows['.$loop->index.'][description]', "Description(<strong>$row->description</strong>)(<em style='color:red'>*</em>)", $description);
                        ?>
                        @endforeach
                        <?php
                        dm_hinputUpdate('url','link', "Link(<em style='color:red'>*</em>)", $data['single']->link);
                        dm_hinputUpdate('number','order', "Order", $data['single']->order);
                        dm_hcheckbox('checkbox', 'status', 'Status', $data['single']->status);
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
<script type="text/javascript" src="{{asset('assets/dcms/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
<script>
//colorpicker start

$('.colorpicker-default').colorpicker({
    format: 'hex'
});
$('.colorpicker-rgba').colorpicker();

//colorpicker end
</script>
@endsection
