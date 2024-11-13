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
        dm_postform(URL::route($_base_route.'.store'), 'POST');
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
                                        dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                                        dm_input('text', 'rows['.$loop->index.'][name]', 'Title(<em style="color:red">*</em>)', 'rows.'.$loop->index.'.name', '');
                                       // dm_input('text', 'rows['.$loop->index.'][designation]', 'Designation(<em style="color:red">*</em>)', 'rows.'.$loop->index.'.designation', '');
                                        //dm_input('text', 'rows['.$loop->index.'][designation_sec]', 'Designation Second(<em style="color:red">*</em>)', 'rows.'.$loop->index.'.designation_sec', '');
                                        dm_ckeditor($row->code.$loop->iteration, 'rows['.$loop->index.'][description]', 'Description','rows.'.$loop->index.'.description');
                                    ?>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>
            <!--tab nav start-->
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <section class="panel">
                <div class="panel-heading">
                    <p>Thumbnail Image</p>
                </div>
                <div class="panel-body">
                    <?php
                        dm_input('file', 'image', 'Thumbnail Image', '', '');
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
                               if(!empty($data['single']->branch_id )) {
                                                    $branch_id = $data['single']->branch_id;
                                                    $branch_name = $data['single']->branch->name;
                                    }else {
                                                    $branch_id = '';
                                                    $branch_name = "No Branch";
                            }

                                    dm_dbranchDropdown('branch_id', "Branch(<em style='color:red'>*</em>)", $data['branch'], $branch_id, $branch_name);
                            ?>
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
                        //dm_input('text', 'phone', 'Phone Number', 'phone', '');
                       // dm_input('text', 'email', 'Email Address', 'email', '');
                        dm_checkbox('checkbox', 'status', 'Status');
                        dm_checkbox('checkbox', 'featured', 'Featured');
                    ?>
                </div>
            </section>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <?php
                dm_hsubmit('Submit', URL::route($_base_route.'.index'), 'Cancel');
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
            CKEDITOR.replace(<?=$row->code.$loop->iteration?>, options);
        </script>
    @endforeach
@endif
<script>
$(document).ready(function() {
    $(".btn-file").click(function(){
        var html = $(".clone-file").html();
        $(".file-block").append(html);
    });

    $("body").on("click", ".btn-remove", function() {
        $(this).parents(".control-group").remove();
    });
});
</script>
@endsection
