@if(Route::has('dcms.institute.staff.get_sort'))
<div class="btn-group">
    <a href="{{ route($_base_route.'.get_sort') }}" class="btn btn-success btn-xs"><i class="fa fa-sort-amount-asc">&nbsp;Sort {{ $_panel }}</i></a>
</div>
@endif