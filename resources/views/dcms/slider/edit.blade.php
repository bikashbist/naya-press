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
                        dm_hpostform(URL::route($_base_route.'.update', [$data['slider']->id]), 'PUT');
                        dm_hinputUpdate('file', 'image', 'Slider Image(<em style="color:red">*</em>)', '', '');
                        dm_hinputUpdate('text','name', "Slider Name(<em style='color:red'>*</em>)", $data['slider']->name);
                        ?>
                        @foreach($data['lang'] as $lang)
                          <?php
                          if(isset($data['slider_name'][$loop->index]->name)){
                              $slider_name = $data['slider_name'][$loop->index]->name;
                          }else {
                              $slider_name = null;
                          }
                          if(isset($data['slider_name'][$loop->index]->description)){
                              $description = $data['slider_name'][$loop->index]->description;
                          }else {
                              $description = null;
                          }
                            dm_hidden('rows['.$loop->index.'][lang_id]', $lang->id);
                            dm_hinputUpdate('text','rows['.$loop->index.'][lang_name]', "Slider Name (<strong>$lang->name</strong>)(<em style='color:red'>*</em>)",$slider_name);
                            dm_htextareaUpdate('rows['.$loop->index.'][description]',  "Menu Description (<strong>$lang->name</strong>)", $description );
                         ?>
                        @endforeach
                        <?php
                        if(isset($data['slider']->image)){
                            dm_thumbImage($data['slider']->image);
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
@include('dcms.includes.flash-message')


@endsection
