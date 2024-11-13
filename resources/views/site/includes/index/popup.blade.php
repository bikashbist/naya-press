@if(isset($data['popup']) && $data['popup']->count() > 0)

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        Modal content
        <div class="modal-content" style="margin-top:10px;">
        @foreach($data['popup'] as $row)
            <div style="text-align:center;" class="modal-body">
                <img height="600" width="auto" src="{{asset($row->image)}}" class="img img-thumbnail" alt="Census Notice" />
            </div>
       
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif