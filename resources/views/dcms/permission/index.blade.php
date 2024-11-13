@extends('dcms.layouts.app')
@section('css')
       <!--dynamic table-->
       @include('dcms.includes.datatable-assets.css')
       @include('dcms.includes.nestable-assets.css')

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
                @include('dcms.includes.flash-message') 
               {!! $data !!}
          </div>
       </section>
    </div>
</div>
@endsection

@section('js')

@include('dcms.includes.datatable-assets.js')
@include('dcms.includes.flash-message') 
@include('dcms.includes.nestable-assets.js')


@endsection