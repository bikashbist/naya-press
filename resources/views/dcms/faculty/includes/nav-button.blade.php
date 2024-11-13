@if(Route::has('dcms.faculty.index'))
<a href="{{ URL::route('dcms.faculty.index') }}"><button type="button" class="btn btn-info btn-xs">Faculty</button></a>
@endif
@if(Route::has('dcms.faculty.banner.index'))
<a href="{{ URL::route('dcms.faculty.banner.index') }}"><button type="button" class="btn btn-info btn-xs">Banner</button></a>
@endif
@if(Route::has('dcms.faculty.program.index'))
<a href="{{ URL::route('dcms.faculty.program.index') }}"><button type="button" class="btn btn-info btn-xs">Program</button></a>
@endif

@if(Route::has('dcms.faculty.campus.index'))
<a href="{{ URL::route('dcms.faculty.campus.index') }}"><button type="button" class="btn btn-info btn-xs">Campus</button></a>
@endif
@if(Route::has('dcms.faculty.staff.index'))
<a href="{{ URL::route('dcms.faculty.staff.index') }}"><button type="button" class="btn btn-info btn-xs">Staff</button></a>
@endif
