@extends('dcms.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <section class="panel">
                <header class="panel-heading">
                    <h3>{{ $_panel }}</h3>
                </header>
                @include('dcms.includes.flash-message')

        </section>
        <div class="form">
            <?php
                 dm_hpostform(URL::route($_base_route.'.update', ['popup' => $data['single']->popup_unique_id]), 'PUT');
            ?>
            <div class="col-lg-12 col-md-12 col-xs-12">
                <section class="panel">
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
                                                dm_hidden('popup_unique_id', $data['single']->popup_unique_id);
                                                dm_hidden('rows['.$loop->index.'][id]', $id);
                                                dm_inputUpdate('text', 'rows['.$loop->index.'][title]', 'Title(<em style="color:red">*</em>)', $name, '');
                                                dm_ckeditorUpdate($row->code.$loop->iteration, 'rows['.$loop->index.'][description]', 'Description(<em style="color:red">*</em>)', $description);
                                            ?>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                </section>
            <!--tab nav start-->
            </div>
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="images">Image</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple>
                    </div>
                </div>
                <div class="panel-body">
                        <?php
                        //dm_hinputUpdate('file', 'image', 'Image', '', '');
                        dm_hinputUpdate('text','link', "Link", $data['single']->link);
                        dm_hinputUpdate('number','order', "Order", $data['single']->order);
                        dm_hcheckbox('checkbox', 'status', 'Status', $data['single']->status);
                        dm_hsubmit('Submit', URL::route($_base_route.'.index'), 'Cancel');
                        dm_closeform();
                        ?>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('js')
@if(isset($data['lang']))
    @foreach($data['lang'] as $row )
        <script>
            CKEDITOR.replace(<?=$row->code.$loop->iteration?>, options);
        </script>
    @endforeach
@endif
@endsection
