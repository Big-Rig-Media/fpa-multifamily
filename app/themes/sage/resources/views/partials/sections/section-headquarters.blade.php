@if( $offices )
  <section class="brm-section brm-section--headquarters">
    <div class="text-center brm-container">
      <h2>Headquarters & Regional Offices</h2>
      <div class="-mx-base md:-mx-1 carousel-grid carousel-grid--offices js-carousel-offices">
        @foreach( $offices as $office )
          <div class="px-1">
            @if( App::image($office->ID, 'w596x454') && TemplateAbout::address($office) )
              <img src="{{ App::image($office->ID, 'w596x454') }}" alt="{{ $office->post_title }}" />
            @endif
            <h6 class="mt-3 mb-0">{{ $office->post_title }}</h6>
            @if( get_field('office_description', $office->ID) )
              <span class="block text-primary-1">{{ get_field('office_description', $office->ID) }}</span>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
