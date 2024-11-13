@extends('dcms.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <section class="panel">
            <header class="panel-heading">
                {{ $_panel }}
                <br>
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
            <section class="panel">
                    <div class="panel-heading">
                        <p>Select Faculty</p>
                    </div>
                    <div class="panel-body">
                        <?php
                            dm_dropdownInstitute('affiliated_id','Faculty(<em style="color:red">*</em>)', $data['institute']);
                        ?>
                    </div>
            </section>
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
                                        dm_hidden('type', 'post');
                                        dm_input('text', 'rows['.$loop->index.'][title]', 'Title(<em style="color:red">*</em>)', 'rows.'.$loop->index.'.title', '');
                                        dm_ckeditor($row->code.$loop->iteration, 'rows['.$loop->index.'][description]', 'Description(<em style="color:red">*</em>)', 'rows.'.$loop->index.'.description');
                                        // dm_textarea('rows['.$loop->index.'][excerpt]', 'Excerpt', 'rows.'.$loop->index.'.excerpt', '');
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
                    <p>Course Related Files</p>
                </div>
                <div class="panel-body">
                    <?php
                        dm_input('file', 'file', 'Course Related Files', '', '');
                    ?>
                </div>
            </section>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <section class="panel">
                <div class="panel-heading">
                    <p>Select Course Category</p>
                </div>
                <div class="panel-body">
                    <?php
                        dm_dropdown('category_id','Course Category(<em style="color:red">*</em>)', $data['category']);
                    ?>
                </div>
            </section>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <section class="panel">
                <div class="panel-heading">
                    <p>Page Status</p>
                </div>
                <div class="panel-body">
                    <?php
                        // dm_textarea('tag', 'Tags(<em style="color:red">*</em>)', 'tag', '');
                        dm_checkbox('checkbox', 'status', 'Publish');
                        dm_hidden('type', 'faculty');
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
        $(".file-block").prepend(html);
    });

    $("body").on("click", ".btn-remove", function() {
        $(this).parents(".control-group").remove();
    });
});


$(function() {
// Tags Input
$(".tag").tagsInput();
});

</script>

@endsection