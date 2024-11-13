@if(Route::has('dcms.role.assign'))
<div class="btn-group">
    <a href="{{ route('dcms.role.assign', ['id' => $row->id])}}" class="btn btn-success btn-xs"><i class="fa fa-plus">&nbsp;Assign Role</i></a>
</div>
@endif