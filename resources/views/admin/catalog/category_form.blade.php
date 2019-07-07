@extends('admin.basis')
@section('object_id'){{$object_id}}@endsection
@section('object_type'){{$object_type}}@endsection
@section('content')
  @include('admin.breadcrumbs', ['parents' => [['url' => '/admin/category', 'name' => 'Категории']], 'name' => 'Категория'])
  @include('admin.helper_message', ['errors' => $errors, 'info' => session('status')])

  <div class="row">
    <div class="col-12">
      <form enctype="multipart/form-data" action="{{ route ('admin.category.save') }}" method="POST">
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
                  @widget('admin.image', ['delete' => true], $category, 'image')
                  @widget('admin.text', ['label'=> 'Имя', 'required' => true], $category, 'title', $errors)
                  @widget('admin.text', ['label'=> 'h1'], $category, 'h1', $errors)
                  @widget('admin.textarea_vis', ['label'=> 'Описание'], $category, 'description', $errors)
                  @widget('admin.checkbox', ['label'=> 'Видимость'], $category, 'visible', $errors)
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
                  @widget('admin.text', ['label'=> 'Meta title'], $category, 'meta_title', $errors)
                  @widget('admin.textarea', ['label'=> 'Meta описание'], $category, 'meta_description', $errors)
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
@endsection
