@extends('admin.basis')
@section('content')
  @include('admin.helper_message', ['errors' => $errors, 'info' => session('status')])
  @include('admin.breadcrumbs', ['parents' => [], 'name' => 'Категории'])
  <div class="row">
    <div class="col-12">
      <div class="pb-3 float-right">
        <a href="{{ route ('admin.category.add') }}" class="btn btn-primary">Добавить</a>
        <button data-type="delete" class="btn btn-danger"><span class="icon"><i class="fas fa-trash"></i></span></button>
      </div>
    </div>
  </div>
<div class="row">
  <div class="col-12">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Категории</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive overflow-hidden">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <thead>
              <tr>
                <th></th>
                <th>ID</th>
                <th>Имя</th>
                <th>Описание</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @forelse($categories as $category)
                <tr class="@if(!$category->visible) opticy-50 @endif">
                  <td class="custom-checkbox pl-5 w-2">
                    <input type="checkbox" class="custom-control-input" for="{{ $category->category_id }}" id="{{ $category->category_id }}" data-id="{{ $category->category_id }}">
                    <label class="custom-control-label" for="{{ $category->category_id }}">{{ $category->category_id }}</label>
                  </td>
                  <td>{{ $category->category_id }}</td>
                  <td>{{ $category->title }}</td>
                  <td>{{ strip_tags($category->description) }}</td>
                  <td class="c-table__cell">
                    <a href="{{ route ('admin.category.edit', $category->category_id) }}" class="btn btn-primary btn-icon-split">
                      <span class="icon">
                          <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5"><p class="">Нет товаров.</p></td>
                </tr>
              @endforelse
            </tbody>
          </table>
          @include('admin.helper_paginator', ['objects' => $categories])
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script_down_2')
  @include('admin.helper_script_list_delete', ['url' => '/admin/category/delete'])
@endsection