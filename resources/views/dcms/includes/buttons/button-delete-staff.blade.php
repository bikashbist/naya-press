@if(Route::has($_base_route.'.destroy'))
    <button  id="delete" data-id="{{ $row->id }}" data-url="{{ URL::route($_base_route.'.destroy', ['staff'=>$row->staff_unique_id]) }}" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
@endif