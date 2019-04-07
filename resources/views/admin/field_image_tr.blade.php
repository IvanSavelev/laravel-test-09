<tr class="c-table__row @if(!empty($class)) {{ $class }} @endif">
  <td class="c-table__cell">
    <div class="o-media">
      <div class="o-media__img u-mr-xsmall">
        <div class="c-avatar c-avatar--small">
          <img class="" src="/_admin/img/image_empty_72.png" alt="Нет изображения">
        </div>
      </div>
    </div>
  </td>
  <td class="c-table__cell">
      <input type="file" data-type="image_product" multiple="multiple" accept=".txt,image/*">
  </td>
  <td class="c-table__cell">
    <a href="#" data-type="delete" class="c-btn c-btn--danger u-mb-xsmall @if(!isset($delete) or !$delete)hidden @endif">Удалить</a>
  </td>
</tr>