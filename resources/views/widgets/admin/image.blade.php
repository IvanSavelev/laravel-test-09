<div class="form-group row">
  <label for="{{ $name }}" class="col-sm-2 col-form-label @if($config['required']) required @endif">{{ $config['label'] }}</label>
  <div class="col-sm-10">
    <div class="row">

      <div class="col-2">
          @empty($src)
            <img class="" src="/admin/img/simuclar/72.png" alt="Нет изображения">
          @else
            <img class="" src="{{ $src }}" alt="Изображение">
          @endempty

        </div>

        <div class="col-6 d-flex">
          <div class="align-self-center ">
            <input type="file" data-type="image_product" name="{{ $name }}" multiple="multiple" accept=".txt,image/*">
          </div>
        </div>

        <div class="col-4 d-flex">
          @if($config['delete'])
            <div class="form-check align-self-center ">
              <label class="form-check-label">
                <input class="form-check-input" id="{{ $name }}" name="delete_{{ $name }}" type="checkbox">Удалить
              </label>
            </div>
          @endif
        </div>
    </div>









  </div>
</div>


