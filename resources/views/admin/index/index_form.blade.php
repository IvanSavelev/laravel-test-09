@extends('admin.basis')
@section('object_type'){{$object_type}}@endsection
@section('content')
  @include('admin.breadcrumbs',['name' => 'Главная'])
  @include('admin.helper_message', ['errors' => $errors, 'info' => session('status')])

  <div class="row">
    <div class="col-12">
      <form enctype="multipart/form-data" action="{{ route ('admin.index.save') }}" method="POST">
        @csrf
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
        </nav>

        <div class="c-tabs__content tab-content" id="nav-tabContent">
          <!--- 1 TAB --->
          <div class="c-tabs__pane active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">

            <div class="row">
              <div class="col-12">
                @widget('admin.image', ['delete' => true], $settings, 'index_image')
                @widget('admin.list_checkbox', ['label'=> 'Основные категории'], $categories, 'product_to_category')
              </div>
            </div>
          </div>
          <!--- 2 TAB --->
          <div class="c-tabs__pane" id="nav-seo" role="tabpanel" aria-labelledby="nav-seo-tab">
            <div class="row">
              <div class="col-xl-6">

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


@endsection
