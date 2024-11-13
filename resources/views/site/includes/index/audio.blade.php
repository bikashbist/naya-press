<div class="col-md-4">
    <!-- Title -->
    <h4 class="card-header primary-color-dark text-center white-text">@if($data['lang'] == 1) Access to Justice Program @else न्यायमा पहुँच कार्यक्रम @endif</h4>
    <!-- Example 2 -->
    <div class="card example-2">
        <div class="card-body">
            @if(isset($data['audio']))
            @foreach($data['audio'] as $row)
            <p>
            </p>
            <h6 style="font-weight: 400; text-align: justify; text-decoration: underline;">{{ $row->name }}</h6>
            <audio src="{{ asset('upload_file/audio'. '/'.$row->file )}}"></audio>
            <audio controls="">
                <source src="{{ asset('upload_file/audio'. '/'.$row->file )}}" type="audio/ogg">
                <source src="{{ asset('upload_file/audio'. '/'.$row->file )}}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
            <p></p>
            @endforeach
            @endif
        </div>
    </div>
    <!-- Example 2 -->
</div>