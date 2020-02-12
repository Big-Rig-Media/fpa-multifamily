@if( $acquisitions )
  <section class="brm-section brm-section--acquisitions">
    <div class="text-center brm-container">
      <h2>Recent Acquisitions</h2>
      <div class="-mx-1 carousel-grid js-carousel-acquisitions">
        @foreach( $acquisitions as $acquisition )
          <div class="px-1">
            @if( App::image($acquisition->ID, 'w596x454') )
              <img src="{{ App::image($acquisition->ID, 'w596x454') }}" alt="{{ $acquisition->post_title }}" />
            @endif
            <h6>{{ $acquisition->post_title }}</h6>
          </div>
        @endforeach
      </div>
      <a class="brm-btn brm-btn--primary" href="{{ get_permalink(18) }}">More Acquisitions</a>
    </div>
  </section>
@endif
