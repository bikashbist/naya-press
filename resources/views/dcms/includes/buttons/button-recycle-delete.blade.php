
@if(Route::has($_base_route.'.delete'))
    <button  id="delete" data-id="{{ $row->id }}" data-url="{{ URL::route($_base_route.'.delete', $row->id) }}" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
@endif
