@extends('admin.admin')
@section('content_basis')
  <div class="o-page">
    <div class="o-page__sidebar js-page-sidebar">
      <aside class="c-sidebar">
        <div class="c-sidebar__brand">
          <h3>Магазин (тест)</h3>
        </div>

        <!-- Scrollable -->
        <div class="c-sidebar__body">



          <ul class="c-sidebar__list">
            <li>
              <a class="c-sidebar__link" href="dashboard03.html">
                <i class="c-sidebar__icon feather icon-pie-chart"></i>Dashboard 3
              </a>
            </li>
          </ul>


          <span class="c-sidebar__title">Страницы</span>
          <ul class="c-sidebar__list">
            <li>
              <a class="c-sidebar__link" href="{{ route ('admin.index.form')}}">
                <i class="c-sidebar__icon feather icon-home"></i>Главная
              </a>
            </li>
            <li class="c-sidebar__item has-submenu">
              <a class="c-sidebar__link" data-toggle="collapse" href="#sidebar-submenu" aria-expanded="false"
                 aria-controls="sidebar-submenu">
                <i class="c-sidebar__icon feather icon-grid"></i>Каталог
              </a>
              <div>
                <ul class="c-sidebar__list collapse" id="sidebar-submenu">
                  <li><a class="c-sidebar__link" href="{{ route ('admin.product.list')}}">Товары</a></li>
                  <li><a class="c-sidebar__link" href="{{ route ('admin.category.list')}}">Категории</a></li>
                </ul>
              </div>
            </li>
            <li>
              <a class="c-sidebar__link" href="{{ route ('admin.article.index')}}">
                <i class="c-sidebar__icon feather icon-file-text"></i>Статьи
              </a>
            </li>
            <li>
              <a class="c-sidebar__link" href="{{ route ('admin.contact.form')}}">
                <i class="c-sidebar__icon feather icon-file-text"></i>Контакты
              </a>
            </li>
          </ul>
        </div>
      </aside>
    </div>

    <main class="o-page__content">
      <header class="c-navbar u-mb-medium">
        <button class="c-sidebar-toggle js-sidebar-toggle">
          <i class="feather icon-align-left"></i>
        </button>

        <h2 class="c-navbar__title"></h2>

        <a class="c-dropdown__item dropdown-item" href="{{ route ('front.index')}}"  target="_blank">На сайт</a>
        <div class="c-dropdown dropdown">
          <div class="c-avatar c-avatar--xsmall dropdown-toggle" id="dropdownMenuAvatar" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false" role="button">
            <i class="c-sidebar__icon feather icon-user"></i>
          </div>


          <div class="c-dropdown__menu has-arrow dropdown-menu dropdown-menu-right">
            <a class="c-dropdown__item dropdown-item" href="{{ route ('admin.get_register')}}">Создать пользователя</a>
            <a class="c-dropdown__item dropdown-item" href="{{ route ('admin.get_login_out')}}">Выйти</a>
          </div>
        </div>
        <input type="hidden" name="object_id" id="object_id" value="@yield('object_id')">
        <input type="hidden" name="object_type" id="object_type" value="@yield('object_type')">
      </header>

      <div class="container content">
        @yield('content')
      </div>
    </main>
  </div>
@endsection

@section('script_down_1')
  <script>

    $(document).ready(function () {
      //Update product
      $('button[data-type=update]').click(function () {
        pageUpdate();
      });
    });

    function pageUpdate() {
      $('<input />').attr('type', 'hidden').attr('name', "redirect_here").attr('value', 1).appendTo('form');
      return true;
    }
  </script>
@endsection
@section('script_down_2')
  @yield('script_down_2')
@endsection