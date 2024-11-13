@extends('dcms.layouts.app')
@section('css')


@include('dcms.includes.album-assets.css')




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
                @include('dcms.includes.buttons.button-back')
                @include('dcms.includes.buttons.button-create-gallery')
                @include('dcms.includes.buttons.button-edit-album')
                @include('dcms.includes.flash-message')
               <hr>
               <!--widget start-->
               <section class="panel">
                  <!--widget start-->
                  <aside class="profile-nav alt green-border">
                        <section class="panel">
                            <div class="user-heading alt green-bg">
                                <a href="#">
                                    @if(isset($row->cover_image))
                                    <img src="{{ asset($row->cover_image) }}" height="500" width="500" alt="img04">
                                    @else
                                    <img src="{{ asset('assets/dcms/img/gallery.png') }}"  alt="img04">
                                    @endif
                                </a>
                                <h1>{{ $albums_name->title }}</h1>
                                <p><strong>Status:</strong><?php dm_flag($row->status) ?></p>
                            </div>
                        </section>
                    </aside>
                    <!--widget end-->
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
                                    @if(count($row->photos) !=0 )
                                        @foreach($row->photos as $img)
                                        <li>
                                            <figure>
                                               <a class="fancybox" rel="group" href="{{ asset($img->image) }}">
                                                  @if(isset($img->image))
                                                  <img src="{{ asset($img->image) }}" height="500" width="500" alt="img04">
                                                  @else
                                                  <img src="{{ asset('assets/dcms/img/gallery.png') }}" alt="img04">
                                                  @endif
                                               </a>
                                               <figcaption>
                                                     <h3>{{ $img->title }}</h3>
                                                     <div class="pull-right">
                                                        @include('dcms.includes.buttons.button-delete-photo')
                                                     </div>
                                                  </figcaption>
                                            </figure>
                                       </li>
                                        @endforeach
                                    @else
                                    <h1>No Photo Avilable</h1>
                                    @endif
                                </ul>
                            </div>
                            <div id="list" class="tab-pane">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                                       <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Album Name</th>
                                            <th>Picture Preview</th>
                                            <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                         @if(count($row->photos) != 0)
                                            @foreach($row->photos as $row)
                                            <tr class="gradeX" id="{{ $row->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->title }}</td>
                                                <td>@if(isset($row->album)){{ $row->album->name }}@endif</td>
                                                <td><?php dm_thumbImage($row->image); ?></td>
                                                <td>
                                                    @if(Route::has('dcms.gallery.edit'))
                                                    <a href="{{ URL::route('dcms.gallery.edit', [$row->id]) }}"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>
                                                    @endif
                                                    @if(Route::has('dcms.gallery.destroy'))
                                                    <button  id="delete" data-id="{{ $row->id }}" data-url="{{ URL::route('dcms.gallery.destroy', [$row->id]) }}" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                        <h1>No Photo Available</h1>
                                         @endif
                                       </tbody>
                                    </table>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <!--tab nav start-->
{{--
                <ul class="grid cs-style-3">
                     @if(count($row->photos) !=0 )
                         @foreach($row->photos as $row)
                         <li>
                              <figure>
                                 <a class="fancybox" rel="group" href="{{ asset($row->image) }}">
                                    @if(isset($row->image))
                                    <img src="{{ asset($row->image) }}" height="500" width="500" alt="img04">
                                    @else
                                    <img src="{{ asset('assets/dcms/img/gallery.png') }}" alt="img04">
                                    @endif
                                 </a>
                                 <figcaption>
                                       <h3>{{ $row->title }}</h3>
                                       <div class="pull-right">
                                          @include('dcms.includes.buttons.button-delete-photo')
                                       </div>
                                    </figcaption>
                              </figure>
                         </li>
                         @endforeach
                     @else
                     <h1>No Photos Avilable</h1>
                     @endif

                </ul> --}}
          </div>
       </section>
    </div>
</div>
@endsection

@section('js')
@include('dcms.includes.flash-message')

@include('dcms.includes.album-assets.js')

<script type="text/javascript">
   $(function() {
     //    fancybox
       jQuery(".fancybox").fancybox();
   });

</script>
@endsection
