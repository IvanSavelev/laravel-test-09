@extends('front.basis')
@section('type_page') blog-detail-01 @endsection
@section('title') {{ $article->title }}@endsection
@section('content')
  <section class="sub-header shop-layout-1">
    <img class="rellax bg-overlay" src="@isset($article->image)@widget('front.image', ['size' => '600x486'], $article, 'image')@else /font/images/sub-header/07.jpg @endisset" alt="">
    <div class="overlay-call-to-action"></div>
    <h3 class="heading-style-3">@widget('front.h1', [], $article)</h3>
  </section>
  <section class="boxed-sm">
    <div class="container">
      <div class="row main">
        <article class="blog-detail">
          <h3 class="title-blog-detail">{{ $article->title }}</h3>
          <p class="meta">
            <span class="time">@widget('front.date', ['format' => 'd F, Y'], $article, 'date')</span>
            {{-- <span class="comment">0</span> --}}
          </p>
          <div class="content">
            {!! $article->description  !!}
          </div>
        </article>
        @if(!empty($article_prev) or !empty($article_next))
        <div class="row">
          <div class="col-md-12">
            <div class="post-control">
              @if(!empty($article_prev))
              <a class="prev-post" href="{{ route ('front.article', $article_prev->article_id) }}">
                <i class="fa fa-angle-left"></i>Предыдущяя статья
                <h4 class="title-next-post">{{ $article_prev->title }}</h4>
              </a>
              @else
                <div class="col-md-6"></div>
              @endif
              @if(!empty($article_next))
              <a class="next-post" href="{{ route ('front.article', $article_next->article_id) }}">Следующяя статья
                <i class="fa fa-angle-right"></i>
                <h4 class="title-next-post">{{ $article_next->title }}</h4>
              </a>
              @else
                <div class="col-md-6"></div>
              @endif
            </div>
          </div>
        </div>
        @endif
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