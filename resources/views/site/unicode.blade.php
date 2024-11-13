@extends('site.layouts.app')
@section('content')
<div class="container">
    <div class="row page">
        <div class="col-md-12">
        <div class="col-sm-12">
                <div class="contact-info-box">

                    <h4 class="contact-title"> @if($data['lang'] == 1) Unicode Converter @else नेपाली युनिकोड @endif </h4>


                </div>
            </div>
            <article class="post-entry">
               
                <iframe class="litespeed-loaded" style="padding: 1px; margin: auto;" src="https://tools.basiconlinetools.com/preetitounicode" width="99%" height="650" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" data-lazyloaded="1" data-src="https://tools.basiconlinetools.com/preetitounicode" data-was-processed="true"></iframe>
            </article>
        </div>
        <button>
            <iframe class="litespeed-loaded" style="padding: 1px; margin: auto;" src="https://tools.basiconlinetools.com/unicodetopreeti" width="99%" height="650" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" data-lazyloaded="1" data-src="https://tools.basiconlinetools.com/unicodetopreeti" data-was-processed="true"></iframe>
        </button>
        {{-- <button>
            <iframe class="litespeed-loaded" style="padding: 1px; margin: auto;" src="https://tools.basiconlinetools.com/unicodetopreeti" width="99%" height="650" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" data-lazyloaded="1" data-src="https://tools.basiconlinetools.com/unicodetopreeti" data-was-processed="true"></iframe>
        </button> --}}
    </div>

</div>
@endsection