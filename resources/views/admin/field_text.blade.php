<div class="c-field u-mb-medium">
  <label class="c-field__label @if(!empty($required)) required @endif" for="{{ $name }}">{{ $label }}</label>
  <input class="c-input @if($errors->has($name))c-input--danger @endif" type="text" id="{{ $name }}" name="{{ $name }}"
         value="@if(isset($object) and isset($object->$name))@if(!empty($format))@if($format=='price'){{ number_format($object->$name, 2, '.', ' ') }}@endif @else{{ $object->$name }}@endif @else{{ old($name) }}@endif">
  @if ($errors->has($name))
    <small class="c-field__message u-color-danger">
      <i class="feather icon-x-circle"></i>{{ $errors->first($name) }}
    </small>
  @endif
</div>