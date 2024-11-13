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
            <div class="btn-group">
               <a href="{{ URL::route($_base_route.'.truncate') }}" class="btn btn-danger btn-xs"><i class="fa fa-trash">&nbsp;Delete All {{ $_panel }}</i></a>
            </div>
                @include('dcms.includes.flash-message') 
            <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                   <thead>
                      <tr>
                         <th>#</th>
                         <th>Visit Date</th>
                         <th>Visit Time</th>
                         <th>Vistior Ip Address</th>
                         <th>No of Visit</th>
                         <th>User Agent</th>
                         <th>Request Method</th>
                         <th>Request URI</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                     @if(isset($data['rows'])) 
                        @foreach($data['rows'] as $row)
                        <tr class="gradeX" id="{{ $row->id }}">
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $row->visit_date }}</td>
                           <td><strong> {{ $row->updated_at->diffForHumans() }}</strong>,{{ $row->visit_time }}</td>
                           <td>{{ $row->visitor }}</td>
                           <td>{{ $row->hits }}</td>
                           <td>{{ $row->user_agent }}</td>
                           <td>{{ $row->request_method }}</td>
                           <td>{{ $row->request_uri }}</td>
                          
                           <td>
                              {{-- @include('dcms.includes.buttons.button-edit')                               --}}
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