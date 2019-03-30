@extends('admin.basis')
@section('object_id'){{$object_id}}@endsection
@section('object_type'){{$object_type}}@endsection
@section('content')
  <form enctype="multipart/form-data" action="{{ route ('products.save') }}" method="POST">
      @csrf
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
                <div class="c-field u-mb-medium">
                  <label class="c-field__label" for="name">Имя</label>
                  <input class="c-input" type="text" id="title">
                </div>

                <div class="c-field u-mb-medium">
                  <label class="c-field__label" for="name">h1</label>
                  <input class="c-input" type="text" id="title">
                </div>

                <div class="c-field u-mb-medium">
                  <label class="c-field__label" for="">Модель</label>
                  <input class="c-input" type="text" id="model">
                </div>
                <div class="c-field u-mb-medium">
                  <label class="c-field__label" for="user-phone">Цена</label>
                  <input class="c-input" type="tel" id="user-phone">
                </div>
              </div>

              <div class="col-xl-6">
                <div class="c-field u-mb-medium">
                  <label class="c-field__label" for="user-zip">Описание</label>
                  <textarea id="summernote" class="summernote"></textarea>
                </div>
              </div>
            </div>
          </div>


          <!--- 2 TAB --->
          <div class="c-tabs__pane" id="nav-seo" role="tabpanel" aria-labelledby="nav-seo-tab">
            <div class="row">
              <div class="col-xl-6">
                <div class="c-field u-mb-medium">
                  <label class="c-field__label" for="">Meta title</label>
                  <input class="c-input" type="text" id="model">
                </div>

                <div class="c-field u-mb-medium">
                  <label class="c-field__label" for="user-zip">Meta описание</label>
                  <textarea class="c-input"></textarea>
                </div>
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
                      <tr class="c-table__row">
                        <td class="c-table__cell">
                          <div class="o-media">
                            <div class="o-media__img u-mr-xsmall">
                              <div class="c-avatar c-avatar--small">
                                <img class="" src="http://via.placeholder.com/72" alt="Jessica Alba">
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="c-table__cell"><form enctype="multipart/form-data" action="admin/products/save" method="POST">
                            <input type="file" data-type="image_product" multiple="multiple" accept=".txt,image/*">

                        </td>
                        <td class="c-table__cell">
                          <a href="#" class="c-btn c-btn--danger u-mb-xsmall">Удалить</a>
                        </td>
                      </tr>

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
              <span class="c-divider u-mv-medium"></span>


              <div class="col-12 col-sm-7 col-xl-2 u-mr-auto u-mb-xsmall">
                <button type="submit" class="c-btn c-btn--info c-btn--fullwidth">Сохранить</button>
              </div>

              <div class="col-12 col-sm-5 col-xl-3 u-text-right">
                <button class="c-btn c-btn--danger c-btn--fullwidth c-btn--outline" data-toggle="modal"
                        data-target="#modal-delete">Delete My Account
                </button>

                <div class="c-modal c-modal--small modal fade" id="modal-delete" tabindex="-1" role="dialog"
                     aria-labelledby="modal-delete">
                  <div class="c-modal__dialog modal-dialog" role="document">
                    <div class="c-modal__content">
                      <div class="c-modal__body">
                                      <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                                          <i class="feather icon-x"></i>
                                      </span>

                        <span class="c-icon c-icon--danger c-icon--large u-mb-small">
                                        <i class="feather icon-alert-triangle"></i>
                                      </span>
                        <h3 class="u-mb-small">Do you want to delete your account?</h3>

                        <p class="u-mb-medium">By deleting you account, you no longer have access to your dashboard,
                          members and your information.</p>

                        <div class="u-text-center">
                          <a href="#" class="c-btn c-btn--danger c-btn--outline u-mr-small" data-dismiss="modal"
                             aria-label="Close">Cancel</a>
                          <a href="#" class="c-btn c-btn--danger">Delete</a>
                        </div>
                      </div>
                    </div><!-- // .c-modal__content -->
                  </div><!-- // .c-modal__dialog -->
                </div><!-- // .c-modal -->
              </div>
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

      $(document).ready(function() {
          //Добавляем/обновляем изображение
          $('input[data-type=image_product]').change(function(){
              file = this.files;
              productAddImage(file[0], $(this));
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
              url: '{{ url('/admin/products/send_file') }}',
              cache: false,
              contentType: false,
              processData: false,
              success: function(url2) {
                  var table_row = this_dom.closest('.c-table__row');
                  $img = table_row.find("img");
                  $img.attr('src', url2);
                  addImageBox(table_row);
              }
          });
      }
      function addImageBox(table_row) {
          $clone = table_row.clone(true);
          $clone.appendTo("tbody");
      }
  </script>

@endsection
