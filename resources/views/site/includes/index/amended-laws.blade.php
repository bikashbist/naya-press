<div class="col-md-2">
    <!-- Title -->
    <h5 class="card-header primary-color-dark text-center white-text spacing-top">{{$data['category'][4]->category_name}}</h5>
    <!-- Exaple 1 -->
    @if(isset($data['category'][4]))
    <div class="card example-1">
        <div class="card-body">
            @if(isset($data['cat_post_'.$data['category'][4]->name]))
            @foreach($data['cat_post_'.$data['category'][4]->name] as $row)
            @if(Route::has('site.post.show'))
            <a href="{{ route('site.post.show', $row->post_unique_id) }}">
                <p>{{ mb_strimwidth($row->title, 0, 150, "...") }}</p>
            </a>
            <hr />
            @endif
            @endforeach
            @endif

            @if(isset($data['category'][$i]))
            @if(Route::has('site.category.show'))
            <div class="float-left">
                <a href="{{ route('site.category.show', $data['category'][$i]->id) }}">
                    <button class="btn btn-sm blue-gradient btn-rounded">@if($data['lang'] == 1)  View All @else सबै हेर्नुस  @endif</button>
                </a>
            </div>
            @endif
            @endif
        </div>
    </div>
    @endif
    <!-- Exaple 1 -->
</div>