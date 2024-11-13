@if($row->status)
    <button class="btn btn-round btn-success btn-xs">
        <i class="fa fa-check"></i>
    </button>
@else
    <button class="btn btn-round btn-danger btn-xs">
        <i class="fa fa-minus-circle"></i>
    </button>                                
@endif