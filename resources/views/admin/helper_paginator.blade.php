@if($products->lastPage() > 1)
  <ul class="c-pagination u-mb-medium">

    <li><a class="c-pagination__link @if($products->currentPage() == 1) hidden @endif" href="{{ $products->url($products->currentPage()-1) }}"><i class="feather icon-chevron-left"></i> </a></li>
    @for($i = 1; $i<= $products->lastPage(); $i++)
      @if($products->currentPage() == $i)
        <li><a class="c-pagination__link is-active">{{ $i }}</a></li>
      @else
        <li><a class="c-pagination__link" href="{{ $products->url($i) }}">{{ $i }}</a></li>
      @endif
    @endfor
    <li><a class="c-pagination__link @if($products->currentPage() == $products->lastPage()) hidden @endif" href="{{ $products->url($products->currentPage()+1) }}"><i class="feather icon-chevron-right"></i> </a></li>

  </ul>
@endif