<tr class="image-product @if(!empty($class)) {{ $class }} @endif" data-product_image_id="@if(isset($sort_key)){{ $sort_key }}@endif">
  <td class="">
    @empty($object)
      <img class="" src="/admin/img/simuclar/72.png" alt="Нет изображения">
    @else
      <img class="" src="{{ $object->image }}" alt="Нет изображения">
    @endempty
  </td>
  <td class="">
      <input type="file" data-type="image_product" multiple="multiple" accept=".txt,image/*">
  </td>
  <td class="">
      <input class="c-input  @if(isset($td_sort_order) and !$td_sort_order) d-none @endif" name="sort_order[@if(isset($sort_key)){{ $sort_key }}@endif]" data-type="sort" value="@if(!empty($object)){{ $object->sort_order }}@endif">
  </td>
  <td class="">
    @if(!isset($delete_key) or !$delete_key)
      <button data-type="delete" class="c-btn c-btn--danger d-none">Удалить</button>
    @else
      <button data-type="delete" class="c-btn c-btn--danger" data-delete_key="{{ $delete_key }}">Удалить</button>
    @endif
  </td>


</tr>