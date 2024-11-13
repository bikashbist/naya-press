@extends('dcms.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>{{ $_panel }}</h3>
                @include('dcms.includes.buttons.button-back')
                @include('dcms.includes.flash_message_error')
            </header>
        </section>
    </div>
    <div class="form">
        <?php
        dm_postform(URL::route($_base_route . '.update', ['staff_unique_id' => $data['single']->staff_unique_id]), 'PUT');
        ?>
        <div class="col-lg-8 col-md-8 col-xs-8">

            <!--tab nav start-->
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

                            if (isset($staff[$loop->index]['id'])) {
                                $id = $staff[$loop->index]['id'];
                            } else {
                                $id = '';
                            }
                            if (isset($staff[$loop->index]['name'])) {
                                $name = $staff[$loop->index]['name'];
                            } else {
                                $name = '';
                            }
                            if (isset($staff[$loop->index]['designation'])) {
                                $designation = $staff[$loop->index]['designation'];
                            } else {
                                $designation = '';
                            }
                            if (isset($staff[$loop->index]['description'])) {
                                $description = $staff[$loop->index]['description'];
                            } else {
                                $description = '';
                            }

                            dm_hidden('rows[' . $loop->index . '][lang_id]', $row->id);
                            dm_hidden('rows[' . $loop->index . '][id]', $id);
                            dm_hidden('staff_unique_id', $data['single']->staff_unique_id);
                            dm_inputUpdate('text', 'rows[' . $loop->index . '][name]', 'Name(<em style="color:red">*</em>)', $name, '');
                            dm_inputUpdate('text', 'rows[' . $loop->index . '][designation]', 'Designation(<em style="color:red">*</em>)', $designation, '');
                            dm_ckeditorUpdate($row->code . $loop->iteration, 'rows[' . $loop->index . '][description]', 'Description', $description);
                            // dm_hinputUpdate('text','order', "Order", $data['single']->order);

                            ?>
                        </div>
                        @endforeach
                        @endif
                        <input type="number" class="form form-control" name="order" id="order" value="{{$data['single']->order}}" placeholder="Order">

                    </div>
                </div>
            </section>
            <!--tab nav start-->
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <section class="panel">
                <div class="panel-heading">
                    <p>Staff Image</p>
                </div>
                <div class="panel-body">
                    <?php
                    dm_input('file', 'image', 'Staff Image', '', '');
                    if (isset($data['single']->image)) {
                        dm_thumbImage($data['single']->image);
                    }
                    ?>
                </div>
            </section>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <section class="panel">
                <div class="panel-heading">
                    <p>Select Branch</p>
                </div>
                <div class="panel-body">
                    <?php
                    if (!empty($data['single']->branch_id)) {
                        $branch_id = $data['single']->branch_id;
                        $branch_name = $data['single']->branch->name;
                    } else {
                        $branch_id = '';
                        $branch_name = "No Branch";
                    }
                    ?>
                    <div class="form-group">
                        <label for="organization_Id">Organization(<em style="color:red">*</em>)</label>
                        <select name="organization_Id" id="organization_Id" class="form-control">
                            @if($data['organization'])
                            @foreach($data['organization'] as $row)
                            <option value="{{$row->unique_id}}" @if($data['single']->organization_Id == $row->unique_id) selected @endif>{{ $row->title}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <section class="panel">
                <div class="panel-heading">
                    <p>Staff Status</p>
                </div>
                <div class="panel-body">
                    <?php
                    dm_inputUpdate('text', 'phone', 'Phone Number', $data['single']->phone, '');
                    dm_inputUpdate('text', 'email', 'Email Address', $data['single']->email, '');
                    // dm_inputUpdate('number', 'level', 'Level(<em style="color:red">*</em>)', $data['single']->level, '');



                    dm_inputUpdate('url', 'facebook', 'Facebook', $data['single']->facebook, '');
                    dm_inputUpdate('url', 'twitter', 'Twitter', $data['single']->twitter, '');
                    dm_inputUpdate('url', 'instagram', 'Instragram', $data['single']->instagram, '');
                    dm_inputUpdate('text', 'address',   'Address', $data['single']->address, '');
                    dm_inputUpdate('url', 'youtube',   'Youtube URL', $data['single']->youtube, '');

                    dm_checkbox('checkbox', 'status', 'Status', $data['single']->status);
                    dm_checkbox('checkbox', 'featured', 'Featured', $data['single']->featured);


                    ?>
                </div>
            </section>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <?php
            dm_hsubmit('Submit', URL::route($_base_route . '.index_organization'), 'Cancel');
            dm_closeform();
            ?>
        </div>
    </div>
</div>

@endsection

@section('js')
<!--custom tagsinput-->
<script src="{{asset('assets/dcms/js/jquery.tagsinput.js')}}"></script>
@if(isset($data['lang']))
@foreach($data['lang'] as $row )
<script>
    CKEDITOR.replace(<?= $row->code . $loop->iteration ?>, options);
</script>
@endforeach
@endif
<script>
    $(document).ready(function() {
        $(".btn-file").click(function() {
            var html = $(".clone-file").html();
            $(".file-block").append(html);
        });

        $("body").on("click", ".btn-remove", function() {
            $(this).parents(".control-group").remove();
        });
    });
</script>
@endsection