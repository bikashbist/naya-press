@extends('dcms.layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                    @include('dcms.faculty.includes.nav-button')
                </header>
            </section>
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
                        dm_dropdownInstitute('institute','Select Institute(<em style="color:red">*</em>)', $data['institute']);
                        dm_hinput('file', 'image', 'Slider Image(<em style="color:red">*</em>)', '', '');
                        dm_hidden('type', 'faculty');
                        ?>
                        @foreach($data['lang'] as $lang)
                          <?php   dm_hidden('rows['.$loop->index.'][lang_id]', $lang->id);
                                  dm_menu_hinput('text','rows['.$loop->index.'][name]', "Name (<strong>$lang->name</strong>)(<em style='color:red'>*</em>)", 'rows.'.$loop->index.'.name');

                         ?>
                        @endforeach
                        <?php
                        dm_hsubmit('Submit', URL::route($_base_route.'.index'), 'Cancel');
                        dm_closeform();
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('js')



@endsection
