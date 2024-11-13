@extends('dcms.layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/css/intlTelInput.css" />
@endsection
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
        dm_postform(URL::route($_base_route . '.store'), 'POST');
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
                            dm_hidden('rows[' . $loop->index . '][lang_id]', $row->id);
                            dm_input('text', 'rows[' . $loop->index . '][name]', 'Name(<em style="color:red">*</em>)', 'rows.' . $loop->index . '.name', '');
                            dm_input('text', 'rows[' . $loop->index . '][designation]', 'Designation(<em style="color:red">*</em>)', 'rows.' . $loop->index . '.designation', '');
                            dm_ckeditor($row->code . $loop->iteration, 'rows[' . $loop->index . '][description]', 'Description', 'rows.' . $loop->index . '.description');
                            ?>
                        </div>
                        @endforeach
                        @endif
                        <input type="number" class="form form-control" name="order" id="order" value="{{old('order')}}" placeholder="Order">

                    </div>
                </div>
            </section>
            <!--tab nav start-->
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <section class="panel">
                <div class="panel-heading">
                    <p>Member Image</p>
                </div>
                <div class="panel-body">
                    <?php
                    dm_input('file', 'image', 'Staff Image', '', '');
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
                    if (!empty($data['single']->organization_id)) {
                        $organization_id = $data['single']->organization_id;
                        $title = $data['single']->organization->title;
                    } else {
                        $organization_id = '';
                        $title = "No organization";
                    }

                    ?>
                    <div class="form-group">
                        <label for="organization_Id">Organization(<em style="color:red">*</em>)</label>
                       
                        <select name="organization_Id" id="organization_Id" class="form-control">
                        @if($data['organization'])
                        @foreach($data['organization'] as $row)
                            <option value="{{$row->unique_id}}">{{ $row->title}}</option>
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
                    <p>Member Status</p>
                </div>
                <div class="panel-body">
                    <!-- <div class="form-group col-md-12">
                        <input type="text" id="phone" class="form-control" placeholder="Phone Number" name="name">
                    </div> -->
                    <?php
                    dm_input('text', 'email', 'Email Address', 'email', '');
                    dm_input('text', 'phone', 'Phone Number', 'phone', '');
                    dm_input('url', 'facebook', 'Facebook', 'facebook', '');
                    dm_input('url', 'twitter', 'Twitter', 'twitter', '');
                    dm_input('url', 'instagram', 'Instragram', 'instagram', '');
                    dm_input('text', 'address',   'Address', 'address', '');
                    dm_input('url', 'youtube',   'Youtube URL', 'youtube', '');
                    dm_checkbox('checkbox', 'status', 'Status');
                    dm_checkbox('checkbox', 'featured', 'Featured');
                    ?>
                </div>
            </section>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <?php
            dm_hsubmit('Submit', URL::route($_base_route . '.index'), 'Cancel');
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
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        separateDialCode: true
    });
</script>
@endsection