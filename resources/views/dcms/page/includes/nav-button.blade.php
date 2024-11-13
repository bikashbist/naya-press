@include('dcms.includes.buttons.button-back')
&nbsp;
@include('dcms.includes.buttons.button-create')
&nbsp;
<div class="btn-group">
    <a href="{{ Route('dcms.page.featured') }}" class="btn btn-warning btn-xs"><i class="fa fa-plus">&nbsp;Featured Pages</i></a>
</div>
<div class="btn-group pull-right">
   @include('dcms.includes.buttons.button-recycle')
</div>
