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
    @if(!isset($delete_key) or !$delete_key)
      <button data-type="delete" class="c-btn c-btn--danger hidden">Удалить</button>
    @else
      <button data-type="delete" class="c-btn c-btn--danger" data-delete_key="{{ $delete_key }}">Удалить</button>
    @endif
  </td>
</tr>
  </table>