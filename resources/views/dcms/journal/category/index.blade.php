@extends('dcms.layouts.app')
@section('css')
       <!--dynamic table-->
       @include('dcms.includes.datatable-assets.css')
       @include('dcms.includes.nestable-assets.css')
@endsection

@section('content')
<!-- page start-->
<div class="row">
   <div class="col-lg-12 col-md-12 col-xs-12">
         <section class="panel">
               <header class="panel-heading">
                  {{ $_panel }}
               </header>
         </section>
      </div>
    <div class="col-sm-12">
       <section class="panel">
          <div class="panel-body">
               <?php dm_button('button', 'btn-success btn-xs', "Create", '', '', '', "modal", "#myModal"); ?>
               <br>
               <br>
               <div class="alert alert-block alert-warning fade in">
                    <strong>Be Cearful While Deleating Category!!</strong> It May bring Error on site.
                </div>
                @include('dcms.includes.flash_message_error')

               <div class="dd" id="nestable">
                     {{-- ==============Category- DISPLAY==================== --}}
                 {!! $category !!}
             </div>
             <input type="hidden" id="nestable-output" >
          </div>
       </section>
    </div>
      <!-- Modal Create -->
      <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Create {{ $_panel }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class=" form">
                              <?php
                                dm_postform(URL::route($_base_route.'.store'), 'POST');
                                dm_input('text','name', "Category Name(<em style='color:red'>*</em>)", 'name');
                                dm_checkbox('checkbox', 'status', 'Publish');
                                dm_checkbox('checkbox', 'featured', 'Featured');
                              ?>
                          </div>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <?php
                              dm_button('submit','btn-success pull-right', 'Submit');
                              dm_closeform();
                        ?>
                    </div>
                </div>
            </div>
      </div>
        <!-- modal Create -->
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
                  url: '/dashboard/journal/category/order',
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
                    // $("#load").hide();
                  } ,error: function(xhr, status, error) {
                    alert(error);
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


    //   $(document).on("click",".del-button",function() {
    //           var x = confirm('Delete this Journal Category?');
    //           var id = $(this).attr('id');
    //         //   debugger;
    //           var url = "journal/category/"+id;
    //           alert(url);
    //         $object=$(this);
    //           if(x){
    //                $.ajax({
    //               url: url,
    //               type: 'DELETE',
    //               beforeSend: function (xhr) {
    //                   var token = $('meta[name="csrf-token"]').attr('content');
    //                       if (token) {
    //                           return xhr.setRequestHeader('X-CSRF-TOKEN', token);
    //                       }
    //                   },
    //               data: {
    //                   "id": id,
    //               },
    //               success: function(response){
    //                 //   debugger;
    //                 $($object).parents('li').remove();
    //                   console.log(response);
    //                 //   alert(response);
    //                   alert('Successfully Deleted!!');
    //               },
    //               error: function(xhr, status, error) {
    //                     alert(error);
    //                   },
    //               });
    //           }
    //   });

      </script>

@endsection
