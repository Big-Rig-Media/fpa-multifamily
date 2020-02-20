@if( get_field('fpa_offices_content') )
  <section class="brm-section brm-section--offices">
    <div class="text-black text-center brm-container brm-container--small">
      <h2>FPA Offices</h2>
      {!! get_field('fpa_offices_content') !!}
      @if( $offices )
        <ul class="md:hidden list-reset">
          @foreach( $offices as $office )
            <li class="w-full mb-5 text-left">
              <h6 class="mb-0">{{ $office->post_title }}</h6>
              @if( get_field('office_address', $office) )
                <span class="block">
                  <a class="text-primary-1 no-underline" href="{{ TemplateAbout::address($office) }}">{{ get_field('office_address', $office) }}</a>
                </span>
              @endif
              @if( TemplateAbout::phone($office) )
                <span class="block mt-3">
                  <a class="text-primary-1 no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', TemplateAbout::phone($office)) }}">T: {{ TemplateAbout::phone($office) }}</a>
                </span>
              @endif
            </li>
          @endforeach
        </ul>
      @endif
    </div>
  </section>
@endif
