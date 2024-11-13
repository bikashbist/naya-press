@extends('dcms.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 col-md-8 col-xs-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>{{ $_panel }}</h3>
            </header>
            <div class="panel-body">
                @include('dcms.includes.buttons.button-back')
                @include('dcms.includes.flash_message_error')
                <div class=" form">
                    <?php
                    dm_hpostform(URL::route($_base_route . '.update', ['other' => $data['others']->id]), 'PUT');
                    dm_hidden('order', $data['others']->order);
                    dm_custom_link_hinput_update('text', 'link', "Url", $data['others']->url);
                    dm_menu_hinput_update('text', 'name', "Other Menus Name", $data['others']->name); ?>
                    <?php
                    dm_hcheckbox('checkbox', 'status', 'Public', $data['others']->status);
                    dm_hsubmit('Submit', URL::route($_base_route . '.index'), 'Cancel');
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
    function menuTypeFunction() {
        var menu_type = document.getElementById("type").value;
        if (menu_type == "Page") {
            $("#post_unique_id_Posts").hide();
            $("#category_id_Category").hide();
            $("#link_link").hide();
            $("#page_unique_id_Pages").show();
            $("#institute_unique_id_Institute").hide();
            $("#faculty_unique_id_Faculty").hide();
            $("#branch_id_Branch").hide();
        } else if (menu_type === "Post") {
            $("#post_unique_id_Posts").show();
            $("#category_id_Category").hide();
            $("#link_link").hide();
            $("#page_unique_id_Pages").hide();
            $("#institute_unique_id_Institute").hide();
            $("#faculty_unique_id_Faculty").hide();
            $("#branch_id_Branch").hide();

        } else if (menu_type === "Category") {
            $("#post_unique_id_Posts").hide();
            $("#category_id_Category").show();
            $("#link_link").hide();
            $("#page_unique_id_Pages").hide();
            $("#institute_unique_id_Institute").hide();
            $("#faculty_unique_id_Faculty").hide();
            $("#branch_id_Branch").hide();

        } else if (menu_type === "Institute Page") {
            $("#post_unique_id_Posts").hide();
            $("#category_id_Category").hide();
            $("#link_link").hide();
            $("#page_unique_id_Pages").hide();
            $("#institute_unique_id_Institute").show();
            $("#faculty_unique_id_Faculty").hide();
            $("#branch_id_Branch").hide();

        } else if (menu_type === "Faculty Page") {
            $("#post_unique_id_Posts").hide();
            $("#category_id_Category").hide();
            $("#link_link").hide();
            $("#page_unique_id_Pages").hide();
            $("#institute_unique_id_Institute").hide();
            $("#faculty_unique_id_Faculty").show();
            $("#branch_id_Branch").hide();

        } else if (menu_type === "Branch") {
            $("#post_unique_id_Posts").hide();
            $("#category_id_Category").hide();
            $("#link_link").hide();
            $("#page_unique_id_Pages").hide();
            $("#institute_unique_id_Institute").hide();
            $("#faculty_unique_id_Faculty").hide();
            $("#branch_id_Branch").show();
        } else {
            $("#post_unique_id_Posts").hide();
            $("#category_id_Category").hide();
            $("#link_link").show();
            $("#page_unique_id_Pages").hide();
            $("#institute_unique_id_Institute").hide();
            $("#faculty_unique_id_Faculty").hide();
            $("#branch_id_Branch").hide();
        }
    }
</script>
@endsection