@extends('admin.basis')
@section('content')
  @include('admin.helper_message', ['errors' => $errors, 'info' => session('status')])
  @include('admin.breadcrumbs', ['parents' => [], 'name' => 'Товары'])

  <div class="row">
    <div class="col-12">
      <div class="pb-3 float-right">
        <a href="{{ route ('admin.product.add') }}" class="btn btn-primary">Добавить</a>
        <button data-type="delete" class="btn btn-danger"><span class="icon"><i class="fas fa-trash"></i></span></button>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">


      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Продукты</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive overflow-hidden">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th></th>
                  <th>Изображение</th>
                  <th>Имя</th>
                  <th>Модель</th>
                  <th>Цена</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @forelse($products as $product)
              <tr class="@if(!$product->visible) opticy-50 @endif">
                <td class=" custom-checkbox pl-5 w-2">
                  <input type="checkbox" class="custom-control-input" for="{{ $product->product_id }}" id="{{ $product->product_id }}" data-id="{{ $product->product_id }}">
                  <label class="custom-control-label" for="{{ $product->product_id }}">{{ $product->product_id }}</label>
                </td>
                <td>
                  <img class="c-avatar__img" @empty($product->image) src="/admin/img/simuclar/72.png"
                       @else src="{{ $product->image }}" @endif alt="{{ $product->title }}">
                </td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->model }}</td>
                <td>{{ number_format($product->price, 2, '.', ' ') }}</td>
                <td>
                  <a href="{{ route ('admin.product.edit', $product->product_id) }}" class="btn btn-primary btn-icon-split">
                    <span class="icon">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                  </a>
                </td>
              </tr>
              @empty
                <tr>
                  <td colspan="6"><p class="">Нет товаров.</p></td>
                </tr>
              @endforelse
              </tbody>
            </table>
                @include('admin.helper_paginator', ['objects' => $products])
          </div>
        </div>
      </div>



    </div>
  </div>

@endsection

@section('script_down_2')
  @include('admin.helper_script_list_delete', ['url' => '/admin/product/delete'])
@endsection