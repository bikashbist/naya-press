<ol class="breadcrumb" style="padding: 3px 15px;">
        <li><a href="{{ URL::route('dcms.dashboard') }}"><i class="fa fa-home">&nbsp;</i></a> </li>               
  
        @php $link = "" @endphp
        @for($i = 1; $i <= count(Request::segments()); $i++)
            @if($i < count(Request::segments()) & $i > 0)
            @php $link .= "/" . Request::segment($i); @endphp
              <li><a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a></li>
            @else <li>{{ucwords(str_replace('-',' ',Request::segment($i)))}}</li>
            @endif
        @endfor
</ol>

