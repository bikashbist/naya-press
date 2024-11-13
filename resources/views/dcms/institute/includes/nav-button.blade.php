@if(Route::has('dcms.institute.index'))
<a href="{{ URL::route('dcms.institute.index') }}"><button type="button" class="btn btn-info btn-xs">Institute</button></a>
@endif
@if(Route::has('dcms.institute.banner.index'))
<a href="{{ URL::route('dcms.institute.banner.index') }}"><button type="button" class="btn btn-info btn-xs">Banner</button></a>
@endif
@if(Route::has('dcms.institute.program.index'))
<a href="{{ URL::route('dcms.institute.program.index') }}"><button type="button" class="btn btn-info btn-xs">Program</button></a>
@endif

@if(Route::has('dcms.institute.campus.index'))
<a href="{{ URL::route('dcms.institute.campus.index') }}"><button type="button" class="btn btn-info btn-xs">Campus</button></a>
@endif
@if(Route::has('dcms.institute.staff.index'))
<a href="{{ URL::route('dcms.institute.staff.index') }}"><button type="button" class="btn btn-info btn-xs">Staff</button></a>
@endif
