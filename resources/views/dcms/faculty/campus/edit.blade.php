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
                @include('dcms.includes.buttons.button-back')
                @include('dcms.includes.flash_message_error')
            </header>
        </section>
    </div>
    <div class="form">
        <?php
        dm_postform(URL::route($_base_route.'.update', ['id' => $data['single']->unique_id]), 'PUT');
        ?>
        <div class="col-lg-8 col-md-8 col-xs-8">

            <section class="panel">
                <div class="panel-heading">
                    <p>Select Institute</p>
                </div>
                <div class="panel-body">
                    <?php
                        dm_dropdownInstitute('affiliated_id','Institute(<em style="color:red">*</em>)', $data['institute'], $data['single']->affiliated_id, App\Model\Dcms\Eloquent\DM_Post::getAffiliatedName($data['single']->affiliated_id));
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
                                             if(isset($programs[$loop->index]['id'])){
                                                    $id = $programs[$loop->index]['id'];
                                                }
                                                else{
                                                    $id = '';
                                                }
                                                if(isset($programs[$loop->index]['title'])){
                                                    $title = $programs[$loop->index]['title'];
                                                }else {
                                                    $title = '';
                                                }
                                                if(isset($programs[$loop->index]['description'])){
                                                    $content = $programs[$loop->index]['description'];
                                                }else {
                                                    $content = '';
                                                }
                                                if(isset($programs[$loop->index]['excerpt'])){
                                                    $excerpt = $programs[$loop->index]['excerpt'];
                                                }else {
                                                    $excerpt = '';
                                                }
                                                dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                                                dm_hidden('unique_id', $data['single']->unique_id);
                                                dm_hidden('rows['.$loop->index.'][id]', $id);
                                                dm_inputUpdate('text', 'rows['.$loop->index.'][title]', 'Title(<em style="color:red">*</em>)', $title, '');
                                                dm_ckeditorUpdate($row->code.$loop->iteration, 'rows['.$loop->index.'][description]', 'Description(<em style="color:red">*</em>)', $content);
                                                // dm_textareaUpdate('rows['.$loop->index.'][excerpt]', 'Excerpt', $excerpt, '');
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
                    <p>Choose Campus File</p>
                </div>
                <div class="panel-body">
                    <?php
                        dm_input('file', 'image', 'Choose Campus File', '', '');
                        dm_inputUpdate('text', 'url', 'Website Url', $data['single']->url, '');
                    ?>
                </div>
            </section>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <section class="panel">
                <div class="panel-heading">
                    <p>Campus</p>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label name="campus_type" for="inputSuccess">Campus Type</label>
                            <select name="campus_type" class="form-control m-bot15">
                                @if($data['single']->campus_type == "affiliated")
                                <option value="affiliated">Affiliated</option>
                                @else
                                <option value="constituent">Constituent</option>
                                @endif
                                <option value="constituent">Constituent</option>
                                <option value="affiliated">Affiliated</option>
                            </select>
                    </div>
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
                            // dm_textareaUpdate('tag', 'Tags(<em style="color:red">*</em>)', $data['single']->tag, '');
                            dm_checkbox('checkbox', 'status', 'Publish', $data['single']->status);
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
            CKEDITOR.replace(<?=$row->code.$loop->iteration ?>, options);
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
