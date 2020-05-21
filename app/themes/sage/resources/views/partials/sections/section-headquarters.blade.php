@if( $offices )
  <section class="brm-section brm-section--headquarters">
    <div class="text-center brm-container">
      <h2>Headquarters & Regional Offices</h2>
      <div class="-mx-base md:-mx-1 carousel-grid js-carousel-offices">
        @foreach( $offices as $office )
          <div class="px-1">
            @if( App::image($office->ID, 'w596x454') )
              <img src="{{ App::image($office->ID, 'w596x454') }}" alt="{{ $office->post_title }}" />
            @endif
            @if( TemplateAbout::officeDescription($office) )
              <h6 class="mt-3 mb-0">{{ TemplateAbout::officeDescription($office) }}</h6>
            @else
              <h6 class="mt-3 mb-0">{{ $office->post_title }}</h6>
            @endif
            @if( TemplateAbout::simpleLocation($office) )
              <span class="block text-primary-1">{!! TemplateAbout::simpleLocation($office) !!}</span>
            @endif
            @if( TemplateAbout::phone($office) )
              <span class="block mt-2 text-primary-1">
                <a class="text-primary-1 no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', TemplateAbout::phone($office)) }}">
                  {!! TemplateAbout::phone($office) !!}
                </a>
              </span>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
