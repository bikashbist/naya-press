
<div class="btn-group">
        <a href="{{ route('dcms.setting.index') }}" class="btn @if(Request::segment(2) == "setting") btn-success @else  btn-info @endif btn-xs"><i class="fa ">&nbsp;General Settings</i></a>
</div>
<div class="btn-group">
    <a href="{{ route('dcms.setting.title.index') }}" class="btn @if(Request::segment(2) == "title") btn-success @else  btn-info @endif btn-xs"><i class="fa ">&nbsp;Title And Logo</i></a>
</div>
<div class="btn-group">
    <a href="{{ route('dcms.setting.footer.index') }}" class="btn @if(Request::segment(2) == "footer") btn-success @else  btn-info @endif btn-xs"><i class="fa ">&nbsp;Footer Section</i></a>
</div>

<hr>