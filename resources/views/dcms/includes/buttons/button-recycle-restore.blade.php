@if(Route::has($_base_route.'.restore'))
    <button  id="restore" data-id="{{ $row->id }}" data-url="{{ URL::route($_base_route.'.restore', ['id'=>$row->id]) }}" type="button" class="btn btn-success btn-xs"><i class="fa fa-reply"></i></button>
@endif

