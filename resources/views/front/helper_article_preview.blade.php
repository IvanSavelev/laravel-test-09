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
    @php
    //Очень стыдный кусок
      $content = mb_substr($article->description, 0, 356) ;

        $position = 0;
        $open_tags = array();
        //теги для игнорирования
        $ignored_tags = array('br', 'hr', 'img');

        while (($position = strpos($content, '<', $position)) !== FALSE)
        {
            //забираем все теги из контента
            if (preg_match("|^<(/?)([a-z\d]+)\b[^>]*>|i", substr($content, $position), $match))
            {
                $tag = strtolower($match[2]);
                //игнорируем все одиночные теги
                if (in_array($tag, $ignored_tags) == FALSE)
                {
                    //тег открыт
                    if (isset($match[1]) AND $match[1] == '')
                    {
                        if (isset($open_tags[$tag]))
                            $open_tags[$tag]++;
                        else
                            $open_tags[$tag] = 1;
                    }
                    //тег закрыт
                    if (isset($match[1]) AND $match[1] == '/')
                    {
                        if (isset($open_tags[$tag]))
                            $open_tags[$tag]--;
                    }
                }
                $position += strlen($match[0]);
            }
            else
                $position++;
        }
        //закрываем все теги
        foreach ($open_tags as $tag => $count_not_closed)
        {
            $content .= str_repeat("</{$tag}>", $count_not_closed);
        }

        $yourText =  $content;



    @endphp
    <p>{!! $yourText  !!}</p>

  </div>
</div>
@endif