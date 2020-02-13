@if( $offices )
  <section class="brm-section brm-section--offices">
    <div class="text-center brm-container">
      <h2>Headquarters & Regional Offices</h2>
      <div class="-mx-1 carousel-grid carousel-grid--offices js-carousel-offices">
        @foreach( $offices as $office )
          <div class="px-1">
            @if( App::image($office->ID, 'w596x454') && TemplateAbout::address($office) )
              <a href="{{ TemplateAbout::address($office) }}">
                <img src="{{ App::image($office->ID, 'w596x454') }}" alt="{{ $office->post_title }}" />
              </a>
            @endif
            <h6 class="mt-3">{{ $office->post_title }}</h6>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
