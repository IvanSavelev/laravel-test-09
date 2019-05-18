@extends('front.basis')
@section('type_page') home-1 @endsection
@section('title') {{ $settings['title'] }}@endsection

@section('content')
  {{-- BANNER --}}
  <div class="banner banner-image-fit-screen">
    <div class="rev_slider slider-home-1" id="slider_1">
      <ul>
        <li>
          <img class="rev-slidebg" src="@widget('front.image', ['size' => '1900x900'], $settings, 'image')" alt="demo" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10">
        </li>
      </ul>
    </div>
  </div>
  <section class="boxed-sm">
    <div class="container">
      <div class="row">
        <div class="product-category-grid-style-1">
          <div class="row">
            @foreach($settings['index_categories_general'] as $category)
              <div class="col-sm-4">
                <a href="#">
                  <figure class="product-category-item">
                    <div class="thumbnail">
                      <img src="@isset($category->image)@widget('front.image', ['size' => '400x400'], $category, 'image')@else /front/images/category-product/2.jpg @endisset" alt="{{ $category->title }}" />
                    </div>
                    <figcaption>
                      <h3>{{ $category->title }}</h3>
                    </figcaption>
                  </figure>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="boxed-sm">
    <div class="container">
      <div class="heading-wrapper text-center">
        <h3 class="heading">Популярные продукты</h3>
      </div>
      <div class="row">
        <div class="row js-product-masonry-layout-1 product-masonry-layout-1">
          <div class="grid-sizer"></div>
          @foreach($settings['index_products_general'] as $key => $index_product_general)
          <figure class="item @if($key == 1) item-size-2 @endif">

            <div class="product product-style-2">
              <div class="img-wrapper">
                <a href="product-detail.html">
                  @if($key == 2)
                    <img class="img-responsive" src="@isset($index_product_general->image)@widget('front.image', ['size' => '600x600'], $index_product_general, 'image')@else /front/images/product/isotope-03.jpg @endisset" alt="{{ $index_product_general->title }}" />
                  @else
                    <img class="img-responsive" src="@isset($index_product_general->image)@widget('front.image', ['size' => '400x400'], $index_product_general, 'image')@else /front/images/product/isotope-03.jpg @endisset" alt="{{ $index_product_general->title }}" />
                  @endif
                </a>
                <div class="product-control-wrapper bottom-right">
                  <div class="wrapper-control-item">
                    <a class="js-quick-view" href="#" type="button" data-toggle="modal" data-target="#quick-view-product">
                      <span class="lnr lnr-eye"></span>
                    </a>
                  </div>
                  <div class="wrapper-control-item item-wish-list">
                    <a class="js-wish-list js-notify-add-wish-list" href="#">
                      <span class="lnr lnr-heart"></span>
                    </a>
                  </div>
                  <div class="wrapper-control-item item-add-cart js-action-add-cart">
                    <a class="animate-icon-cart" href="#">
                      <span class="lnr lnr-cart"></span>
                    </a>
                    <svg x="0px" y="0px" width="36px" height="32px" viewbox="0 0 36 32">
                      <path stroke-dasharray="19.79 19.79" fill="none" ,="," stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                    </svg>
                  </div>
                </div>
                <figcaption class="desc">
                  <h3>
                    <a class="product-name" href="product-detail.html">{{ $index_product_general->title }}</a>
                  </h3>
                  <span class="price">{{ number_format($index_product_general->price, 2, '.', ' ')}}₽</span>
                </figcaption>
              </div>
            </div>
          </figure>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  {{-- MIDDLE BLOK --}}
  <div class="call-to-action-style-1">
    <img class="rellax bg-overlay" src="@isset($settings['middle_image'])@widget('front.image', ['size' => '960x640'], $settings, 'middle_image')@else /front/images/call-to-action/1.jpg @endisset" alt="" />
    <div class="overlay-call-to-action"></div>
    <div class="container">
      <div class="row">
        <p class="h3">{{ $settings['middle_title'] }}</p>
        <h2>{{ $settings['middle_text'] }}</h2>
      </div>
    </div>
  </div>

  {{-- BLOG --}}
  <section class="boxed-sm">
    <div class="container">
      <div class="heading-wrapper text-center">
        <h3 class="heading">Статьи</h3>
      </div>
      <div class="row">
        <div class="row blog-h reverse flex one-row multi-row-sm">
          @foreach($settings['index_articles_general'] as $article)
          <div class="col-md-4">
            @include('front.helper_article_preview', ['article' => $article])
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

@endsection
@section('script_down')


  <script src="/front/js/library/jquery.min.js"></script>
  <script src="/front/js/library/bootstrap.min.js"></script>
  <script src="/front/js/function-check-viewport.js"></script>
  <script src="/front/js/library/slick.min.js"></script>
  <script src="/front/js/library/select2.full.min.js"></script>
  <script src="/front/js/library/imagesloaded.pkgd.min.js"></script>
  <script src="/front/js/library/jquery.mmenu.all.min.js"></script>
  <script src="/front/js/library/rellax.min.js"></script>
  <script src="/front/js/library/isotope.pkgd.min.js"></script>
  <script src="/front/js/library/bootstrap-notify.min.js"></script>
  <script src="/front/js/library/bootstrap-slider.js"></script>
  <script src="/front/js/library/in-view.min.js"></script>
  <script src="/front/js/library/countUp.js"></script>
  <script src="/front/js/library/animsition.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/front/revolution/css/settings.css" />
  <link rel="stylesheet" type="text/css" href="/front/revolution/css/layers.css" />
  <link rel="stylesheet" type="text/css" href="/front/revolution/css/navigation.css" />
  <script src="/front/revolution/js/jquery.themepunch.tools.min.js"></script>
  <script src="/front/revolution/js/jquery.themepunch.revolution.min.js"></script>
  <script src="/front/revolution/js/extensions/revolution.extension.actions.min.js"></script>
  <script src="/front/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
  <script src="/front/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
  <script src="/front/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
  <script src="/front/revolution/js/extensions/revolution.extension.migration.min.js"></script>
  <script src="/front/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
  <script src="/front/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
  <script src="/front/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
  <script src="/front/revolution/js/extensions/revolution.extension.video.min.js"></script>
  <script src="/front/js/global.js"></script>
  <script src="/front/js/config-banner-home-1.js">


  </script>
  <script src="/front/js/config-mm-menu.js"></script>
  <script src="/front/js/config-set-bg-blog-thumb.js"></script>
  <script src="/front/js/config-isotope-product-home-1.js">


  </script>
  <script src="/front/js/config-carousel-thumbnail.js"></script>
  <script src="/front/js/config-carousel-product-quickview.js"></script>
  <!-- Demo Only-->
  <script src="/front/js/demo-add-to-cart.js"></script>

@endsection