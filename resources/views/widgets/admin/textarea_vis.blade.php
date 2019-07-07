<div class="form-group row">
  <label for="{{ $name }}" class="col-sm-2 col-form-label @if($config['required']) required @endif">{{ $config['label'] }}</label>
  <div class="col-sm-10">
    <textarea id="summernote" class="form-control @if($errors->has($name))is-invalid @endif" id="{{ $name }}" name="{{ $name }}" rows="3">@if($value !== null){{$value}}@else{{ old($name) }}@endif</textarea>
    @if ($errors->has($name))
      <div class="invalid-feedback">
        {{ $errors->first($name) }}
      </div>
    @endif
  </div>
</div>