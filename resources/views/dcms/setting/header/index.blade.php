@extends('dcms.layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                   <h3>{{ $_panel }}</h3>
                </header>
                <div class="panel-body">
                        @include('dcms.setting.includes.button-nav')
                        @include('dcms.includes.flash_message_error')
                    <div class=" form">
                        <?php
                        if($data['single']->common_unique_id)
                        dm_hpostform(URL::route($_base_route.'.title.store', 1), 'PUT');
                        dm_hinputUpdate('file', 'logo', 'Logo', '', '');
                        ?>
                        <header class="panel-heading tab-bg-dark-navy-blue ">
                            <ul class="nav nav-tabs">
                                @if(isset($data['lang']))
                                    @foreach($data['lang'] as $row )
                                    <li class="@if($loop->iteration == 1){{ 'active' }} @endif">
                                        <a data-toggle="tab" href="#{{ $row->name }}">{{ $row->name }}</a>
                                    </li>
                                    @endforeach
                                @endif
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                @if(isset($data['lang']))
                                    @foreach($data['lang'] as $row )
                                    <div id="{{  $row->name }}" class="tab-pane @if($loop->iteration == 1){{ 'active' }} @endif">
                                        <?php
                                        if(isset($titles[$loop->index]['id'])){
                                            $id = $titles[$loop->index]['id'];
                                        }else {
                                            $id = '';
                                        }
                                        if(isset($titles[$loop->index]['header_first_title'])){
                                            $header_first_title = $titles[$loop->index]['header_first_title'];
                                        }else {
                                            $header_first_title = '';
                                        }
                                        if(isset($titles[$loop->index]['header_second_title'])){
                                            $header_second_title = $titles[$loop->index]['header_second_title'];
                                        }else {
                                            $header_second_title = '';
                                        }
                                        if(isset($titles[$loop->index]['header_third_title'])){
                                            $header_third_title = $titles[$loop->index]['header_third_title'];
                                        }else {
                                            $header_third_title = '';
                                        } if(isset($titles[$loop->index]['header_fourth_title'])){
                                            $header_fourth_title = $titles[$loop->index]['header_fourth_title'];
                                        }else {
                                            $header_fourth_title = '';
                                        }
                                        dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                                        dm_hidden('rows['.$loop->index.'][id]', $id);
                                        dm_hidden('common_unique_id', 1);
                                        dm_hinputUpdate('text','rows['.$loop->index.'][header_first_title]', "Site First Title (*)", $header_first_title);
                                        dm_hinputUpdate('text','rows['.$loop->index.'][header_second_title]', "Site Second Title (*)", $header_second_title);
                                        dm_hinputUpdate('text','rows['.$loop->index.'][header_third_title]', "Site Third Title (*)", $header_third_title);
                                        dm_hinputUpdate('text','rows['.$loop->index.'][header_fourth_title]', "Site Forth Title ", $header_fourth_title);
                                        ?>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <?php
                         if(isset($data['single']->logo)){
                            dm_thumbImage($data['single']->logo);
                        }
                        if (isset($data['single']->hero_banner)) {
                         dm_thumbImage($data['single']->hero_banner);
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


@endsection
