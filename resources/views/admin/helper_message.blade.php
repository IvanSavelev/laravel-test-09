@if ($errors->any())
  @foreach ($errors->all() as $error)
    <div class="c-alert c-alert--danger alert">
      <span class="c-alert__icon">
        <i class="feather icon-slash"></i>
      </span>
      <div class="c-alert__content">
        <p>{{ $error }}</p>
      </div>
      <button class="c-close" data-dismiss="alert" type="button">×</button>
    </div>
  @endforeach
@endif
@if ($info)
  <div class="c-alert c-alert--success alert">
      <span class="c-alert__icon">
        <i class="feather icon-check"></i>
      </span>
    <div class="c-alert__content">
      <p>{{ $info }}</p>
    </div>
  </div>
@endif