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
                 dm_hpostform(URL::route($_base_route.'.update', ['advistement' => $data['single']->id]), 'PUT');
            ?>
           
            <section class="panel">
                <div class="panel-body">
                        <?php
                        dm_hinputUpdate('text','title', "Title", $data['single']->title);
                        dm_hinputUpdate('file', 'image', 'Image', '', '');
                        dm_hinputUpdate('text','url', "Link", $data['single']->url);
                        dm_hinputUpdate('number','rank', "Order", $data['single']->rank);
                        dm_hcheckbox('checkbox', 'status', 'Status', $data['single']->status);
                        dm_hsubmit('Submit', URL::route($_base_route.'.index'), 'Cancel');
                        dm_closeform();
                        ?>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection
