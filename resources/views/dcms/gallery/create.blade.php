@extends('dcms.layouts.app')
@section('css')
<link href="{{asset('assets/dcms/assets/dropzone/css/dropzone.css')}}" rel="stylesheet"/>
@endsection
@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                        <h3>Add Photo to {{ $_panel }}</h3>
                        @include('dcms.includes.buttons.button-back')
                </header>
                <div class="panel-body">
                        @include('dcms.includes.flash-message') 
             
                        <form action="{{ route('dcms.album.storePhoto', $album_id) }}" class="dropzone" id="my-awesome-dropzone" method="POST" enctype="multipart/form-data">@csrf</form>
                </div>
            </section>
        </div>
    </div>
    <?php


    ?>

@endsection

@section('js')
@include('dcms.includes.flash-message') 

<script src="{{ asset('assets/dcms/assets/dropzone/dropzone.js') }}"></script>
@endsection