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
                @include('dcms.includes.buttons.button-create')
               <br><br>
               <div class="alert alert-block alert-warning fade in">
                  <strong>Status : 1 Represent Active & 0 Represent Inactive !!</strong>
               </div>
               <menu id="nestable-menu">
                     <button type="button" data-action="expand-all">Expand All</button>
                     <button type="button" data-action="collapse-all">Collapse All</button>
               </menu>
               <div class="dd" id="nestable">
                  {{-- ==============Branch- DISPLAY==================== --}}
                  {!! $menu !!}
               </div>
             <input type="hidden" id="nestable-output">

          </div>
       </section>
    </div>
</div>
@endsection

@section('js')
@include('dcms.includes.datatable-assets.js')
@include('dcms.includes.nestable-assets.js')
<script>
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
               console.log(dataString);
                  $.ajax({
                        type: "POST",
                        url: '/dashboard/menu/order',
                        data:  dataString,
                        beforeSend: function (xhr) {
                           var token = $('meta[name="csrf-token"]').attr('content');
                              if (token) {
                                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                              }
                           },
                        cache : false,
                        success: function(data){
                           //  alert(data);
                        //   $("#load").hide();
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


   $(document).on("click",".del-button",function() {
           var x = confirm('Delete this Menu Office?');
           var id = $(this).attr('id');
         //   debugger;
           var url = "menu/"+id;
         //   alert(url);
        $object=$(this);
           if(x){
                $.ajax({
               url: url,
               type: 'DELETE',
               beforeSend: function (xhr) {
                   var token = $('meta[name="csrf-token"]').attr('content');
                       if (token) {
                           return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                       }
                   },
               data: {
                   "id": id,
               },
               success: function(response){
                  //  debugger;
                $($object).parents('li').remove();
                   console.log(response);
                  //  alert(response);
                   alert('Successfully Deleted!!');
                   location.reload(true);
               },
               error: function(xhr, status, error) {
                     alert(error);
                   },
               });

           }
   });

         $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    $('#nestable-menu').on('reload', function(e){
      $('.dd').nestable('collapseAll');
    } );
   </script>
@endsection