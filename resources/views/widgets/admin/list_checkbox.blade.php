<div class="form-group row">
  <label for="{{ $name }}" class="col-sm-2 col-form-label @if($config['required']) required @endif">{{ $config['label'] }}</label>
  <div class="col-sm-10 ">
    <div class="list-chechbox">
      @foreach($objects as $object)

        <div class="even">

          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" id="{{ $object['name'] }}" name="{{ $object['name_no_array'] }}"
                   {{old($object['name'])}} value="{{ $object['value'] }}" type="checkbox"
                   @if(is_array($selected_ids))
                   @if(in_array($object['value'], $selected_ids))checked @endif
                   @else
                   @if(!empty(old($name)) and array_key_exists($object['id'], old($name))) checked @endif
                  @endif>
            <label class="custom-control-label" for="{{ $object['name'] }}">{{ $object['title'] }}</label>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</div>