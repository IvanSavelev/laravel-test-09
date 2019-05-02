@extends('admin.basis')
@section('object_id'){{$object_id}}@endsection
@section('object_type'){{$object_type}}@endsection
@section('content')
  @include('admin.breadcrumbs', ['parents' => [['url' => '/admin/product', 'name' => 'Товары']], 'name' => 'Товар'])
  @include('admin.helper_message', ['errors' => $errors, 'info' => session('status')])

  <div class="row">
    <div class="col-12">
      <form enctype="multipart/form-data" action="{{ route ('admin.product.save') }}" method="POST">
        @csrf
        <input type="hidden" name="object_id" id="object_id" value="{{$object_id}}">
      <div class="c-tabs">
        <nav class="c-tabs__list nav nav-tabs" id="myTab" role="tablist">
          <a class="c-tabs__link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab"
             aria-controls="nav-general" aria-selected="true">
                    <span class="c-tabs__link-icon">
                      <i class="feather icon-settings"></i>
                    </span>Основные настройки
          </a>
          <a class="c-tabs__link" id="nav-seo-tab" data-toggle="tab" href="#nav-seo" role="tab"
                 aria-controls="nav-profile" aria-selected="false">
                    <span class="c-tabs__link-icon">
                      <i class="feather icon-sliders"></i>
                    </span>СЕО настройки
          </a>
          <a class="c-tabs__link" id="nav-image-tab" data-toggle="tab" href="#nav-image" role="tab"
             aria-controls="nav-profile" aria-selected="false">
                    <span class="c-tabs__link-icon">
                      <i class="feather icon-sliders"></i>
                    </span>Изображения
          </a>
        </nav>

        <div class="c-tabs__content tab-content" id="nav-tabContent">
          <!--- 1 TAB --->
          <div class="c-tabs__pane active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">

            <div class="row">
              <div class="col-xl-6">
                @widget('admin.text', ['label'=> 'Имя', 'required' => true], $product, 'title', $errors)
                @widget('admin.text', ['label'=> 'h1'], $product, 'h1', $errors)
                @widget('admin.text', ['label'=> 'Модель', 'required' => true], $product, 'model', $errors)
                @widget('admin.text', ['label'=> 'Цена', 'required' => true, 'format' => 'price'], $product, 'price', $errors)
                @widget('admin.checkbox', ['label'=> 'Видимость'], $product, 'visible', $errors)
              </div>

              <div class="col-xl-6">
                @widget('admin.textarea_vis', ['label'=> 'Описание'], $product, 'description', $errors)
              </div>
            </div>
          </div>
          <!--- 2 TAB --->
          <div class="c-tabs__pane" id="nav-seo" role="tabpanel" aria-labelledby="nav-seo-tab">
            <div class="row">
              <div class="col-xl-6">
                @widget('admin.text', ['label'=> 'Meta title'], $product, 'meta_title', $errors)
                @widget('admin.textarea', ['label'=> 'Meta описание'], $product, 'meta_description', $errors)
              </div>

              <div class="col-xl-6">
              </div>
            </div>
          </div>
          <!--- 3 TAB --->
          <div class="c-tabs__pane" id="nav-image" role="tabpanel" aria-labelledby="nav-seo-tab">
            <div class="row">
                <div class="col-12">
                  <div class="c-table-responsive@wide">
                    <table class="c-table">
                      <thead class="c-table__head">
                      <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">Изображение</th>
                        <th class="c-table__cell c-table__cell--head"></th>
                        <th class="c-table__cell c-table__cell--head"></th>
                        <th class="c-table__cell c-table__cell--head"></th>
                      </tr>
                      </thead>

                      <tbody>
                        @isset($product_image)
                          @foreach ($product_image as $item)
                            @include('admin.field_image_tr', ['object' => $item, 'sort_key'=> $item->product_image_id, 'delete_key' => $item->product_image_id ])
                          @endforeach
                        @endisset
                        @include('admin.field_image_tr', ['td_sort_order' => false])
                        @include('admin.field_image_tr', ['class' => 'hidden', 'td_sort_order' => false])
                      </tbody>
                    </table>
                  </div>
                </div>

              <div class="col-xl-6">
              </div>
            </div>
          </div>
        </div>
    </div>
      <!--- BUTTON --->
      <div class="col-12">
        <div class="row c-invoice">
          <div class="col-12 u-p-small u-mr-auto">

                <button type="submit" class="c-btn c-btn--info">Сохранить</button>
                <button type="submit" data-type="update" class="c-btn c-btn--info">Сохранить и остаться на странице</button>

            </div>
          </div>

        </div>

      </form>
      </div>
  </div>


@endsection
@section('script_down_2')
  <script>

    $(document).ready(function () {
      //Add/update image
      $('input[data-type=image_product]').change(function () {
        file = this.files;
        productAddImage(file[0], $(this));
      });
      //Delete image
      $('button[data-type=delete]').click(function () {
        productDeleteImage($(this));
        return false;
      });


    });

    function productAddImage(file, this_dom) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      var form_data = new FormData();
      form_data.append('photo', file);
      form_data.append('object_id', $('#object_id').val());
      var table_row = this_dom.closest('.c-table__row');
      form_data.append('product_image_id', table_row.data('product_image_id'));
      form_data.append('object_type', $('#object_type').val());
      $.ajax({
        data: form_data,
        type: "POST",
        url: '{{ url('/admin/product/add_image') }}',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
          var table_row = this_dom.closest('.c-table__row');
          table_row.find("img").attr('src', data['src']);
          if(data['delete_key']) {
            var td_sort_order = table_row.find('[data-type="sort"]');
            td_sort_order.removeClass('hidden');
            td_sort_order.val(data['sort_order']);

            var delete_button = table_row.find('[data-type="delete"]');
            delete_button.removeClass('hidden');
            delete_button.attr('data-delete_key', data['delete_key']);

            var clone = $('tbody').find('.c-table__row.hidden').clone(true);
            clone.removeClass('hidden');
            clone.appendTo("tbody");
          }


        }
      });
    }


    function productDeleteImage(this_dom) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      var form_data = new FormData();
      form_data.append('delete_key', this_dom.data('delete_key'));
      form_data.append('object_id', $('#object_id').val());
      form_data.append('object_type', $('#object_type').val());
      $.ajax({
        data: form_data,
        type: "POST",
        url: '{{ url('/admin/product/delete_image') }}',
        cache: false,
        contentType: false,
        processData: false,
        success: function () {
          var table_row = this_dom.closest('.c-table__row');
          table_row.remove();
        }
      });
    }

  </script>

@endsection
