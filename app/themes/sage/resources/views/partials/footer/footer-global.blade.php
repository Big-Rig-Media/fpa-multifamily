@if( $social )
  <div class="brm-social brm-footer__social">
    @foreach($social as $key => $link)
      <a class="brm-social__link" href="{{ $link['url'] }}" aria-label="Find Us On {{ $link['title'] }}">
        {!! $link['svg'] !!}
      </a>
    @endforeach
  </div>
@endif
@if( $copyright )
  {!! $copyright !!}
@endif
