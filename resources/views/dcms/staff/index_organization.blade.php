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
                @if(Route::has($_base_route.'.create'))
                <div class="btn-group">
                    <a href="{{ URL::route($_base_route.'.organization_create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus">&nbsp;Create {{ $_panel }}</i></a>
                </div>
                @endif 
                @include('dcms.staff.includes.button-sort')
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Organization</th>
                                <th>Phone Number</th>
                                <th>Email Address</th>
                                <th>Featured</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($data['rows']))
                            @foreach($data['rows'] as $key=> $row)
                            <tr class="gradeX" id="{{ $row->id }}">
                                <td>{{ $key+1}}</td>
                                <td> {{$row->order}}</td>
                                <td>
                                    @if($row->image)
                                    <img style="width: 24px;" src="{{asset($row->image)}}">
                                    @endif
                                    {{ $row->name }}
                                </td>
                                <td>{{ $row->designation }}</td>
                                <td>{{ $row->organization_Id }}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->email}}</td>
                                <td><?php dm_flag($row->featured) ?></td>
                                <td><?php dm_flag($row->status) ?></td>
                                <td>
                                    @include('dcms.includes.buttons.button-edit-staff-org')
                                    @include('dcms.includes.buttons.button-delete-staff')
                                    @include('dcms.includes.buttons.button-detail-staff')
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