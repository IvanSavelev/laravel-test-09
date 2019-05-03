@extends('admin.basis')
@section('content')
  @include('admin.helper_message', ['errors' => $errors, 'info' => session('status')])
  @include('admin.breadcrumbs', ['parents' => [], 'name' => 'Категории'])
  <div class="row">
    <div class="col-12">
      <div class="u-mb-small u-text-right">
        <a href="{{ route ('admin.category.add') }}" class="c-btn c-btn--info">Добавить</a>
        <button data-type="delete" class="c-btn c-btn--danger"><i class="feather icon-trash-2"></i></button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="u-mb-small c-table-responsive@wide">
        <table class="c-table">
          <thead class="c-table__head">
          <tr class="c-table__row">
            <th class="c-table__cell c-table__cell--head"></th>
            <th class="c-table__cell c-table__cell--head">ID</th>
            <th class="c-table__cell c-table__cell--head">Имя</th>
            <th class="c-table__cell c-table__cell--head">Описание</th>
            <th class="c-table__cell c-table__cell--head"></th>
          </tr>
          </thead>

          <tbody>
          @forelse($categories as $category)
            <tr class="c-table__row @if(!$category->visible) visible_off @endif">
              <td class="c-table__cell">
                <input class="c-choice__input" id="category_id" data-id="{{ $category->category_id }}" type="checkbox">
              </td>
              <td class="c-table__cell">{{ $category->category_id }}</td>
              <td class="c-table__cell">
                <div class="o-media">
                  <div class="o-media__img u-mr-xsmall">
                    <div class="c-avatar c-avatar--small">
                      <img class="c-avatar__img" @empty($category->image) src="/_admin/img/image_empty_72.png"
                           @else src="{{ $category->image }}" @endif alt="{{ $category->title }}">
                    </div>
                  </div>
                  <div class="o-media__body">
                    <h6>{{ $category->title }}</h6>
                    <p>{{ $category->h1 }}</p>
                  </div>
                </div>
              </td>
              <td class="c-table__cell">{{ strip_tags($category->description) }}</td>
              <td class="c-table__cell">
                <a href="{{ route ('admin.category.edit', $category->category_id) }}" class="pull-right c-btn c-btn--info"><i
                        class="feather icon-edit-2"></i></a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4"><p class="u-text-center">Нет товаров.</p></td>
            </tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      @include('admin.helper_paginator', ['objects' => $categories])
    </div>
  </div>
@endsection

@section('script_down_2')
  <script>
    $(document).ready(function () {
      $('button[data-type=delete]').click(function () {
        categoryDelete();
        return false;
      });
    });

    function categoryDelete() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      var form_data = new FormData();
      var ids_delete = [];
      $('input:checkbox:checked').each(function () {
        ids_delete.push($(this).data('id'));
      });
      if (ids_delete.length <= 0) {
        alert("Выберете объекты для удаления.");
        return false;
      }
      var check = confirm("Вы уверены?");
      if (check === false) {
        return false;
      }

      form_data.append('ids_delete', ids_delete.join(","));
      $.ajax({
        data: form_data,
        type: "POST",
        url: '{{ url('/admin/category/delete') }}',
        cache: false,
        contentType: false,
        processData: false,
        success: function () {
          $('input:checkbox:checked').each(function () {
            var table_row = $(this).closest('tr').remove();
          });
          alert("Удаление прошло успешно.");
        }
      });
    }

  </script>
@endsection