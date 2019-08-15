<div class="form-group row">
  <label for="{{ $name }}"
    class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-form-label @if($config['required']) required @endif">{{ $label }}</label>
  <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
    <input type="text" class="form-control datetimepicker-input {{ $config['type'] }} @if($errors and $errors->has($name))is-invalid @endif"
      id="{{ $name }}"
      name="{{ $name }}"
      data-toggle="datetimepicker"
      data-target="#{{ $name }}"
      data-value="{{ $value }}"
      data-format_date="{{ $config['format_date'] }}"
    />
  </div>
  @if ($errors and $errors->has($name))
      <div class="invalid-feedback">
        {{ $errors->first($name) }}
      </div>
    @endif
</div>