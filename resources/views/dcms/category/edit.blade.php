@extends('dcms.layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                   <h3>{{ $_panel }}</h3>
                </header>
                <div class="panel-body">
                        @include('dcms.includes.buttons.button-back')
                        @include('dcms.includes.flash_message_error')                    
                    <div class=" form">
                        <?php
                        dm_postform(URL::route($_base_route.'.update', $row->id), 'PUT');
                        dm_inputUpdate('text','name', "Name(*)", $row->name);
                        ?>
                        @foreach($data['lang'] as $lang)
                        <?php
                            if(isset($categories_name[$loop->index]->name)){
                                $category_name = $categories_name[$loop->index]->name;
                            }
                            else {
                            $category_name = '';
                            }
                            dm_hidden('rows['.$loop->index.'][lang_id]', $lang->id);
                            dm_inputUpdate('text','rows['.$loop->index.'][lang_name]', "Category Name (<strong>$lang->name</strong> )(<em style='color:red'>*</em>)", $category_name); 
                        ?>
                        @endforeach
                        <?php
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