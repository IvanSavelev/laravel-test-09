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
        </tr>
        </thead>

        <tbody>
        @forelse($products as $product)
        <tr class="c-table__row">
          <td class="c-table__cell">
            <input class="c-choice__input" id="checkbox2" name="checkboxes" type="checkbox">
          </td>
          <td class="c-table__cell">
            <div class="o-media">
              <div class="o-media__img u-mr-xsmall">
                <div class="c-avatar c-avatar--small">
                  <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Jessica Alba">
                </div>
              </div>
              <div class="o-media__body">
                <h6>{{ $product->title }}</h6>
                <p>{{ $product->h1 }}</p>
              </div>
            </div>
          </td>
          <td class="c-table__cell">{{ $product->model }}</td>
          <td class="c-table__cell">{{ $product->price }}</td>
          <td class="c-table__cell">{{ $product->title }}</td>
          <td class="c-table__cell">
            <div class="c-dropdown dropdown">
              <a href="#" class="c-btn c-btn--info has-icon dropdown-toggle" id="dropdownMenuTable1"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More <i class="feather icon-chevron-down"></i>
              </a>

              <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuTable1">
                <a class="c-dropdown__item dropdown-item" href="#">Редактировать</a>
                <a class="c-dropdown__item dropdown-item" href="#">Посмотреть</a>
              </div>
            </div>
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

<div class="row">
  <div class="col-12">
    <footer class="c-footer">
      <p>© 2018 Neat, Inc</p>
      <span class="c-footer__divider">|</span>
      <nav>
        <a class="c-footer__link" href="#">Terms</a>
        <a class="c-footer__link" href="#">Privacy</a>
        <a class="c-footer__link" href="#">FAQ</a>
        <a class="c-footer__link" href="#">Help</a>
      </nav>
    </footer>
  </div>
</div>
@endsection