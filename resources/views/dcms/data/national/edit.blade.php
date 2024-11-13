@extends('dcms.layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                   <h3>{{ $_panel }}</h3>
                </header>
                <div class="panel-body">
                        @include('dcms.includes.flash_message_error')                    
                    <div class=" form">
                        <?php
                        dm_hpostform(URL::route($_base_route.'.update', ['id'=>$row->id]), 'PUT');
                        dm_hinputUpdate('text','state', "Enter State Name(*)", $row->state);
                        dm_hinputUpdate('number','school_no', "Enter School(*)", $row->total_student);
                        dm_hinputUpdate('number','total_student', "Enter Student Quota(*)", $row->total_student);
                        dm_hinputUpdate('number','girls_no', "Enter Female Quota(*)", $row->girls_no);
                        dm_hinputUpdate('number','boys_no', "Enter Male Quota(*)", $row->boys_no);
                        // dm_hcheckbox('checkbox', 'status', 'Status', $row->status);
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