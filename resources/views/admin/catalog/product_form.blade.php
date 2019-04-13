@extends('admin.basis')
@section('object_id'){{$object_id}}@endsection
@section('object_type'){{$object_type}}@endsection
@section('content')
  @include('admin.breadcrumbs', ['parents' => [['url' => '/admin/product', 'name' => 'Продукты']], 'name' => 'Продукт'])

  <form enctype="multipart/form-data" action="{{ route ('admin.product.save') }}" method="POST">
  @csrf
  <input type="hidden" name="object_id" id="object_id" value="{{$object_id}}">
  <div class="row">
    <div class="col-12">
      <nav class="c-tabs">
        <div class="c-tabs__list nav nav-tabs" id="myTab" role="tablist">
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
        </div>

        <div class="c-tabs__content tab-content" id="nav-tabContent">

          <!--- 1 TAB --->
          <div class="c-tabs__pane active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">

            <div class="row">
              <div class="col-xl-6">
                @include('admin.field_text', ['object' => $product, 'name' => 'title', 'label' => 'Имя', 'required' => true])
                @include('admin.field_text', ['object' => $product, 'name' => 'h1', 'label' => 'h1'])
                @include('admin.field_text', ['object' => $product, 'name' => 'model', 'label' => 'Модель', 'required' => true])
                @include('admin.field_text', ['object' => $product, 'name' => 'price', 'label' => 'Цена', 'format' => 'price', 'required' => true])
                @include('admin.field_checkbox', ['object' => $product, 'name' => 'visible', 'label' => 'Видимость'])
              </div>

              <div class="col-xl-6">
                @include('admin.field_textarea_vis', ['object' => $product, 'name' => 'description', 'label' => 'Описание'])
              </div>
            </div>
          </div>

          <!--- 2 TAB --->
          <div class="c-tabs__pane" id="nav-seo" role="tabpanel" aria-labelledby="nav-seo-tab">
            <div class="row">
              <div class="col-xl-6">
                @include('admin.field_text', ['object' => $product, 'name' => 'meta_title', 'label' => 'Meta title'])
                @include('admin.field_textarea', ['object' => $product, 'name' => 'meta_description', 'label' => 'Meta описание'])
              </div>

              <div class="col-xl-6">
              </div>
            </div>
          </div>
          <!--- 2 TAB --->
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
                      </tr>
                      </thead>

                      <tbody>
                        @forelse ($product_image as $item)
                          @include('admin.field_image_tr', ['object' => $item, 'delete_key' => $item->product_image_id ])
                        @empty
                        @endforelse
                        @include('admin.field_image_tr', [])
                        @include('admin.field_image_tr', ['class' => 'hidden'])
                      </tbody>
                    </table>
                  </div>
                </div>

              <div class="col-xl-6">
              </div>
            </div>
          </div>
          <!--- BUTTON --->
          <div class="col-12">
            <div class="row">
              <div class="col-12 col-sm-7 col-xl-2 u-p-small u-mr-auto u-mb-xsmall">
                <button type="submit" class="c-btn c-btn--info c-btn--fullwidth">Сохранить</button>
              </div>
          </div>


        </div>
      </nav>
    </div>
  </div>

</form>
@endsection
@section('script_down')
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
                  $img = table_row.find("img");
                  $img.attr('src', data['src']);
                  table_row.find('[data-type="delete"]').removeClass('hidden');
                  $clone = $('tbody').find('.c-table__row.hidden').clone(true);
                  $clone.removeClass('hidden');
                  var delete_button = $clone.find('[data-type="delete"]');
                  delete_button.removeClass('hidden');
                  delete_button.attr('data-delete_key', data['delete_key']);

                  $clone.appendTo("tbody");
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
