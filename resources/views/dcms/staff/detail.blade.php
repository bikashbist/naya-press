@extends('dcms.layouts.app')
@section('css')


@endsection

@section('content')
<!-- invoice start-->
<section>
    <div class="panel panel-primary col-md-8">
        <!--<div class="panel-heading navyblue"> INVOICE</div>-->
        <div class="panel-body ">
            <div class="row invoice-list">
                <div class="text-center corporate-id">
                    <img src="img/vector-lab.jpg" alt="">
                </div>
            </div>
            <table class="table table-bordered">
                <tr>
                    <td class="col-md-2">Name :</td>
                    <td class="col-md-6">@if(isset($data['single']->name)) {{ $data['single']->name }} @endif</td>
                </tr>
                <tr>
                    <td class="col-md-2">Designation :</td>
                    <td class="col-md-6">@if(isset($data['single']->designation)) {{ $data['single']->designation }} @endif</td>
                </tr>

                <tr>
                    <td class="col-md-2">Branch :</td>
                    <td class="col-md-6">@if(!empty($data['single']->branch)){{ $data['single']->branch->name }}@endif</td>
                </tr> 
                <tr>
                    <td class="col-md-2">Email :</td>
                    <td class="col-md-6">@if(isset($data['single']->email)) {{ $data['single']->email }} @endif</td>
                </tr>
                <tr>
                    <td class="col-md-2">Phone Number :</td>
                    <td class="col-md-6">@if(isset($data['single']->phone)) {{ $data['single']->phone }} @endif</td>
                </tr>
                <tr>
                    <td class="col-md-8" colspan="2">
                        <h4 style="text-align: center;">Description</h4>
                        @if(isset($data['single']->description)) {!! $data['single']->description !!} @endif</td>
                </tr>


            </table>


            <div class="text-center invoice-btn">
                <a class="btn btn-info btn-lg" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print </a>
            </div>
        </div>
    </div>
</section>
<!-- invoice end-->

@endsection

@section('js')
@endsection