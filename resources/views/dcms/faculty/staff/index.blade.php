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
                {{-- @include('dcms.staff.includes.button-sort') --}}
            <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                   <thead>
                      <tr>
                         <th>#</th>
                         <th>Name</th>
                         <th>Designation</th>
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
                           <td>{{ $row->designation }}</td>
                           <td><?php dm_flag($row->status) ?></td>
                           <td>
                              @include('dcms.institute.staff.includes.button-edit')
                              @include('dcms.institute.staff.includes.button-delete')
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
