@if( $dispositions )
  <section class="brm-section brm-section--dispositions">
    <div class="text-center brm-container">
      <h2>Recent Dispositions</h2>
      <div class="-mx-1 carousel-grid js-carousel-dispositions">
        @foreach( $dispositions as $disposition )
          <div class="px-1">
            @if( App::image($disposition->ID, 'w596x454') )
              <img src="{{ App::image($disposition->ID, 'w596x454') }}" alt="{{ $disposition->post_title }}" />
            @endif
            <h6>{{ $disposition->post_title }}</h6>
          </div>
        @endforeach
      </div>
      <a class="brm-btn brm-btn--primary" href="{{ get_permalink(20) }}">More Dispositions</a>
    </div>
  </section>
@endif
