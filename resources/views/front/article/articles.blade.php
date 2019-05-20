@extends('front.basis')
@section('type_page') blog-layout-1 mm-page mm-slideout @endsection
@section('title') {{ $settings['title'] }}@endsection
@section('content')
  <section class="sub-header shop-layout-1">
    <img class="rellax bg-overlay" src="@isset($settings['image'])@widget('front.image', ['size' => '1920x758'], $settings, 'image')@else /front/images/sub-header/02.jpg @endisset" alt="">
    <div class="overlay-call-to-action"></div>
    <h3 class="heading-style-3">@widget('front.h1', [], $settings)</h3>
  </section>
  <section class="boxed-sm">
    <div class="container">
      <div class="row main">
        <div class="row blog-h reverse flex multi-row">
          @foreach($article_items_paginator as $article)
          <div class="col-md-4">
            @include('front.helper_article_preview', ['article' => $article])
          </div>
          @endforeach
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            @include('front.helper_paginator', ['objects' => $article_items_paginator])
          </div>
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

  <script src="/front/js/global.js"></script>
  <script src="/front/js/config-mm-menu.js"></script>
  <script src="/front/js/config-set-bg-blog-thumb.js"></script>

@endsection