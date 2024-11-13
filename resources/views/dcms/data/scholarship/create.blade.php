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
                        dm_hpostform(URL::route($_base_route.'.store'), 'POST');
                        dm_menu_type_dropdown('', 'fiscal_year','Fiscal Year(*)', $data['fiscal_year']);
                        dm_menu_type_dropdown('', 'continent','Continent (*)', $data['continent']);
                        dm_hinput('text','country', "Enter Country Name(*)");
                        dm_hinput('number','total_student', "Enter Student Quota(*)");
                        dm_hinput('number','girls_no', "Enter Female Quota(*)");
                        dm_hinput('number','boys_no', "Enter Male Quota(*)");
                        dm_hcheckbox('checkbox', 'status', 'Status');
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