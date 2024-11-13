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
                            if($row->id)
                        dm_hpostform(URL::route($_base_route.'.about.store', ['about'=>$row->id]), 'POST');
                        dm_hinputUpdate('file', 'image', 'Image', '', '');
                        dm_hinputUpdate('text','title', "Enter Title", $row->about_title);
                        dm_hinputUpdate('text','sub_title', "Enter Sub-title", $row->about_sub_title);
                        dm_hckeditorUpdate('description', 'Description', $row->about_description);
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


    <script>
        CKEDITOR.replace('description', options);
    </script>
@endsection