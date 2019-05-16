<table>
  <tr class=" @if(!empty($class)) {{ $class }} @endif">
    <td class="c-table__cell">
      <div class="o-media">
        <div class="o-media__img u-mr-xsmall">
          <div class="c-avatar c-avatar--small">
            @empty($src)
              <img class="" src="/_admin/img/image_empty_72.png" alt="Нет изображения">
            @else
              <img class="" src="{{ $src }}" alt="Изображение">
            @endempty

          </div>
        </div>
      </div>
    </td>
    <td class="c-table__cell">
      <input type="file" data-type="image_product" name="image" multiple="multiple" accept=".txt,image/*">
    </td>
    <td class="c-table__cell">
      @if($config['delete'])
        <div class="c-choice--checkbox">
          <input class="c-choice__input" id="{{ $name }}" name="delete_{{ $name }}" type="checkbox">
          <label class="c-choice__label" for="{{ $name }}">Удалить</label>
        </div>
      @endif
    </td>
  </tr>
</table>
