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
                dm_hpostform(URL::route($_base_route.'.store'), 'POST');
            ?>
            <div class="col-lg-12 col-md-12 col-xs-12">
                
            <!--tab nav start-->
            </div>
            <section class="panel">
                <div class="panel-body">
                        <?php
                        dm_hinput('text','title', "Title", 'title');
                        dm_hinput('file', 'image', 'Image', '', '');
                        dm_hinput('text','url', "Link", 'url');
                        dm_hinput('number','rank', "Order", 'rank');
                        dm_hcheckbox('checkbox', 'status', 'Status');
                        dm_hsubmit('Submit', URL::route($_base_route.'.index'), 'Cancel');
                        dm_closeform();
                        ?>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection
