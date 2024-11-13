@if(Route::has($_base_route.'.addPhoto') )
    <div class="btn-group">
        <a href="{{ URL::route($_base_route.'.addPhoto', $row->id) }}" class="btn btn-success btn-xs"><i class="fa fa-plus">&nbsp;Add Photos to Album</i></a>
    </div>
@endif