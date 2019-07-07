<div class="form-group row">
  <label for="{{ $name }}" class="col-sm-2 col-form-label @if($config['required']) required @endif">{{ $config['label'] }}</label>
  <div class="col-sm-10">
    <input type="text" class="form-control @if($errors->has($name))is-invalid @endif" id="{{ $name }}" name="{{ $name }}"
           value="@if(!$errors->all()){{$value}}@else{{ old($name) }}@endif">
    @if ($errors->has($name))
      <div class="invalid-feedback">
        {{ $errors->first($name) }}
      </div>
    @endif
  </div>
</div>