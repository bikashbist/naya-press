@extends('dcms.layouts.app')
@section('css')
       <!--dynamic table-->
       <link href="{{ asset('assets/dcms/assets/advanced-datatable/media/css/demo_page.css') }}" rel="stylesheet" />
       <link href="{{ asset('assets/dcms/assets/advanced-datatable/media/css/demo_table.css') }}" rel="stylesheet" />
       <link rel="stylesheet" href="{{ asset('assets/dcms/assets/data-tables/DT_bootstrap.css') }}" />
@endsection

@section('content')
<!-- page start-->
<div class="row">
    <div class="col-sm-12">
       <section class="panel">
          <header class="panel-heading">
             Panel Name
          </header>
          <div class="panel-body">
                <a href="#" class="btn btn-success btn-lg">Create a New</a>
             <div class="adv-table">
                  <div class="btn-group">
                        <button id="editable-sample_new" class="btn green">
                            Add New <i class="fa fa-plus"></i>
                        </button>
                    </div>

                <table  class="display table table-bordered table-striped" id="dynamic-table">
                   <thead>
                      <tr>
                         <th>#</th>
                         <th>Column1</th>
                         <th>Column2</th>
                         <th>Column3</th>
                         <th>Column4</th>
                         <th>Column5</th>
                      </tr>
                   </thead>
                   <tbody>
                      <tr class="gradeX">
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
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
<script type="text/javascript" language="javascript" src="{{ asset('assets/dcms/assets/advanced-datatable/media/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dcms/assets/data-tables/DT_bootstrap.js') }}"></script>
<script src="{{ asset('assets/dcms/js/dynamic_table_init.js')  }}"></script>

@endsection