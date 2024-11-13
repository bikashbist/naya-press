@if(Route::has($_base_route.'.create'))
    <div class="btn-group">
        <a href="{{ URL::route($_base_route.'.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus">&nbsp;Create {{ $_panel }}</i></a>
    </div>
@endif