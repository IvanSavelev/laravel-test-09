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

        <!--- 1 TAB --->
        <div class="card shadow mb-4">
          <a href="#nav-general-tab" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Основные настройки</h6>
          </a>
          <div class="collapse show" id="nav-general-tab" style="">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  @widget('admin.text', ['label'=> 'Имя', 'required' => true], $product, 'title', $errors)
                  @widget('admin.text', ['label'=> 'h1'], $product, 'h1', $errors)
                  @widget('admin.text', ['label'=> 'Модель', 'required' => true], $product, 'model', $errors)
                  @widget('admin.text', ['label'=> 'Цена', 'required' => true, 'format' => 'price'], $product, 'price', $errors)
                  @widget('admin.textarea_vis', ['label'=> 'Описание'], $product, 'description', $errors)
                  @widget('admin.checkbox', ['label'=> 'Видимость'], $product, 'visible', $errors)
                  @widget('admin.list_checkbox', ['label'=> 'Категории'], $product_to_category, 'product_to_category')
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--- 2 TAB --->
        <div class="card shadow mb-4">
          <a href="#nav-seo-tab" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">СЕО настройки</h6>
          </a>
          <div class="collapse show" id="nav-seo-tab" style="">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  @widget('admin.text', ['label'=> 'Meta title'], $product, 'meta_title', $errors)
                  @widget('admin.textarea', ['label'=> 'Meta описание'], $product, 'meta_description', $errors)
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--- 3 TAB --->
        <div class="card shadow mb-4">
          <a href="#nav-image" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Изображения</h6>
          </a>
          <div class="collapse show" id="nav-image" style="">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <table class="c-table">
                    <tbody>
                      @isset($product_image)
                        @foreach ($product_image as $item)
                          @include('admin.helper_image_tr', ['object' => $item, 'sort_key'=> $item->product_image_id, 'delete_key' => $item->product_image_id ])
                        @endforeach
                      @endisset
                      @include('admin.helper_image_tr', ['td_sort_order' => false])
                      @include('admin.helper_image_tr', ['class' => 'd-none', 'td_sort_order' => false])
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--- BUTTONS --->
        <div class="card shadow mb-4">
          <div class="card-body">
            <button type="submit" class="btn btn-primary btn-icon-split"><span class="text">Сохранить</span></button>
            <button type="submit" data-type="update" class="btn btn-primary btn-icon-split"><span class="text">Сохранить и остаться на странице</span></button>
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
      var table_row = this_dom.closest('.image-product');
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
          var table_row = this_dom.closest('.image-product');
          table_row.find("img").attr('src', data['src']);
          if(data['delete_key']) {
            var td_sort_order = table_row.find('[data-type="sort"]');
            td_sort_order.removeClass('d-none');
            td_sort_order.val(data['sort_order']);

            var delete_button = table_row.find('[data-type="delete"]');
            delete_button.removeClass('d-none');
            delete_button.attr('data-delete_key', data['delete_key']);

            var clone = $('tbody').find('.image-product.d-none').clone(true);
            clone.removeClass('d-none');
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
          var table_row = this_dom.closest('.image-product');
          table_row.remove();
        }
      });
    }

  </script>

@endsection
