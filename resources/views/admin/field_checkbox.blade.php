<div class="c-choice c-choice--checkbox">
  <input class="c-choice__input" id="{{ $name }}" name="{{ $name }}" type="checkbox" @if(isset($object))@if($object->$name == 1) checked @endif @else{{ old($name) }}@endif">
  <label class="c-choice__label @if(!empty($required)) required @endif" for="{{ $name }}">{{ $label }}</label>
  @if ($errors->has($name))
    <small class="c-field__message u-color-danger">
      <i class="feather icon-x-circle"></i>{{ $errors->first($name) }}
    </small>
  @endif
</div>