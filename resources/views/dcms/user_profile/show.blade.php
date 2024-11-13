@extends('dcms.layouts.app')

@section('content')
<!-- page start-->
<div class="row">
    @include('dcms.user_profile.includes.user-pic')
    <aside class="profile-info col-lg-9">
        <section class="panel">
            <div class="bio-graph-heading">
                {{ Auth::user()->name }}'s Profile
            </div>
            <div class="panel-body bio-graph-info">
                <h1>Bio Graph</h1>
                <div class="row">
                    <div class="bio-row">
                        <p><span>Name </span>: {{ Auth::user()->name }}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Email </span>: {{ Auth::user()->email }}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Phone </span>: {{ Auth::user()->phone }}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Role </span>: <?php dm_userRole(Auth::user()->role) ?></p>
                    </div>
                </div>
            </div>
        </section>
    </aside>
</div>
<!-- page end-->

@endsection