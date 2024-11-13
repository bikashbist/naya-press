@if(isset($row))
<div class="date-box">{{  Carbon\Carbon::parse($row->created_at)->format('d') }} <span>{{  Carbon\Carbon::parse($row->created_at)->format('F') }}</span></div>
@endif