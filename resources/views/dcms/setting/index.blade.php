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
                        dm_hpostform(URL::route($_base_route.'.store', $row->id), 'POST');
                        dm_hinputUpdate('text','name', "Site Name", $row->site_name);
                        //dm_hinputUpdate('text','slogan', "Site Slogan", $row->site_slogan);
                        dm_hinputUpdate('text','title', "Site Title", $row->site_title);
                        dm_hckeditorUpdate('description',"Site Description", $row->site_description);
                        dm_htextareaUpdate('meta', "Enter Meta Keyword", $row->meta_keyword);
                        dm_hinputUpdate('file', 'logo', 'Favicon', '', '');
                        dm_hinputUpdate('file', 'hero_banner', 'Logo', '', '');
                        dm_hdropdownLang('language', 'Default Language', $all_view['lang'], $row->language, App\Model\Dcms\Eloquent\DM_Post::getLanguageName($row->language));
                        dm_checkbox('checkbox', 'tracker_status', 'Tracker Status', $row->tracker_status);
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

<script src="{{asset('assets/dcms/js/jquery.tagsinput.js')}}"></script>

<script>
    CKEDITOR.replace('description', options);
    $(function() {
// Tags Input
$(".meta").tagsInput();
});
</script>

@endsection
