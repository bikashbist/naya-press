@extends('site.layouts.app')
@section('css')
<style>
    .article-content__nav .p-card__media {
     display: block;
    }
    .article-content__nav .p-card__media>a {
        display: block;
        height: 12rem;
        width: 100%;
        transition: .3s linear;
        overflow: hidden;
        background: #000;
    }
    .article-content__nav .p-card__media>a img {
       width: 100%;
       object-fit: cover;
       transition: .3s linear;
       height: 100%;
    }
</style>
@endsection
@section('content')
<div class="container">
    <article>
        <!---------------------------- Article header ------------------------------->
        <header class="article-header section-panel bkDefault">
            <div class="st-wrapper">
                <div class="container-fluid">
                    <!-- Header and intro goes here for inner page -->
                    <h4 class="contact-title">@if($data['lang'] == 1) Related Search Total @else सम्बन्धित भेटिएका जम्मा
                        @endif '{{ $data['result_count'] }}'</h4>
                </div>
            </div>
        </header>
        <!--------------X-------------- Article header ends -----------------X-------------->
        <!---------------------------- Article main content ------------------------------->
        <div class="article-content section-panel">
            <div class="st-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="article-content__side-bar">
                                <div class="with-pttrns-box">
                                    <div class="census-detail-page article-content__side-bar-content col-md-3 col-sm-6">
                                        @if(isset($data['rows']))
                                        <ul class="article-content__nav" style="list-style: none; padding: 0;">
                                            @foreach($data['rows'] as $row)
                                            <div class="float-left mr-2">
                                                <i class="fa fa-paperclip fa-1x" style="color:#dc3545;" aria-hidden="true"></i>
                                            </div>
                                            <picture class="p-card__media">
                                                <a class="p-card__media--link" href="{{ route('site.post.show', ['post'=> $row->post_unique_id]) }}">
                                                    <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" >
                                                </a>
                                            </picture>
                                            <li class="article-content__list active" style="margin-bottom: 5px;">
                
                                                <a href="{{ route('site.post.show', ['post'=> $row->post_unique_id]) }}"
                                                    class="article-content__link">{{ $row->title }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @else
                                        <p>Data Not Found !!!</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!---------X----------- Article side bar ends ---------X-------------->
                        </div>
                        <div class="col-lg-8">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
@endsection


