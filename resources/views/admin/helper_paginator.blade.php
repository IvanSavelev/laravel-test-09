@if($objects->lastPage() > 1)
  <ul class="c-pagination u-mb-medium">

    <li><a class="c-pagination__link @if($objects->currentPage() == 1) hidden @endif" href="{{ $objects->url($objects->currentPage()-1) }}"><i class="feather icon-chevron-left"></i> </a></li>
    @for($i = 1; $i<= $objects->lastPage(); $i++)
      @if($objects->currentPage() == $i)
        <li><a class="c-pagination__link is-active">{{ $i }}</a></li>
      @else
        <li><a class="c-pagination__link" href="{{ $objects->url($i) }}">{{ $i }}</a></li>
      @endif
    @endfor
    <li><a class="c-pagination__link @if($objects->currentPage() == $objects->lastPage()) hidden @endif" href="{{ $objects->url($objects->currentPage()+1) }}"><i class="feather icon-chevron-right"></i> </a></li>

  </ul>
@endif