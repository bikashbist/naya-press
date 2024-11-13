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
            <div class="adv-table">
                @include('dcms.includes.buttons.button-create')  
                <div class="btn-group pull-right">
                     @include('dcms.includes.buttons.button-recycle')                  
               </div>             
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                   <thead>
                      <tr>
                         <th>#</th>
                         <th>Language Name</th>
                         <th>Language Code</th>
                         <th>Public</th>
                         {{-- <th>Order</th> --}}
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
                              {{ $row->name }}</td>
                           <td>{{ $row->code }}</td>
                           <td>
                                 <?php dm_flag($row->status) ?>
                           </td>
                           {{-- <td>{{ $row->sort_order }}</td> --}}
                           <td>
                              @include('dcms.includes.buttons.button-edit')                              
                              @include('dcms.includes.buttons.button-delete')
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