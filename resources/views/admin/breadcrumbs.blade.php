<ol class="u-mr-auto u-mb-xsmall c-breadcrumb">
  @isset($parents)
    @foreach($parents as $parent)
      <li class="c-breadcrumb__item"><a class="c-breadcrumb__link" href="{{ $parent['url'] }}">{{ $parent['name'] }}</a></li>
    @endforeach
  @endisset
  <li class="c-breadcrumb__item">{{ $name }}</li>
</ol>