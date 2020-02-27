@if( $acquisitions )
  <section class="brm-section brm-section--acquisitions">
    <div class="text-center brm-container">
      <h2>Recent Acquisitions</h2>
      <div class="-mx-base md:-mx-1 carousel-grid js-carousel-default">
        @foreach( $acquisitions as $acquisition )
          <div class="mb-5 px-1">
            @if( App::image($acquisition->ID, 'w596x454') )
              <img loading="lazy" src="{{ App::image($acquisition->ID, 'w596x454') }}" alt="{{ $acquisition->post_title }}" />
            @endif
            <h6 class="mt-3 mb-0">{{ $acquisition->post_title }}</h6>
            @if( App::capitalization($acquisition) )
              <span class="block text-primary-1"><strong>Capitalization:</strong> &#36;{{ App::capitalization($acquisition) }}</span>
            @endif
            @if( App::units($acquisition) )
              <span class="block text-primary-1"><strong>Units:</strong> {{ App::units($acquisition) }}</span>
            @endif
          </div>
        @endforeach
      </div>
      <a class="brm-btn brm-btn--primary" href="{{ get_permalink(18) }}">More Acquisitions</a>
    </div>
  </section>
@endif
