@extends('dcms.layouts.app') 
@section('css') 
@include('dcms.includes.nestable-assets.css')

@endsection 

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <section class="panel">
            <header class="panel-heading">
               <h3>Order {{ $_panel }}</h3>
            </header>
            <div class="panel-body">
                    @include('dcms.includes.flash-message')  
                @if(isset($data['branch']))                  
                    <form class="form-horizontal tasi-form" action="" method="get">
                        <div class="form-group">
                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Select Branch to Sort</label>
                            <div class="col-lg-10">
                                <select name="branch" class="form-control m-bot15">
                                    <option value="">--- Select Branch ---</option>
                                    @foreach($data['branch'] as $row)
                                    <option value= {{ $row->id }}>{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                           
                        </ol>
                        <div style="display:" id="nestable-output"></div>
                    </div>
          
                @endif
            </div>
        </section>
    </div>
</div>
@endsection

@section('js')
@include('dcms.includes.nestable-assets.js')
<script type="text/javascript">

$(document).ready(function()
   {
       var updateOutput = function(e)
       {
           var list   = e.length ? e : $(e.target),
               output = list.data('output');
           if (window.JSON) {
               output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
               // Ajax request data 
               var dataString = { 
                 data : $("#nestable-output").val(),
               };
            //    alert(dataString);
               console.log(dataString);
                  $.ajax({
                        type: "POST",
                        url: '/dashboard/staff/order',
                        data:  dataString,
                        beforeSend: function (xhr) {
                           var token = $('meta[name="csrf-token"]').attr('content');
                              if (token) {
                                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                              }
                           },
                        cache : false,
                        success: function(data){
                            console.log(data); 
                       
                        } ,error: function(xhr, status, error) {
                        // alert(error);
                        console.log(xhr.responseText); // this line will save you tons of hours while debugging
                     // do something here because of error
                        },
                  });
   // ===================================
            } else {
                  output.val('JSON browser support required for this demo.');
            }
       };
   
       // activate Nestable for list 1
       $('#nestable').nestable({
          group: 1
       })
       .on('change', updateOutput);
       // output initial serialised data
       updateOutput($('#nestable').data('output', $('#nestable-output')));
   
   });
   


    $(document).ready(function() {
        $('select[name="branch"]').on('change', function() {
            var branch_id = $(this).val();
            var url = '/dashboard/staff/get_staffs/'+branch_id;
            // alert(url);
            if(branch_id) {
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                        // alert(data[0].name);
                        var res='';
                        var txt='';
                        if(data) {   // DO SOMETHING     
                            var last_no = data.length;
                            var last_no= last_no-1;
                            // alert(last_no);
                            $.each(data, function(key, value) {
                               
                                res+=
                                '<li class="dd-item dd3-item" data-id="'+value.id+'" data-unique="'+value.staff_unique_id+'">'+
                                    '<div class="dd-handle dd3-handle"></div>'+
                                    '<div class="dd3-content">'+value.name+'</div>'+
                                '</li>';
                                if(last_no == key) {
                                    txt+=
                                '{"id" :'+value.id+',"unique":"'+value.id+'"}';
                                } else {
                                    txt+=
                                    '{"id" :'+value.id+',"unique":"'+value.staff_unique_id+'"},';
                                }
                               
                            });
                            $('.dd-list').html(res);
                            // $('#nestable-output').html('['+txt+']');
                        } else { // DO SOMETHING }
                        }

                    },
                        error: function(xhr, status, error) {
                        alert(error);
                    },
                });
            }else{
                
            }
        });
    });
</script>

@endsection 