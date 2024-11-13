@extends('dcms.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <section class="panel">
            <header class="panel-heading">
                @include('dcms.faculty.includes.nav-button')
            </header>
        </section>
        <section class="panel">
            <header class="panel-heading">
               <h3>{{ $_panel }}</h3>
            </header>
            <div class="panel-body">
                    @include('dcms.includes.buttons.button-back')
                    @include('dcms.includes.flash_message_error')

                <div class=" form">
                    <?php
                    dm_hpostform(URL::route($_base_route.'.update', ['unique_id' => $data['single']->unique_id]), 'PUT');
                    dm_hidden('popup_unique_id', $data['single']->unique_id);
                    dm_dropdownInstitute('institute','Select Institute(<em style="color:red">*</em>)', $data['institute'], $data['single']->affiliated_id, App\Model\Dcms\Eloquent\DM_Post::getAffiliatedName($data['single']->affiliated_id));
                    dm_hinput('file', 'image', 'Slider Image(<em style="color:red">*</em>)', '', '');
                    // dm_hinput('text','name', "Slider Name(<em style="color:red">*</em>)", 'name');
                    dm_hidden('type', 'faculty');
                    ?>
                    @foreach($data['lang'] as $row)
                      <?php
                        if(isset($banner[$loop->index]['id'])){
                            $id = $banner[$loop->index]['id'];
                        }else {
                            $id = '';
                        }
                    if(isset($banner[$loop->index]['title'])){
                        $name = $banner[$loop->index]['title'];
                    }else {
                        $name = '';
                    }
                        dm_hidden('rows['.$loop->index.'][lang_id]', $row->id);
                        dm_hidden('rows['.$loop->index.'][id]', $id);
                        dm_menu_hinput_update('text','rows['.$loop->index.'][name]', "Name (<strong>$row->name</strong>)(<em style='color:red'>*</em>)",$name);
                    //   dm_htextarea('rows['.$loop->index.'][description]',  "Menu Description (<strong>$lang->name</strong>)", 'rows.'.$loop->index.'.description');
                     ?>
                    @endforeach
                    <?php
                    if(isset($data['single']->image)){
                        dm_thumbImage($data['single']->image);
                    }
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
