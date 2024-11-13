@extends('dcms.layouts.app')
@section('css')

@include('dcms.includes.album-assets.css')

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
                    <!--tab nav start-->
                    <header class="panel-heading tab-bg-dark-navy-blue tab-right" style="margin-top: 10px;">
                        <ul class="nav nav-tabs pull-right">
                            <li class="active">
                                <a data-toggle="tab" href="#grid"><i class="fa fa-picture-o"></i> Grid</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#list"><i class="fa fa-list"></i> List</a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="grid" class="tab-pane active">
                                <ul class="grid cs-style-3">
                                    @if(count($data['rows']) != 0)
                                        @foreach($data['rows'] as $row)
                                        <li>
                                            @if(route::has('dcms.album.show') && isset($row->id))
                                                <figure>
                                                    <a href="{{ route('dcms.album.show', $row->id ) }}">
                                                    @if(isset($row->cover_image))
                                                    <img src="{{ asset($row->cover_image) }}" style="height:300px; width:100%" alt="img04">
                                                    @else
                                                    <img src="{{ asset('assets/dcms/img/gallery.png') }}" style="height:300px; width:100%" alt="img04">
                                                    @endif
                                                    </a>
                                                    <figcaption>

                                                        <h3>{{ $row->title }}</h3>
                                                        <span>{{ $row->description }} </span>
                                                        <span><?php dm_flag($row->status) ?></span>
                                                        <div class="pull-right">
                                                            @include('dcms.includes.buttons.button-delete')
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            @endif
                                        </li>
                                        @endforeach
                                    @else
                                    <h1>No album Avilable</h1>
                                    @endif
                                </ul>
                            </div>
                            <div id="list" class="tab-pane">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                                       <thead>
                                          <tr>
                                             <th>#</th>
                                             <th>Name</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                         @if(isset($data['rows']))
                                            @foreach($data['rows'] as $row)
                                            <tr class="gradeX" id="{{ $row->id }}">
                                               <td>{{ $loop->iteration }}</td>
                                               <td>{{ $row->name }}</td>
                                               <td>
                                                    @include('dcms.includes.buttons.button-create-gallery')
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
                        </div>
                    </div>
                    <!--tab nav start-->
          </div>
       </section>
    </div>
</div>
@endsection

@section('js')
@include('dcms.includes.album-assets.js')
@include('dcms.includes.datatable-assets.js')

@endsection
