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
                    dm_hpostform(URL::route($_base_route.'.update', ['branch' => $data['row']->id]), 'PUT');
                    dm_hinputUpdate('text','name', "Branch(<em style='color:red'></em>)", $data['row']->name);
                    ?>
                    @foreach($data['lang'] as $row)
                    <?php
                    if(isset($branches[$loop->index]->id)){
                        $id = $branches[$loop->index]->id;
                    }else {
                        $id = '';
                    }
                    if(isset($branches[$loop->index]->name)){
                        $name = $branches[$loop->index]->name;
                    }else {
                        $name = '';
                    }
                    dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                    dm_hidden('rows['.$loop->index.'][id]', $id);
                    dm_hinputUpdate('text','rows['.$loop->index.'][name]', "Office Branch (<strong>$row->name</strong>)(<em style='color:red'>*</em>)", $name);
                    ?>
                    @endforeach
                    <?php
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
<script>
    CKEDITOR.replace('description', options);
</script>

@endsection
