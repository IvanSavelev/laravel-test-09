@extends('admin.basis')
@section('object_type'){{$object_type}}@endsection
@section('content')
@include('admin.helper.helper_messages', ['errors' => $errors, 'info' => session('status')])
@include('admin.breadcrumbs',['name' => 'Главная'])

  <div class="row">
    <div class="col-12">
      <form enctype="multipart/form-data" action="{{ route ('admin.index.save') }}" method="POST">
        @csrf

        <div class="card shadow mb-4">
          <a href="#nav-general-tab" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Основные настройки</h6>
          </a>
          <div class="collapse show" id="nav-general-tab" style="">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  @widget('admin.text', ['label'=> 'Имя', 'required' => true], $settings, 'title', $errors)
                  @widget('admin.image', ['label'=>'Изображение', 'delete' => true], $settings, 'image')
                  @widget('admin.list_checkbox', ['label'=> 'Основные категории', 'type' => 'categories'], $settings, 'index_categories_general')
                  @widget('admin.list_checkbox', ['label'=> 'Основные продукты', 'type' => 'products'], $settings, 'index_products_general')
                  @widget('admin.header', [], 'Блок посеридине')
                  @widget('admin.text', ['label'=> 'Заголовок'], $settings, 'middle_title', $errors)
                  @widget('admin.text', ['label'=> 'Описание'], $settings, 'middle_text', $errors)
                  @widget('admin.image', ['delete' => true], $settings, 'middle_image')
                  @widget('admin.header', [], '')
                  @widget('admin.list_checkbox', ['label'=> 'Основные статьи', 'type' => 'articles'], $settings, 'index_articles_general')
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card shadow mb-4">
          <a href="#nav-seo-tab" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">СЕО настройки</h6>
          </a>
          <div class="collapse show" id="nav-seo-tab" style="">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  @widget('admin.text', ['label'=> 'Meta title'], $settings, 'meta_title', $errors)
                  @widget('admin.textarea', ['label'=> 'Meta описание'], $settings, 'meta_description', $errors)
                </div>
              </div>
            </div>
          </div>
        </div>

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
