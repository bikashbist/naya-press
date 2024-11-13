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
        dm_postform(URL::route($_base_route.'.update', $data['single']->post_unique_id), 'PUT');
        ?>
        <div class="col-lg-8 col-md-8 col-xs-8">
            <section class="panel">
                <div class="panel-heading">
                    <p>Select Province</p>
                </div>
                <div class="panel-body">
                    <select id="province_id" name="province" class="form-control">
                        <option value="">Select Province</option>
                        @foreach($data['provinces'] as $province)
                            <option value="{{ $province->id }}" 
                                {{ $data['single']->province_id == $province->id ? 'selected' : '' }}>
                                {{ $province->province_np }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </section>
            
            <section class="panel">
                <div class="panel-heading">
                    <p>Select District</p>
                </div>
                <div class="panel-body">
                    <select id="district_id" name="district" class="form-control">
                        <option value="">Select District</option>
                        @foreach($data['districts'] as $district)
                            <option value="{{ $district->id }}" 
                                {{ $data['single']->district_id == $district->id ? 'selected' : '' }}>
                                {{ $district->district_np }}
                            </option>
                        @endforeach
                    </select>
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
                                             if(isset($post[$loop->index]['id'])){
                                                    $id = $post[$loop->index]['id'];
                                                }
                                                else{
                                                    $id = '';
                                                }
                                                if(isset($post[$loop->index]['title'])){
                                                    $title = $post[$loop->index]['title'];
                                                }else {
                                                    $title = '';
                                                }
                                                if(isset($post[$loop->index]['content'])){
                                                    $content = $post[$loop->index]['content'];
                                                }else {
                                                    $content = '';
                                                }
                                                dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                                                dm_hidden('type', 'post');
                                                dm_hidden('post_unique_id', $data['single']->post_unique_id);
                                                dm_hidden('rows['.$loop->index.'][id]', $id);
                                                dm_inputUpdate('text', 'rows['.$loop->index.'][title]', 'Title(<em style="color:red">*</em>)', $title, '');
                                                dm_ckeditorUpdate($row->code.$loop->iteration, 'rows['.$loop->index.'][description]', 'Description(<em style="color:red">*</em>)', $content);
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
                    <div class="form-group">
                        <label for="images">Thumbnail Image</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple>
                        @foreach ($data['images'] as $image)
                            <div class="row m-4">
                                <div class="col-md-2 " style="margin-bottom:10px">
                                    <div style="position: relative; display: inline-block;">
                                        <!-- Image -->
                                        <img src="{{ asset($image->images) }}" alt="" width="100px"
                                            height="100px">

                                        <!-- Cross Mark -->
                                        <a href="{{ route($_base_route . '.delete_image', $image->id) }}">
                                            <span
                                                style="position: absolute; top: 5px; right: 5px; background-color: red; color: white; 
                                                 padding: 2px 5px; border-radius: 50%; cursor: pointer; font-weight: bold;">
                                                X
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            {{-- <section class="panel">
                <div class="panel-heading">
                    <p>Post Order</p>
                </div>
                <div class="panel-body">
                    <?php
                        dm_inputUpdate('number', 'order', 'Post Order', $data['single']->order, '');
                    ?>
                </div>
            </section> --}}
        </div>
        {{-- <div class="col-lg-4 col-md-4 col-xs-4">
            <section class="panel">
                <div class="panel-heading">
                    <p>File Section</p>
                </div>
                <div class="panel-body">
                    <?php
                        dm_button("button", "btn-success btn-file", "Add Files");
                    ?>
                    <div class="file-block">

                    </div>
                    <div class="clone-file hide">
                        <div class="control-group">
                            <?php
                                dm_inputUpdate('text', 'file_title[]', 'File Title', '', '');
                                dm_inputUpdate('file', 'files[]', 'Upload File', '', '');
                                dm_button("button", "btn-danger btn-remove pull-right", "Remove Files");
                            ?>
                            <br>
                        </div>
                    </div>
                    <br>
                    @if(isset($data['file']))
                    <table  class="display table table-bordered">
                            <thead>
                               <tr>
                                  <th>#</th>
                                  <th>File Name</th>
                                  <th>Action</th>
                               </tr>
                            </thead>
                            <tbody>
                                @foreach($data['file'] as $row)
                               <tr class="gradeX">
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $row->title }}</td>
                                  <td>
                                      @include('dcms.includes.buttons.button-delete-file')
                                  </td>
                               </tr>
                               @endforeach
                            </tbody>
                    </table>
                    @endif
                </div>
            </section>
        </div> --}}
        <div class="col-lg-4 col-md-4 col-xs-4">
                <section class="panel">
                    <div class="panel-heading">
                        <p>Page Status</p>
                    </div>
                    <div class="panel-body">
                        <?php
                            // dm_textareaUpdate('tag', 'Tags(<em style="color:red">*</em>)', $data['single']->tag, '');
                            dm_checkbox('checkbox', 'status', 'Publish', $data['single']->status);
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
<script>
    $(document).ready(function() {
        $('#province_id').change(function() {
            var provinceID = $(this).val();
            if (provinceID) {
                $.ajax({
                    url: '/dashboard/province_post/districts/' + provinceID, // Updated URL
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#district_id').empty();
                        $('#district_id').append('<option value="">जिल्ला</option>'); 
                        $.each(data.districts, function(key, value) {
                            $('#district_id').append('<option value="' + value.id + '">' + value.district_np + '</option>');
                        });
                    }
                });
            } else {
                $('#district_id').empty();
                $('#district_id').append('<option value="">जिल्ला</option>');
            }
        });
    });
</script>
@endsection
