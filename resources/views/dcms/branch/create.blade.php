@extends('dcms.layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                   {{ $_panel }}
                </header>
                <div class="panel-body">
                        @include('dcms.includes.buttons.button-back')
                        @include('dcms.includes.flash_message_error')
                    <div class=" form">
                        <?php
                        dm_hpostform(URL::route($_base_route.'.store'), 'POST');
                        dm_hinput('text','name', 'Office Branch(<em style="color:red">*</em>)', 'name');
                        ?>
                        @foreach($data['lang'] as $row)
                        <?php
                        dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                        dm_hinput('text','rows['.$loop->index.'][name]', "Office Branch (<strong>$row->name</strong>)(<em style='color:red'>*</em>)", 'rows.'.$loop->index.'.name');
                        ?>
                        @endforeach
                        <?php
                        // dm_hckeditor('description', 'Description');
                        // dm_hinput('number','order', "Order");
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
<script>
    CKEDITOR.replace('description', options);
</script>


@endsection
