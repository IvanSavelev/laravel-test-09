<div class="form-group row">
  <label for="{{ $name }}" class="col-sm-5 col-md-4 col-lg-3 col-xl-2  col-form-label @if($config['required']) required @endif">{{ $label }}</label>
  <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10 align-self-center">

    <div class="custom-control custom-checkbox">
      <input class="custom-control-input" id="{{ $name }}" name="{{ $name }}" type="checkbox"
             @if($value !== null)
             @if($value) checked @endif
             @else
             @if(old($name)) checked @endif
            @endif>
      <label class="custom-control-label" id="{{ $name }}" for="{{ $name }}"></label>
    </div>

   @if ($errors and $errors->has($name))
      <small class="c-field__message u-color-danger">
        <i class="feather icon-x-circle"></i>{{ $errors->first($name) }}
      </small>
    @endif
  </div>
</div>