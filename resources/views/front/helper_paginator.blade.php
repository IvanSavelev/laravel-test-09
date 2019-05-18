@if($objects->lastPage() > 1)
  <nav>
    <ul class="pagination pagination-style-2">
      <li>
        <a class="prev page-numbers @if($objects->currentPage() == 1) hidden @endif" href="{{ $objects->url($objects->currentPage()-1) }}">
          <i class="fa fa-long-arrow-left"></i>
        </a>
      </li>
      @for($i = 1; $i<= $objects->lastPage(); $i++)
        @if($objects->currentPage() == $i)
          <li><span class="page-numbers current">{{ $i }}</span></li>
        @else
          <li><a class="page-numbers" href="{{ $objects->url($i) }}">{{ $i }}</a></li>
        @endif
      @endfor
      <li>
        <a class="next page-numbers @if($objects->currentPage() == $objects->lastPage()) hidden @endif" href="{{ $objects->url($objects->currentPage()+1) }}">
          <i class="fa fa-long-arrow-right"></i>
        </a>
      </li>
    </ul>
  </nav>
@endif