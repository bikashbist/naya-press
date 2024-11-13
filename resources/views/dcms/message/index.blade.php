@extends('dcms.layouts.app')
@section('css')
       <!--dynamic table-->
       <link href="{{ asset('assets/dcms/assets/advanced-datatable/media/css/demo_page.css') }}" rel="stylesheet" />
       <link href="{{ asset('assets/dcms/assets/advanced-datatable/media/css/demo_table.css') }}" rel="stylesheet" />
       <link rel="stylesheet" href="{{ asset('assets/dcms/assets/data-tables/DT_bootstrap.css') }}" />
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
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                   <thead>
                      <tr>
                         <th>#</th>
                         <th>Email</th>
                         <th>Message</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                        @if(isset($data['rows'])) 
                            @foreach($data['rows'] as $row)
                              <tr class="gradeX" id="{{ $row->id }}">
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $row->email }}</td>
                              <td>{{ $row->message }}</td>                            
                              <td>   
                                @include('dcms.includes.buttons.button-show')                                 
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
<script type="text/javascript" language="javascript" src="{{ asset('assets/dcms/assets/advanced-datatable/media/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dcms/assets/data-tables/DT_bootstrap.js') }}"></script>
<script src="{{ asset('assets/dcms/js/dynamic_table_init.js')  }}"></script>

@endsection