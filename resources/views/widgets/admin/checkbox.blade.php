<div class="c-choice c-choice--checkbox">
  <input class="c-choice__input" id="{{ $name }}" name="{{ $name }}" type="checkbox"
         @if($value !== null)
          @if($value) checked @endif
         @else
          @if(old($name)) checked @endif
        @endif>
  <label class="c-choice__label .c-field__label @if(!empty($required)) required @endif" for="{{ $name }}">{{ $config['label'] }}</label>
  @if ($errors->has($name))
    <small class="c-field__message u-color-danger">
      <i class="feather icon-x-circle"></i>{{ $errors->first($name) }}
    </small>
  @endif
</div>