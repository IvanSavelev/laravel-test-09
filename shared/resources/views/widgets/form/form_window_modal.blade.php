<!-- Модальное окно -->
<div class="modal fade" id="status_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog {{ $config['class_size'] }}" role="document">
    <form method="post" id="modal-form" action="{{url($save)}}">
      <div class="modal-content">
        <div class="modal-header">
          @if(!empty($config['title']))<h5 class="modal-title">{{ $config['title'] }}</h5>@endif
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {!! $body_html !!}
        </div>
        <div class="modal-footer">
          {!! $footer_html !!}
        </div>
      </div>
    </form>
  </div>
</div>
<script>

</script>
