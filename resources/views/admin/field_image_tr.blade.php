<tr class="c-table__row @if(!empty($class)) {{ $class }} @endif" data-product_image_id="@if(isset($sort_key)){{ $sort_key }}@endif">
  <td class="c-table__cell">
    <div class="o-media">
      <div class="o-media__img u-mr-xsmall">
        <div class="c-avatar c-avatar--small">
          @empty($object)
            <img class="" src="/admin/img/image_empty_72.png" alt="Нет изображения">
          @else
            <img class="" src="{{ $object->image }}" alt="Нет изображения">
          @endempty

        </div>
      </div>
    </div>
  </td>
  <td class="c-table__cell">
      <input type="file" data-type="image_product" multiple="multiple" accept=".txt,image/*">
  </td>
  <td class="c-table__cell">
      <input class="c-input  @if(isset($td_sort_order) and !$td_sort_order)hidden @endif" name="sort_order[@if(isset($sort_key)){{ $sort_key }}@endif]" data-type="sort" value="@if(!empty($object)){{ $object->sort_order }}@endif">
  </td>
  <td class="c-table__cell">
    @if(!isset($delete_key) or !$delete_key)
      <button data-type="delete" class="c-btn c-btn--danger hidden">Удалить</button>
    @else
      <button data-type="delete" class="c-btn c-btn--danger" data-delete_key="{{ $delete_key }}">Удалить</button>
    @endif
  </td>


</tr>