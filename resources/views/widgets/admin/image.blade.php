<div class="form-group row">
  <label for="{{ $name }}" class="col-sm-2 col-form-label @if($config['required']) required @endif">{{ $config['label'] }}</label>
  <div class="col-sm-10">

    <table>
      <tr class="form-group @if(!empty($class)) {{ $class }} @endif">
        <td class="c-table__cell">
          <div class="o-media">
            <div class="o-media__img u-mr-xsmall">
              <div class="c-avatar c-avatar--small">
                @empty($src)
                  <img class="" src="/admin/img/simuclar/72.png" alt="Нет изображения">
                @else
                  <img class="" src="{{ $src }}" alt="Изображение">
                @endempty

              </div>
            </div>
          </div>
        </td>
        <td class="c-table__cell">
          <input type="file" data-type="image_product" name="{{ $name }}" multiple="multiple" accept=".txt,image/*">
        </td>
        <td class="c-table__cell">
          @if($config['delete'])
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" id="{{ $name }}" name="delete_{{ $name }}" type="checkbox">Удалить
              </label>
            </div>
          @endif
        </td>
      </tr>
    </table>


  </div>
</div>


