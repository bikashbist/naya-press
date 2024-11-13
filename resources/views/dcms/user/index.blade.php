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
                @include('dcms.includes.flash-message')
            <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                   <thead>
                      <tr>
                         <th>#</th>
                         <th>User's Name</th>
                         <th>Email</th>
                         <th>Created Date</th>
                         <th>Last Login</th>
                         <th>IP Address</th>
                         <th>Role</th>
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
                           <td>{{ $row->email }}</td>
                           <td>{{ $row->created_at}}<br><strong>[{{ $row->created_at->diffForHumans() }}]</strong></td>
                           <td><?php dm_flag($row->last_login_at) ?>{{ $row->last_login_at }}@if(isset($row->last_login_at))<br><strong>[{{ $row->last_login_at->diffForHumans() }}]</strong>@endif</td>
                           <td><?php dm_flag($row->last_login_ip) ?>{{ $row->last_login_ip }}</td>
                           <td>@if($row->role_id){{ $row->Role->name }}@else {{ "No Role Assign" }}@endif</td>
                           <td><?php dm_flag($row->status) ?></td>
                           <td>
                              @if(Auth::user()->id == $row->id)
                                 <button class="btn btn-danger btn-xs"> Self </button>
                              @else
                                 @include('dcms.includes.buttons.button-edit')
                                 @include('dcms.includes.buttons.button-delete')
                              @endif
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
