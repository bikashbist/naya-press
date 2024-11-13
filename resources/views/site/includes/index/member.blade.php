@if(isset($data['member']))
<div class="col-md-2">
    <!-- Grid row Attorney General -->
    <div class="row mb-3 featured-members">
        <div class="col-12 mb-2 col-md-12 col-sm-12 col-lg-12  ">
            @foreach($data['member'] as $row)
            @if($loop->iteration <= 1) <div class="card-header primary-color-dark text-center white-text" style="font-size:12px;">
                {{$row->designation_sec}}
        </div>
        <div class="text-center card">
            <div class="member-image">
                <img src="{{asset($row->image)}}" class="img-fluid">
            </div>
            <div class="member-details">
                <p class="mb-0 " style="text-align: center;font-size:13px;">{{ $row->name }}</p>
                <p class="mb-0" style="text-align: center;font-size: 11px;">{{ $row->designation }}</p>
                <p class="card-text mb-0" style="text-align: center;font-size: 11px;">{{$row->email}}</p>
                <p class="card-text mb-0" style="text-align: center;font-size: 11px;">{{$row->phone}}</p>
            </div>
        </div>
    </div>
    @else
    <div class="col-12 mb-2 col-md-12 col-sm-12 col-lg-12 ">
        <div class="card-header primary-color-dark text-center white-text" style="font-size:12px;">
            {{$row->designation_sec}}
        </div>
        <div class="text-center card">
            <div class="member-image">
                <img src="{{asset($row->image)}}" class="img-fluid">
            </div>
            <div class="member-details">
                <p class="mb-0 " style="text-align: center;font-size:13px;">{{ $row->name }}</p>
                <p class="mb-0" style="text-align: center;font-size: 11px;">{{ $row->designation }}</p>
                <p class="card-text mb-0" style="text-align: center;font-size: 11px;">{{$row->email}}</p>
                <p class="card-text mb-0" style="text-align: center;font-size: 11px;">{{$row->phone}}</p>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
<!-- /. Grid row Suchana Adhikari ./ -->
</div>
@endif