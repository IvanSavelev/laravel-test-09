<div class="c-field u-mb-medium">
  <label class="c-field__label @if(!empty($required)) required @endif" for="{{ $name }}">{{ $config['label'] }}</label>
  <textarea class="summernote @if($errors->has($name))c-input--danger @endif" id="{{ $name }}" name="{{ $name }}">@if($value !== null){{$value}}@else{{ old($name) }}@endif</textarea>
  @if ($errors->has($name))
    <small class="c-field__message u-color-danger">
      <i class="feather icon-x-circle"></i>{{ $errors->first($name) }}
    </small>
  @endif
</div>