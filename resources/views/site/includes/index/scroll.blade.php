<div class="container">
    <div class="simple-marquee-container">
        <div class="marquee-title">
          <p>सूचना</p>
        </div>
        <div class="marquee-cover">
        @if(isset($data['current_news']) )
            <marquee attribute_name="attribute_value" behavior="scroll" direction="left" onmouseover="this.stop();"
                onmouseout="this.start();">
                @foreach($data['current_news'] as $row)
                <a href="{{ route('site.post.show', $row->post_unique_id)}}" >{{ $row->title}} </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                @endforeach
            </marquee>
            @endif
        </div>
    </div>
</div>
