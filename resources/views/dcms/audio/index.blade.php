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
                {{ $_panel }}
            </header>
            <div class="panel-body">
                @include('dcms.includes.buttons.button-create')
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name Of Title</th>
                                <th>Audio</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($data['rows']))
                            @foreach($data['rows'] as $row)
                            <tr class="gradeX" id="{{ $row->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <audio controls>
                                        <source src="{{ asset('upload_file/audio'. '/'.$row->file )}}" type="audio/ogg">
                                        <source src="{{ asset('upload_file/audio'. '/'.$row->file )}}" type="audio/mpeg">
                                        Your browser does not support the audio tag.
                                    </audio>
                                </td>
                                <td><?php dm_flag($row->status) ?></td>
                                <td>
                                    @include('dcms.includes.buttons.button-edit-audio')
                                    @include('dcms.includes.buttons.button-delete-audio')
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