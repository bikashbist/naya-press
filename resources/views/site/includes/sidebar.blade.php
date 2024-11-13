@if(isset($data['recent_post']))
<div class="sidebar-item recent-media-news">
    <h4>Recent Posts</h4>
    <ul>
@foreach($data['recent_post'] as $row)
        <li>
            <div class="media-content">
@if(Route::has('site.post.show'))
                <h3><a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">{{ $row->title }} </a></h3>
@endif
                <div class="pub-date"><i class="fa fa-calendar"></i>{{  Carbon\Carbon::parse($row->created_at)->format('d') }} <span>{{  Carbon\Carbon::parse($row->created_at)->format('F') }}</div>
            </div>
        </li>
        <!-- end list -->
@endforeach
    </ul>
</div>
<!-- end sidebar-item -->
@endif
{{-- <div class="sidebar-item archives">
    <h4>Archives</h4>
    <ul>
        <li><a href="#">Aug 2018</a></li>
        <li><a href="#">Sept 2018</a></li>
        <li><a href="#">Oct 2018</a></li>
        <li><a href="#">Nov 2018</a></li>
        <li><a href="#">Dec 2018</a></li>
    </ul>
</div> --}}
<!-- end sidebar-item -->
@if(isset($data['recent_post']))
<div class="sidebar-item recent-post">
    <h4>Most Visited Posts</h4>
    <ul>
@foreach($data['recent_post'] as $row)
        <li>
            <div class="media-content">
@if(Route::has('site.post.show'))
                <h3><a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">{{ $row->title }} </a></h3>
@endif
                <div class="pub-date"><i class="fa fa-calendar"></i>{{  Carbon\Carbon::parse($row->created_at)->format('d') }} <span>{{  Carbon\Carbon::parse($row->created_at)->format('F') }}</div>
            </div>
        </li>
        <!-- end list -->
@endforeach
    </ul>
</div>
<br><br>
<!-- end sidebar-item -->
@endif