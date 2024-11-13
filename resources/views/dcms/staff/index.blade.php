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
                @include('dcms.staff.includes.button-sort')
            <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                   <thead>
                      <tr>
                         <th>#</th>
                         <th>Title</th>
                         <th>Branch</th>
                         <th>Featured</th>
                         <th>Status</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                     @if(isset($data['rows']))
                        @foreach($data['rows'] as $row)
                        <tr class="gradeX" id="{{ $row->id }}">
                           <td>{{ $loop->iteration }}</td>
                           <td>
                              @if($row->image)
                                 <img style="width: 24px;" src="{{asset($row->image)}}">
                              @endif
                              {{ $row->name }}
                           </td>
                           <td>@if(!empty($row->branch)){{ $row->branch->name }}@endif</td>
                           <td><?php dm_flag($row->featured) ?></td>
                           <td><?php dm_flag($row->status) ?></td>
                           <td>
                              @include('dcms.includes.buttons.button-edit-staff')
                              @include('dcms.includes.buttons.button-delete-staff')
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
