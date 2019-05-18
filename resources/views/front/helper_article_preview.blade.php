@if($article)
<div class="post">
  <div class="img-wrapper js-set-bg-blog-thumb">
    <a href="{{ route ('front.article', $article->article_id) }}">
      <img src="@isset($article->image)@widget('front.image', ['size' => '600x486'], $article, 'image')@else /front/images/blog/01.jpg @endisset" alt="Image" />
    </a>
  </div>
  <div class="desc">
    <h4>
      <a href="{{ route ('front.article', $article->article_id) }}">{{ $article->title }}</a>
    </h4>
    <p class="meta">
      <span class="time">@widget('front.date', ['format' => 'd F, Y'], $article, 'date')</span>
      {{-- <span class="comment">2</span> --}}
    </p>
    <p>{!! $article->description  !!}</p>
  </div>
</div>
@endif