@if( $dispositions )
  <section class="brm-section brm-section--dispositions">
    <div class="text-center brm-container">
      <h2>Recent Dispositions</h2>
      <div class="-mx-base md:-mx-1 carousel-grid js-carousel-default">
        @foreach( $dispositions as $disposition )
          <div class="mb-5 px-1">
            @if( App::image($disposition->ID, 'w596x454') )
              <img loading="lazy" src="{{ App::image($disposition->ID, 'w596x454') }}" alt="{{ $disposition->post_title }}" />
            @endif
            <h6 class="mt-3 mb-0">{{ $disposition->post_title }}</h6>
            @if( App::capitalization($disposition) )
              <span class="block text-primary-1"><strong>Capitalization:</strong> &#36;{{ App::capitalization($disposition) }}</span>
            @endif
            @if( App::units($disposition) )
              <span class="block text-primary-1"><strong>Units:</strong> {{ App::units($disposition) }}</span>
            @endif
          </div>
        @endforeach
      </div>
      <a class="brm-btn brm-btn--primary" href="{{ get_permalink(20) }}">More Dispositions</a>
    </div>
  </section>
@endif
