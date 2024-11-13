@extends('dcms.layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                   <h3>{{ $_panel }}</h3>
                </header>
                <div class="panel-body">
                        @include('dcms.includes.flash-message')                    
                    <div class=" form">
                        <?php
                            if($row->id)
                        dm_hpostform(URL::route($_base_route.'.social.store', $row->id), 'POST');
                        dm_hinputUpdate('url','facebook', "Facebook Link", $row->social_profile_fb);
                        dm_hinputUpdate('url','twitter', "Twitter Link", $row->social_profile_twitter);
                        dm_hinputUpdate('url','insta', "Instagram", $row->social_profile_insta);
                        dm_hinputUpdate('url','youtube', "Youtube", $row->social_profile_youtube);
                        dm_hinputUpdate('url','linkedin', "Linkedin", $row->social_profile_linkedin);
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