@extends('dcms.layouts.app')
@section('css')

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
             <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                   <tbody>
                        <tr class="gradeX">
                                <td>Subject:</td>
                                <td>{{ $row->subject }}</td>                           
                        </tr>
                        <tr class="gradeX">
                                <td>Name:</td>
                                <td>{{ $row->name }}</td>                           
                        </tr>
                        <tr class="gradeX">
                                <td>Email:</td>
                                <td>{{ $row->email }}</td>                           
                        </tr>
                        <tr class="gradeX">
                                <td>Phone:</td>
                                <td>{{ $row->number }}</td>                           
                        </tr>
                        <tr class="gradeX">
                                <td>Message:</td>
                                <td>{{ $row->message }}</td>                           
                        </tr>
                   </tbody>
                </table>
             </div>
          </div>
       </section>
    </div>
</div>
@endsection

@section('js')


@endsection