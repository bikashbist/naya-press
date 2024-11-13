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
             Deleted {{ $_panel }}
          </header>
          <div class="panel-body">
                @include('dcms.includes.buttons.button-back')
               <div class="btn-group pull-right">
               </div>
            <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                   <thead>
                      <tr>
                         <th>#</th>
                         <th >Post Unique Id</th>
                         <th>Category</th>
                         <th class="hidden-phone">Deleted Date</th>
                         <th>Title</th>
                         <th class="hidden-phone">Action</th>
                      </tr>
                   </thead>
                   <tbody>
                     @if(isset($data['rows'])) 
                        @foreach($data['rows'] as $row)
                        <tr class="gradeX" id="{{ $row->id }}">
                              <td width="25px">{{ $loop->iteration }}</td>
                              <td width="25px">{{ $row->post_unique_id }}</td>
                              <td width="25px">{{ $row->postCategory->name }}</td>
                              <td width="25px" class="hidden-phone">
                                    {{ $row->deleted_at }}
                              </td>
                              <td>{{ $row->title }}</td>
                              <td width="150px" class="hidden-phone">
                                 @include('dcms.includes.buttons.button-recycle-restore-post')                              
                                 @include('dcms.includes.buttons.button-recycle-delete-post')
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
@include('dcms.includes.flash-message') 

@include('dcms.includes.datatable-assets.js')

@endsection