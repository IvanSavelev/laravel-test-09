<div class="alert alert-dismissible fade show @if($status == 'info') alert-info @endif @if($status == 'success') alert-success @endif @if($status == 'error') alert-danger @endif " role="alert">
    {!! $text !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>