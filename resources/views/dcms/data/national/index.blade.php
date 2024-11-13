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
          {{-- <header class="panel-heading">
             {{ $_panel }}
          </header> --}}
          <div class="panel-body">
                {{-- @include('dcms.includes.buttons.button-create') --}}
                @include('dcms.includes.flash-message')
            <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                   <thead>
                      <tr>
                         <th>#</th>
                         <th>State Name</th>
                         <th>Total School No.</th>
                         <th>Total Student</th>
                         <th>Total Female</th>
                         <th>Total Male</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                     @if(isset($data['rows']))
                        @foreach($data['rows'] as $row)
                        <tr class="gradeX" id="{{ $row->id }}">
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $row->state }}</td>
                           <td>{{ $row->school_no }}</td>
                           <td>{{ $row->total_student }}</td>
                           <td>{{ $row->girls_no }}</td>
                           <td>{{ $row->boys_no }}</td>
                           <td>
                                 @include('dcms.includes.buttons.button-edit')
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
