@extends('dcms.layouts.app')
@section('css')
       <!--dynamic table-->
       @include('dcms.includes.datatable-assets.css')
@endsection
@section('content')
<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                @include('dcms.faculty.includes.nav-button')
            </header>
        </section>
        <section class="panel">
            <header class="panel-heading">
                {{ $_panel }}
            </header>
            <div class="panel-body">
            @include('dcms.includes.buttons.button-create')
                <div class="btn-group pull-right">

                </div>
            <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th class="hidden-phone">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($data['rows']))
                        @foreach($data['rows'] as $row)
                        <tr class="gradeX" id="{{ $row->id }}">
                            <td width="25px">{{ $loop->iteration }}</td>
                            <td>{{ $row->title }}</td>
                            <td width="50px" ><?= dm_flag($row->status) ?></td>
                            <td width="150px" class="hidden-phone">
                                @include('dcms.institute.includes.button-edit')
                                @include('dcms.institute.includes.button-delete')
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection

@section('js')
@include('dcms.includes.datatable-assets.js')


@endsection
