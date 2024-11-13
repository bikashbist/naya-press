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
                        dm_hpostform(URL::route($_base_route.'.update', ['role'=> $data['row']->id]), 'PUT');
                        dm_hinputUpdate('text','name', "Role Name", $data['row']->name);
                        dm_hcheckbox('checkbox', 'status', 'Status', $data['row']->status);
                        dm_hsubmit('Submit', URL::route($_base_route.'.index'), 'Cancel');
                        dm_closeform();
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>


@endsection

@section('js')

@endsection