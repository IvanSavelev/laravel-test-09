<div class="form-group row">
  <label for="{{ $name }}"
    class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-form-label @if($config['required']) required @endif">{{ $label }}</label>
  <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">

 <div class="form-group">
    <select class="selectpicker form-control" data-live-search="true" name="{{ $name }}">
      @foreach($value as $item)
         <option value="{{ $item['id'] }}" @if($item['active']) selected @endif>{{ $item['name'] }}</option>
      @endforeach
    </select>
  </div>
  </div>
</div>
