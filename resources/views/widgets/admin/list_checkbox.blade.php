<div class="c-choice c-choice--checkbox">
  <label class="c-field__label @if($config['required']) required @endif"
         for="{{ $name }}">{{ $config['label'] }}</label>
  <div class="scrollbox">
    @foreach($objects as $object)
      <div class="even">
        <input class="c-choice__input" id="{{ $object['name'] }}" name="{{ $object['name_no_array'] }}"
               {{old($object['name'])}} value="{{ $object['value'] }}" type="checkbox"
               @if(is_array($selected_ids))
                @if(in_array($object['value'], $selected_ids))checked @endif
               @else
                @if(!empty(old($name)) and array_key_exists($object['id'], old($name))) checked @endif
               @endif>
        <label class="c-choice__label" for="{{ $object['name'] }}">{{ $object['title'] }}</label>
      </div>
    @endforeach
  </div>
</div>