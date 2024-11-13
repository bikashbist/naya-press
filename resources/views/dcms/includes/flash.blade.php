{{-- flash-message --}}
<br>
<div id="flash" class="flass-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <div class="alert alert-{{ $msg }} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('alert-' . $msg) }}
            </div>         
        @endif
    @endforeach
</div> 

{{-- error-message --}}

<div id="flash">
    @foreach ($errors->all() as $error)
            <div class="alert alert-block alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ $error }}
            </div>
    @endforeach
</div>

 @section('js')
    @parent

    <script type="text/javascript"> 
        $(document).ready( function() {
          $('#flash').delay(1000).fadeOut();
        });
      </script>
@endsection 