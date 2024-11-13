@extends('dcms.layouts.app')

@section('content')
 <!-- page start-->
 <div class="row">
    @include('dcms.user_profile.includes.user-pic')
    <aside class="profile-info col-lg-9">
        <section class="panel">
            <div class="bio-graph-heading">
                {{ Auth::user()->name }}'s Edit Profile
            </div>
            <div class="panel-body bio-graph-info">
                <h1> Profile Info</h1>
                <div class=" form">
                        <?php
                        dm_hpostform(URL::route($_base_route.'.update'), 'PUT');
                        dm_hinputUpdate('file', 'avatar', 'Avatar', '', '');
                        dm_hinputUpdate('text','name', "Name", $row->name);
                        dm_hinputUpdate('text','email', "Email", $row->email);
                        dm_hinputUpdate('text','phone', "Phone", $row->phone);
                        dm_hsubmit('Submit', URL::route($_base_route.'.show'), 'Cancel');
                        dm_closeform();
                        ?>
                </div>
            </div>
        </section>
        @include('dcms.user_profile.includes.change-password')        
    </aside>
</div>
<!-- page end-->

@endsection

@section('js')
@include('dcms.includes.flash-message') 

@endsection