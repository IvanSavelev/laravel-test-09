<div class="c-field u-mb-medium">
  <label class="c-field__label @if($config['required']) required @endif" for="{{ $name }}">{{ $config['label'] }}</label>
  <input data-type="datetimepicker" class="c-input @if($errors->has($name))c-input--danger @endif" type="text" id="{{ $name }}" name="{{ $name }}"
         value="@if($value !== null){{$value}}@else{{ old($name) }}@endif">
  @if ($errors->has($name))
    <small class="c-field__message u-color-danger">
      <i class="feather icon-x-circle"></i>{{ $errors->first($name) }}
    </small>
  @endif
</div>
