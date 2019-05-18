@extends('front.basis')
@section('type_page') blog-detail-01 @endsection
@section('title') {{ $settings['title'] }}@endsection
@section('content')
  <section class="sub-header shop-layout-1">
    <img class="rellax bg-overlay" src="@if(!empty($settings['image']))@widget('front.image', ['size' => '600x486'], $settings, 'image')@else /font/images/sub-header/07.jpg @endif" alt="">
    <div class="overlay-call-to-action"></div>
    <h3 class="heading-style-3">@widget('front.h1', [], $settings)</h3>
  </section>
  <section class="boxed-sm">
    <div class="container">
      <div class="row main">
        <article class="blog-detail">
          <h3 class="title-blog-detail">{{ $settings['title'] }}</h3>
          <div class="content">
            {!! $settings['description']  !!}
          </div>
        </article>
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