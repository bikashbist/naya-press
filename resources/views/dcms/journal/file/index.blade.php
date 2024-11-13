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
                {{-- @include('dcms.includes.buttons.button-create') --}}
            <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                   <thead>
                      <tr>
                         <th>#</th>
                         <th>Journal Name</th>
                         <th>Title</th>
                         <th>View And Download</th>
                         <th>Download Count</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                     @if(isset($data['rows']))
                        @foreach($data['rows'] as $row)
                        <tr class="gradeX" id="{{ $row->id }}">
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ App\Model\Dcms\Eloquent\DM_Post::getJournalName($row->unique_id) }}</td>
                           <td>{{ $row->title }}</td>
                           <td>
                              <a href="{{ asset( $row->file) }}" class="btn btn-sm btn-danger" target="_blank"><i class="fa fa-eye">&nbsp;</i> View</a>&nbsp;
                              <a href="{{ route($_base_route.'.download', ['id'=> $row->id]) }}" class="btn btn-sm btn-success"><i class="fa fa-download">&nbsp;</i> Download</a>
                           </td>
                           <td width="25px">{{ $row->download_count }}</td>
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
