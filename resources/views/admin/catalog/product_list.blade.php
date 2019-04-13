@extends('admin.basis')
@section('content')


<div class="row">
  <div class="col-12">
    <div class="u-mb-small u-text-right">
      <a href="{{ route ('admin.product.add') }}" class="c-btn c-btn--info">Добавить</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="c-table-responsive@wide">
      <table class="c-table">
        <thead class="c-table__head">
        <tr class="c-table__row">
          <th class="c-table__cell c-table__cell--head">ID</th>
          <th class="c-table__cell c-table__cell--head">Имя</th>
          <th class="c-table__cell c-table__cell--head">Модель</th>
          <th class="c-table__cell c-table__cell--head">Цена</th>
          <th class="c-table__cell c-table__cell--head"></th>
        </tr>
        </thead>

        <tbody>
        @forelse($products as $product)
        <tr class="c-table__row @if(!$product->visible) visible_off @endif">
          <td class="c-table__cell">{{ $product->product_id }}</td>
          <td class="c-table__cell">
            <div class="o-media">
              <div class="o-media__img u-mr-xsmall">
                <div class="c-avatar c-avatar--small">
                  <img class="c-avatar__img" @empty($product->image) src="/_admin/img/image_empty_72.png" @else src="{{ $product->image }}" @endif alt="{{ $product->title }}">
                </div>
              </div>
              <div class="o-media__body">
                <h6>{{ $product->title }}</h6>
                <p>{{ $product->h1 }}</p>
              </div>
            </div>
          </td>
          <td class="c-table__cell">{{ $product->model }}</td>
          <td class="c-table__cell">{{ number_format($product->price, 2, '.', ' ') }}</td>

          <td class="c-table__cell">
            <a href="{{ route ('admin.product.edit', $product->product_id) }}" class="c-btn c-btn--info"><i class="feather icon-edit-2"></i></a>
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
@endsection